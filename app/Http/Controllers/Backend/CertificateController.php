<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CertificateController extends Controller
{
    public function __construct()
    {

        $path = 'frontend';
        if (session()->has('display_type')) {
            if (session('display_type') == 'rtl') {
                $path = 'frontend-rtl';
            } else {
                $path = 'frontend';
            }
        } else if (config('app.display_type') == 'rtl') {
            $path = 'frontend-rtl';
        }
        $this->path = $path;
    }

    /**
     * Get certificates lost for purchased courses.
     */
    public function getCertificates()
    {
        $certificates = auth()->user()->certificates;
        return view('backend.certificates.index', compact('certificates'));
    }


    /**
     * Generate certificate for completed course
     */
    public function generateCertificate(Request $request)
    {
        $course = Course::whereHas('students', function ($query) {
            $query->where('id', \Auth::id());
        })
            ->where('id', '=', $request->course_id)->first();
        if (($course != null) && $course->can_get_certificate()  && ($course->progress() == 100)) {
            $certificate = Certificate::firstOrCreate([
                'user_id' => auth()->user()->id,
                'course_id' => $request->course_id
            ]);
            $cert_image = $course->cert_image ? asset('storage/uploads/'.$course->cert_image) : asset("images/certificate.jpg");
            $cert_data = ($course->cert_data) ? $course->cert_data : config('cert_data');
            $cert_data_main = config('cert_data');
            if(!is_array($cert_data)) $cert_data = json_decode($cert_data);
            if(!is_array($cert_data_main)) $cert_data_main = json_decode($cert_data_main);

            
            $data = [
                'name' => auth()->user()->name,
                'course_name' => $course->title,
                'date' => Carbon::now()->format('d M, Y'),
                'cert_image' => $cert_image
            ];
            $certificate_name = 'Certificate-' . $course->id . '-' . auth()->user()->id . '.pdf';
            $certificate->name = auth()->user()->name;
            $certificate->url = $certificate_name;
            $certificate->save();
            
            //New PDF
            header('Content-Type: application/pdf; charset=UTF-8', true);
            $mpdf_paramaters = [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'margin_top' => 0,
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_bottom' => 0,
                'margin_header' => 0,
                'margin_footer' => 0,
                'fontDir' => [
                    public_path('fonts'),
                ],
                'fontdata' => [
                    'elmessiri' => [
                        'R' => 'ElMessiri-Regular.ttf',
                        'I' => 'ElMessiri-Regular.ttf',
                        'useOTL' => 0xFF,
                        'useKashida' => 75,
                    ]
                ],
                'default_font' => 'elmessiri'
            ];

            $mpdf = new \Mpdf\Mpdf($mpdf_paramaters);
            $mpdf->allow_charset_conversion = true;

            $mpdf->SetTitle($certificate_name);
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->SetDirectionality('rtl');
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->debug = true;
            $html = view('certificate.index', compact('data', 'cert_data', 'cert_data_main', 'course'));
            $mpdf->WriteHTML($html);
            //echo $mpdf->Output("$certificate_name", 'S');
            //return;
            $mpdf->Output(public_path('storage/certificates/' . $certificate_name), 'F');
            return back()->withFlashSuccess(trans('alerts.frontend.course.completed'));
        }
        return abort(404);
    }

    /**
     * Download certificate for completed course
     */
    public function download(Request $request)
    {
        $certificate = Certificate::findOrFail($request->certificate_id);
        if($certificate != null){
            $file = public_path() . "/storage/certificates/" . $certificate->url;
            return Response::download($file);
        }
        return back()->withFlashDanger('No Certificate found');


    }


    /**
     * Get Verify Certificate form
     */
    public function getVerificationForm()
    {
        return view('frontend.certificate-verification');
    }


    /**
     * Verify Certificate
     */
    public function verifyCertificate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required'
        ]);

        $certificates = Certificate::where('name', '=', $request->name)
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "=", $request->date)
            ->get();
        $data['certificates'] = $certificates;
        $data['name'] = $request->name;
        $data['date'] = $request->date;
        session()->forget('certificates');
        return back()->with(['data' => $data]);

    }
}

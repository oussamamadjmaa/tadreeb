<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\Admin\StoreE3tmadRequest;
use App\Http\Requests\Admin\UpdateE3tmadRequest;
use App\Models\Auth\User;
use App\Models\TeacherProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\E3tmadProfile;
use App\Models\UserDoc;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class E3tmadController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.e3tmad.index');
    }

    /**
     * Display a listing of Courses via ajax DataTable.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $has_view = false;
        $has_delete = false;
        $has_edit = false;
        $accreditation_bodies = "";


        if (request('show_deleted') == 1) {
            $accreditation_bodies = User::query()->where('user_type', 'e3tmad')->onlyTrashed()->orderBy('created_at', 'desc');
        } else {
            $accreditation_bodies = User::query()->where('user_type', 'e3tmad')->orderBy('created_at', 'desc');
        }

        if (auth()->user()->isAdmin()) {
            $has_view = true;
            $has_edit = true;
            $has_delete = true;
        }


        return DataTables::of($accreditation_bodies)
            ->addIndexColumn()
            ->addColumn('actions', function ($q) use ($has_view, $has_edit, $has_delete, $request) {
                $view = "";
                $edit = "";
                $delete = "";
                if ($request->show_deleted == 1) {
                    return view('backend.datatable.action-trashed')->with(['route_label' => 'admin.accreditation-bodies', 'label' => 'id', 'value' => $q->id]);
                }

                if ($has_edit) {
                    $edit = view('backend.datatable.action-edit')
                        ->with(['route' => route('admin.accreditation-bodies.edit', ['accreditation_body' => $q->id])])
                        ->render();
                    $view .= $edit;
                }

                if ($has_delete) {
                    $delete = view('backend.datatable.action-delete')
                        ->with(['route' => route('admin.accreditation-bodies.destroy', ['accreditation_body' => $q->id])])
                        ->render();
                    $view .= $delete;
                }

                $view .= '<a class="btn btn-warning mb-1" href="' . route('admin.courses.index', ['e3tmad_id' => $q->id]) . '">' . trans('labels.backend.courses.title') . '</a>';

                return $view;
            })
            ->addColumn('status', function ($q) {
                $html = html()->label(html()->checkbox('')->id($q->id)
                ->checked(($q->active == 1) ? true : false)->class('switch-input')->attribute('data-id', $q->id)->value(($q->active == 1) ? 1 : 0).'<span class="switch-label"></span><span class="switch-handle"></span>')->class('switch switch-lg switch-3d switch-primary');
                return $html;
                // return ($q->active == 1) ? "Enabled" : "Disabled";
            })
            ->rawColumns(['actions', 'image', 'status'])
            ->make();
    }

    /**
     * Show the form for creating new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.e3tmad.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  \App\Http\Requests\StoreE3tmadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreE3tmadRequest $request)
    {
//        $request = $this->saveFiles($request);

        $accreditation_body = User::create($request->all());
        $accreditation_body->confirmed = 1;
        $accreditation_body->user_type = "e3tmad";
        if ($request->hasFile('avatar_location')) {
            $accreditation_body->avatar_type = 'storage';
            $accreditation_body->avatar_location = $request->avatar_location->store('/avatars', 'public');
        }
        $accreditation_body->active = isset($request->active)?1:0;
        $accreditation_body->save();

        $payment_details = [
            'bank_name'         => request()->payment_method == 'bank'?request()->bank_name:'',
            'ifsc_code'         => request()->payment_method == 'bank'?request()->ifsc_code:'',
            'account_number'    => request()->payment_method == 'bank'?request()->account_number:'',
            'account_name'      => request()->payment_method == 'bank'?request()->account_name:'',
            'paypal_email'      => request()->payment_method == 'paypal'?request()->paypal_email:'',
        ];
        $data = [
            'user_id'           => $accreditation_body->id,
            'facebook_link'     => request()->facebook_link,
            'twitter_link'      => request()->twitter_link,
            'linkedin_link'     => request()->linkedin_link,
            'payment_method'    => request()->payment_method,
            'payment_details'   => json_encode($payment_details),
        ];
        E3tmadProfile::create($data);

        return redirect()->route('admin.accreditation-bodies.index')->withFlashSuccess(trans('alerts.backend.general.created'));
    }


    /**
     * Show the form for editing Category.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accreditation_body = User::with('e3tmadProfile')->findOrFail($id);
        $payment_details = json_decode($accreditation_body->e3tmadProfile->payment_details) ?? [];
        return view('backend.e3tmad.edit', compact('accreditation_body', 'payment_details'));
    }

    /**
     * Update Category in storage.
     *
     * @param  \App\Http\Requests\UpdateE3tmadRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateE3tmadRequest $request, $id)
    {
//        $request = $this->saveFiles($request);

        $accreditation_body = User::findOrFail($id);
        if($request->has('password')){
            $accreditation_body->password = bcrypt($request->password);
            $accreditation_body->save();
        }else{
            $accreditation_body->update($request->except('email'));
            if ($request->hasFile('avatar_location')) {
                $accreditation_body->avatar_type = 'storage';
                $accreditation_body->avatar_location = $request->avatar_location->store('/avatars', 'public');
            }
            $accreditation_body->active = isset($request->active)?1:0;
            $accreditation_body->save();

            $payment_details = [
                'bank_name'         => request()->payment_method == 'bank'?request()->bank_name:'',
                'ifsc_code'         => request()->payment_method == 'bank'?request()->ifsc_code:'',
                'account_number'    => request()->payment_method == 'bank'?request()->account_number:'',
                'account_name'      => request()->payment_method == 'bank'?request()->account_name:'',
                'paypal_email'      => request()->payment_method == 'paypal'?request()->paypal_email:'',
            ];
            $data = [
                // 'user_id'           => $user->id,
                'facebook_link'     => request()->facebook_link,
                'twitter_link'      => request()->twitter_link,
                'linkedin_link'     => request()->linkedin_link,
                'payment_method'    => request()->payment_method,
                'payment_details'   => $payment_details,
            ];
            if(!$accreditation_body->e3tmadProfile){
                $data['user_id'] = $accreditation_body->id;
                E3tmadProfile::create($data);
            }else{
                $accreditation_body->e3tmadProfile->update($data);
            }
        }


        return redirect()->route('admin.accreditation-bodies.edit', $accreditation_body->id)->withFlashSuccess(trans('alerts.backend.general.updated'));
    }


    /**
     * Remove Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accreditation_body = User::findOrFail($id);

        if ($accreditation_body->courses->count() > 0) {
            return redirect()->route('admin.accreditation-bodies.index')->withFlashDanger(trans('alerts.backend.general.accreditation_body_delete_warning'));
        } else {
            $accreditation_body->delete();
        }

        return redirect()->route('admin.accreditation-bodies.index')->withFlashSuccess(trans('alerts.backend.general.deleted'));
    }

    /**
     * Delete all selected Category at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $accreditation_body = User::onlyTrashed()->findOrFail($id);
        $accreditation_body->restore();

        return redirect()->route('admin.accreditation-bodies.index')->withFlashSuccess(trans('alerts.backend.general.restored'));
    }

    /**
     * Permanently delete Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $accreditation_body = User::onlyTrashed()->findOrFail($id);
        $accreditation_body->e3tmadProfile->delete();
        $accreditation_body->forceDelete();

        return redirect()->route('admin.accreditation-bodies.index')->withFlashSuccess(trans('alerts.backend.general.deleted'));
    }


    /**
     * Update accreditation_body status
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     **/
    public function updateStatus()
    {
        $accreditation_body = User::find(request('id'));
        $accreditation_body->active = $accreditation_body->active == 1? 0 : 1;
        $accreditation_body->save();
    }
}

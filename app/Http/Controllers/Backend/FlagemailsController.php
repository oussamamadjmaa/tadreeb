<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Flagemail;
use App\Notifications\NewlettersNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class FlagemailsController extends Controller
{
    public function index(){
        $subs = Flagemail::with('course')->get();
        return view('backend.flagemails.index', compact('subs'));
    }

    public function create(Request $request){
        $course = Course::findOrFail($request->course_id ?? 0);
        return view('backend.flagemails.create', compact('course'));
    }

    public function store(Request $request){
        $request->validate([
            'subject' => 'required|string',
            'message_text' => 'required|string',
            'course_id' => 'required|exists:courses,id'
        ]);
        if($request->has('email')){
            $request->validate([
                'email' => 'required|email:dns|exists:flagemails,email'
            ]);
            $emails = [$request->email];
        }else{
            $emails = Flagemail::where('course_id', $request->course_id)->get(['email'])->pluck('email')->toArray();
        }
        $data = (object)[
            'subject' => $request->subject,
            'message' => $request->message_text
        ];
        foreach ($emails as $email) {
            Notification::route('mail', $emails)->notify(new NewlettersNotification($data));
        }

        return back()->with(['flash_success' => 'تم إرسال الرسالة بنجاح']);
    }
}

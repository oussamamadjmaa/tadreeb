<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Newslatters;
use App\Notifications\NewlettersNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use function Aws\filter;

class NewslettersController extends Controller
{
    public function index(){
        $subs = Newslatters::get();
        return view('backend.newsletters.index', compact('subs'));
    }

    public function create(Request $request){
        if($request->has('email') && filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $email = $request->get('email');
            return view('backend.newsletters.single', compact('email'));
        }
        $emails = Newslatters::get(['id', 'email']);
        return view('backend.newsletters.multiple', compact('emails'));
    }

    public function store(Request $request){
        $request->validate([
            'subject' => 'required|string',
            'message_text' => 'required|string'
        ]);
        if($request->has('email')){
            $request->validate([
                'email' => 'required|email:dns|exists:newslatters,email'
            ]);
            $emails = [$request->email];
        }else{
            $request->validate([
                'emails' => 'required|array',
            ]);
            $emails = Newslatters::whereIn('id', $request->emails)->get(['email'])->pluck('email')->toArray();
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

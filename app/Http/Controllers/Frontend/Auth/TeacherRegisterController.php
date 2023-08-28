<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Models\TeacherProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\TeacherRegisterRequest;
use App\Models\UserDoc;

class TeacherRegisterController extends Controller
{   

   
    /**
     * Show the application teacher registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTeacherRegistrationForm()
    {
        return view('frontend.auth.registerTeacher');
    }

    /**
     * Register new teacher
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function register(TeacherRegisterRequest $request)
    {
        $user = User::create($request->validated());
        $user->confirmed = 1;
        if ($request->has('image')) {
            $user->avatar_type = 'storage';
            $user->avatar_location = $request->image->store('/avatars', 'public');
        }
        $user->active = 0;
        $user->save();
        $user->assignRole('teacher');
        $payment_details = [
            'bank_name' => request()->bank_name,
            'ifsc_code' => request()->ifsc_code,
            'account_number' => request()->account_number,
            'account_name' => request()->account_name,
            'paypal_email' => request()->paypal_email,
        ];
        $data = [
            'user_id' => $user->id,
            'facebook_link' => request()->facebook_link,
            'twitter_link' => request()->twitter_link,
            'linkedin_link' => request()->linkedin_link,
            'payment_method' => request()->payment_method,
            'payment_details' => json_encode($payment_details),
            'description'       => request()->description,
        ];
        TeacherProfile::create($data);

        $docs_data = [
            'user_id' => $user->id,
            'personal_photo' => $request->file('personal_photo')->store('/docs', 'public'),
            'passport_photo' => $request->file('passport_photo')->store('/docs', 'public'),
            'academic_degree_photo' => $request->file('academic_degree_photo')->store('/docs', 'public'),
            'cv' => $request->file('cv')->store('/docs', 'public')
        ];
        UserDoc::create($docs_data);
        
        return redirect()->route('frontend.index')->withFlashSuccess(trans('labels.frontend.modal.registration_message'))->with(['openModel' => true]);
    }

}

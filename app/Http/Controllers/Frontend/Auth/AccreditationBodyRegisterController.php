<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Models\AccreditationBodyProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\AccreditationBodyRegisterRequest;
use App\Models\E3tmadProfile;
use App\Models\UserDoc;

class AccreditationBodyRegisterController extends Controller
{   

   
    /**
     * Show the application AccreditationBody registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAccreditationBodyRegistrationForm()
    {
        return view('frontend.auth.registerAccreditationBody');
    }

    /**
     * Register new AccreditationBody
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function register(AccreditationBodyRegisterRequest $request)
    {
        $user = User::create($request->all());
        $user->confirmed = 1;
        if ($request->has('image')) {
            $user->avatar_type = 'storage';
            $user->avatar_location = $request->image->store('/avatars', 'public');
        }
        $user->active = 0;
        $user->user_type = 'e3tmad';
        $user->save();
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
        E3tmadProfile::create($data);
        
        return redirect()->route('frontend.auth.accreditation-body.register')->withFlashSuccess(trans('تم ارسال طلبك بنجاح وسيتم اعلامك عند تفعيل حسابك'));
    }

}

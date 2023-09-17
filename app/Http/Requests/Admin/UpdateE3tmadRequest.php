<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateE3tmadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        if(isset($this->all()['password'])){
            return [
                'password' => 'required|string|min:8'
            ];
        }
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
//            'email' => 'required|email|unique:users,email,'.$this->route('teachers'),
            'image'               => ['image'],
            'facebook_link'       => ['nullable', 'url'],
            'twitter_link'        => ['nullable', 'url'],
            'linkedin_link'       => ['nullable', 'url'],
            'payment_method'      => ['required'],
            'bank_name'           => ['nullable'],
            'ifsc_code'           => ['nullable'],
            'account_number'      => ['nullable'],
            'account_name'        => ['nullable'],
            'paypal_email'        => ['nullable'],
        ];
    }
}

<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoursesRequest extends FormRequest
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

    public function prepareForValidation() {
        $this->merge([
            'cert_price' => $this->cert_price ?: 0
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'teachers.*' => 'exists:users,id',
            'e3tmad_id' => 'required|exists:users,id',
            'cert_image' => 'nullable|mimes:jpg,jpeg,png',
            'title' => 'required',
            'category_id' => 'required',
            'start_date' => 'date_format:'.config('app.date_format'),
        ];
    }
}

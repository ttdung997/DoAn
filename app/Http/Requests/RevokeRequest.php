<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevokeRequest extends FormRequest
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
        return [
            'reason' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'reason.required' => 'Y/c nhập nội dung',
            'reason.min' => 'Y/c tối thiểu 5 ký tự',
        ];
    }
}

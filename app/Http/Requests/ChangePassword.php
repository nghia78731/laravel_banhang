<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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

            'newpassword' => 'required|min:6|max:20|confirmed',
            'newpassword_confirmation' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
          'confirm.confirmed' => 'Mật khẩu mới không trùng khớp'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUp extends FormRequest
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
            'fullname' => 'required|min:6|max:15',
            'email' => 'required|min:10|max:20|email',
            'password' => 'required|min:6|max:20',
            'confirm' => 'min:6|confirmed',
            'address' => 'required',
            'phone' => 'required|numeric',
            'g-recaptcha-response' => ['required', new \App\Rules\ValidRecaptcha]
        ];
    }

    public function messages()
    {
        return [
          'fullname.required' => 'Tên không được để trống',
          'fullname.min' => 'Tên không được bé hơn 6 ký tự',
          'fullname.max' => 'Tên không được quá 20 ký tự',
        ];
    }
}

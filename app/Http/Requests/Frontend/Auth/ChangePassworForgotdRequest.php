<?php

namespace App\Http\Requests\Frontend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassworForgotdRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu không nhỏ hơn :min ký tự!',
            'confirm_password.same' => 'Mật khẩu không khớp!',
        ];
    }
}
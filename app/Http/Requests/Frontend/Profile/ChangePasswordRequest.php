<?php

namespace App\Http\Requests\Frontend\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldPassword' => 'required|min:5',
            'newPassword' => 'required|min:5',
            'password_confirm' => 'required|same:newPassword'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Mật khẩu không được để trống!',
            'oldPassword.min' => 'Mật khẩu không được nhỏ hơn :min ký tự!',
            'newPassword.min' => 'Mật khẩu không được nhỏ hơn :min ký tự!',
            'password_confirm.same' => 'Mật khẩu không khớp!',
        ];
    }
}
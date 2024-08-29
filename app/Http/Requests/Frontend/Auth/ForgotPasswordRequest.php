<?php

namespace App\Http\Requests\Frontend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
      'email' => 'required|email|max:255',
    ];
  }
  public function messages()
  {
    return [
      'email.required' => 'Email không được để trống!',
      'email.max' => 'Email không được quá :max ký tự!',
      'email' => ':attribute không hợp lệ!',
    ];
  }
}
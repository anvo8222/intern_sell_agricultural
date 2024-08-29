<?php

namespace App\Http\Requests\Frontend\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
      'name' => 'required|max:30',
      'phone' => 'required|numeric|min:10',
      'address' => 'max:255',
      'avatar' => 'mimes:jpeg,png,jpg,gif|max:2048',
    ];
  }
  public function messages()
  {
    return [
      'name.required' => 'Tên không được để trống!',
      'email.required' => 'Email không được để trống!',
      'phone.numeric' => 'Số điện thoại phải là kiểu số',
      'phone.required' => 'Số điện thoại không được để trống',
      'email.email' => 'Email không hợp lệ',
      'name.max' => 'Tên không được quá :max ký tự!',
      'email.max' => 'Email không được quá :size ký tự!',
      'phone.min' => 'Số điện thoại không được nhỏ hơn :min !',
      'address.max' => 'Địa chỉ không được quá :max ký tự!',
      'avatar.max' => 'Kích thước nhỏ hơn 2mb',
      'avatar.mimes' => 'Ảnh phải là (jpeg,png,jpg,gif)',
    ];
  }
}
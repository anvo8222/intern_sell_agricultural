<?php

namespace App\Http\Requests\Frontend\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
      'phone' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      'email' => 'required|email|max:255',
      'address' => 'required|max:255',
    ];
  }
  public function messages()
  {
    return [
      'name.required' => 'Tên không được để trống!',
      'email.required' => 'Email không được để trống!',
      'phone.required' => 'Số điện thoại không được để trống!',
      'address.required' => 'Địa chỉ không được để trống!',
      'phone.numeric' => 'Số điện thoại phải là kiểu số',
      'email.email' => 'Email không hợp lệ',

      'name.max' => 'Tên không được quá :max ký tự!',
      'email.max' => 'Email không được quá :size ký tự!',
      'phone.min' => 'Số điện thoại không được nhỏ hơn :min !',
      'address.max' => 'Địa chỉ không được quá :max ký tự!',
    ];
  }
}
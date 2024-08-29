<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
      'name' => 'required|max:40|unique:categories',
      'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
      'description' => 'max:400',
    ];
  }
  public function messages()
  {
    return [
      'name.required' => 'Tên danh mục không được để trống!',
      'name.unique' => 'Tên danh mục đã tồn tại!',
      'image.max' => 'Kích thước nhỏ hơn 2mb',
      'description.max' => 'Mô tả không được quá :max ký tự!',
      'image.mimes' => 'Ảnh phải là (jpeg,png,jpg,gif)',
    ];
  }
}
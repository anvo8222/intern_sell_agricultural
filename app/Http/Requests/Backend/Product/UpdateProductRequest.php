<?php

namespace App\Http\Requests\Backend\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|max:40',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:1000',
            'sale' => 'required|numeric|min:0|max:100',
            'quantity' => 'required|numeric|min:1|max:1000',
            'description' => 'required|max:400',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống!',
            'image.max' => 'Kích thước nhỏ hơn 2mb',
            'image.required' => 'Ảnh không được để trống!',
            'image.mimes' => 'Ảnh phải là (jpeg,png,jpg,gif)',
            'mimes' => 'Supported file format for :attribute are :mimes',

            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Phải là số!',
            'price.min' => 'Giá sản phẩm không được nhỏ hơn :min',

            'sale.required' => 'Khuyến mãi phải tối thiểu 0%',
            'sale.numeric' => 'Phải là số!',
            'sale.min' => 'Khuyến mãi không được nhỏ hơn :min %',
            'sale.max' => 'Khuyến mãi không được lớn hơn :max %',

            'quantity.required' => 'Số lượng phải tối thiểu 0%',
            'quantity.numeric' => 'Phải là số!',
            'quantity.min' => 'Số lượng không được nhỏ hơn :min (kg)',
            'quantity.max' => 'Số lượng không được lớn hơn :max (kg)',

            'description.required' => 'Mô tả không được quá :max ký tự!',
            'description.max' => 'Mô tả không được quá :max ký tự!',
        ];
    }
}
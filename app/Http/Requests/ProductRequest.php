<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pro_name' => 'required|string|max:255|unique:products,name',
            'category_id' => 'required|exists:categories,id',
            'brand' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'is_hot' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'pro_name.required' => 'Tên sản phẩm không được để trống.',
            'pro_name.string' => 'Tên sản phẩm phải là chuỗi.',
            'pro_name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'pro_name.unique' => 'Tên sản phẩm đã tồn tại.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            'brand.required' => 'Thương hiệu không được để trống.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'stock.required' => 'Số lượng tồn kho là bắt buộc.',
            'stock.integer' => 'Tồn kho phải là số nguyên.',
            'image.image' => 'Tệp phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải thuộc định dạng: jpg, jpeg, png, gif.',
            'image.max' => 'Kích thước hình ảnh tối đa là 2MB.',
            'is_hot.boolean' => 'Trường "is_hot" phải là 0 hoặc 1.',
        ];
    }
}

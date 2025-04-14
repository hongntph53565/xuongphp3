<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cate_name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' => 'Tên danh mục là bắt buộc.',
            'cate_name.string' => 'Tên danh mục phải là chuỗi.',
            'cate_name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'cate_name.unique' => 'Tên danh mục đã tồn tại.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        ];
    }
}

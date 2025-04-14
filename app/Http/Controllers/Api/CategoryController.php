<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return response()->json([
            'message' => 'success',
            'data' => $categories
        ], 200);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'message' => 'Không tìm thấy danh mục',
                'data' => null
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'data' => $category
        ], 200);
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return response()->json([
            'message' => 'Thêm danh mục thành công',
            'data' => $category
        ], 201);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::withTrashed()->find($id);
        if (!$category) {
            return response()->json([
                'message' => 'Không tìm thấy danh mục',
                'data' => null
            ], 404);
        }

        $category->update($request->validated());

        return response()->json([
            'message' => 'Sửa danh mục thành công',
            'data' => $category
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'message' => 'Không tìm thấy danh mục'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Xóa danh mục thành công'
        ], 200);
    }
}

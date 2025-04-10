<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $listCate = Category::paginate(5);
        return view('admin.categories.ListCategories', compact('listCate'));
    }
    public function addCategory()
    {
        return view('admin.categories.AddCategories');
    }
    public function addPostCategory(Request $req)
    {
        $data = [
            'name' => $req->cate_name,
            'description' => $req->description,
        ];
        Category::create($data);
        return redirect()->route('admin.categories.listCategory')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }
    public function deleteCategory(Request $req)
    {
        Category::where('id', $req->idCate)->delete();
        return redirect()->route('admin.categories.listCategory')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function updateCategory($idCate)
    {
        $categories = Category::where('id', $idCate)->first();
        return view('admin.categories.EditCategories', compact('categories'));
    }
    public function updatePatchCategory($idCate, Request $req)
    {
        $data = [
            'name' => $req->cate_name,
            'description' => $req->description,
        ];
        Category::where('id', $idCate)->update($data);
        return redirect()->route('admin.categories.listCategory')->with([
            'message' => 'Sửa thành công'
        ]);
    }
}

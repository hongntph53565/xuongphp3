<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return response()->json([
            'message' => 'success',
            'data' => $product
        ], 200);
    }
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $product
        ], 200);
    }

    public function store(ProductRequest $req)
    {
        $imagePath = null;
        if ($req->hasFile('image')) {
            $imagePath = $req->file('image')->store('images', 'public');
        }

        $data = [
            'name' => $req->name,
            'category_id' => $req->category_id,
            'brand' => $req->brand,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'image' => $imagePath,
            'is_hot' => $req->is_hot ?? 0,
        ];

        $product = Product::create($data);

        return response()->json([
            'message' => 'Thêm sản phẩm thành công',
            'data' => $product
        ], 201);
    }

    public function update(ProductRequest $req, $id)
    {
        $product = Product::withTrashed()->find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm',
                'data' => null
            ], 404);
        }

        $data = [
            'name' => $req->name,
            'brand' => $req->brand,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'image' => $req->image,
            'is_hot' => $req->is_hot ?? '0',
        ];

        $product->update($data);

        return response()->json([
            'message' => 'Sửa thành công',
            'data' => $product
        ]);
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return response()->json([
            'message' => 'success',
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $product = Product::where('id', $id)->first();
        return response()->json([
            'message' => 'success',
            'data' => $product
        ], 200);
    }
    public function store(Request $req)
    {
        $data = [
            'name' => $req->name,
            'category_id' => $req->category_id,
            'brand' => $req->brand,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'image' => $req->image,
            'is_hot' => $req->is_hot,
        ];

        $product = Product::create($data);

        return response()->json([
            'message' => 'success',
            'data' => $product
        ], 201);
    }

    public function update(Request $req, $id)
    {
        $data = [
            'name' => $req->name,
            'brand' => $req->brand,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'stock' => $req->stock,
            'image' => $req->image,
            'is_hot' => $req->is_hot ? '1' : '0',
        ];
    }
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return response()->json([
            'message' => 'success',
        ], 200);
    }
}

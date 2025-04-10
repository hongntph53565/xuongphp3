<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProduct = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.id', 'products.name', 'products.image', 'products.brand', 'products.is_hot', 'categories.name as cateName')->paginate(5);
        return view('admin.products.ListProduct', compact('listProduct'));
    }
    public function addProduct()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.products.addProduct', compact('categories'));
    }
    public function addPostProduct(Request $req)
    {
        //Cách 1
        // $product = new Product();
        // $product->category_id  = $req->category_id;
        // $product->name = $req->pro_name;
        // $product->brand = $req->brand;
        // $product->description = $req->description;
        // $product->price = $req->price;
        // $product->stock = $req->stock;
        // $product->is_hot = $req->is_hot ? "1" : "0";
        // $product->image = $req->image;
        // $product->save();
        //Cách 2

        $path = '';
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            // $newName = time() . '.' . $image->getClientOriginalExtension();
            // $linkStorage = 'imageProducts/';
            // $image->move(public_path($linkStorage), $newName);
            // $linkImage =  $linkStorage . $newName;

            $newName = time() . '' . $image->getClientOriginalName();

            $path = $image->storeAs('images', $newName, 'public');
        }
        // dd($linkImage);

        $data = [
            'category_id' => $req->category_id,
            'name' => $req->pro_name,
            'brand' => $req->brand,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'is_hot' => $req->is_hot ? "1" : "0",
            'image' => $path,
        ];
        Product::create($data);
        return redirect()->route('admin.products.listProduct')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }
    public function deleteProduct(Request $req)
    {
        $product = Product::where('id', $req->idProduct)->first();
        if ($product->image != null && $req->image != '') {
            // File::delete(public_path($product->image));

            Storage::disk('public')->delete($product->image);
        }

        Product::where('id', $req->idProduct)->delete();

        // $product = Product::where('id', $req->idProduct);
        // if ($product->first()->image != null && $req->first()->image != '') {
        //     File::delete(public_path($product->first()->image));
        // }
        // $product->delete();
        return redirect()->route('admin.products.listProduct')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function detailProduct($idProduct)
    {
        $product = Product::where('id', $idProduct)->first();
        return view('admin.products.detail-product', compact('product'));
    }
    public function updateProduct($idProduct)
    {
        $categories = Category::select('id', 'name')->get();
        $product = Product::where('id', $idProduct)->first();
        return view('admin.products.EditProduct', compact('product', 'categories'));
    }
    public function updatePatchProduct($idProduct, Request $req)
    {
        $product = Product::where('id', $idProduct)->first();
        $linkImage = $product->image;
        if ($req->hasFile('image')) {
            File::delete(public_path($product->image)); //Xóa ảnh cũ
            $image = $req->file('image');
            $newName = time() . "." . $image->getClientOriginalExtension();
            $linkStorage = "imageProduct/";
            $image->move(public_path($linkStorage), $newName);
            $linkImage =  $linkStorage . $newName;
        }
        $data = [
            'category_id' => $req->category_id,
            'name' => $req->pro_name,
            'brand' => $req->brand,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'is_hot' => $req->is_hot ? "1" : "0",
            'image' => $linkImage,
        ];

        Product::where('id', $idProduct)->update($data);
        return redirect()->route('admin.products.listProduct')->with([
            'message' => 'Sửa thành công'
        ]);
    }
}

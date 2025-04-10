<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::select('products.id', 'products.name', 'products.brand', 'products.description', 'products.price', 'products.stock', 'products.image', 'products.is_hot')->get();
        return view('user.home', compact('products'));
    }

    public function show($idProduct)
    {
        $product = Product::find($idProduct);
        $productOfCategory = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
        return view('user.show', compact('product', 'productOfCategory'));
    }


    public function dashboard()
    {
        return view('admin.dashBoard');
    }
}

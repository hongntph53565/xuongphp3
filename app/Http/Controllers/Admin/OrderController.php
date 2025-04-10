<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function listOrder()
    {
        return view('admin.order.ListOrder');
    }
    public function addOrder()
    {
        return view('admin.order.AddOrder');
    }
    public function addPostOrder()
    {
        return view('admin.order.AddOrder');
    }
    public function deleteOrder()
    {
        return view('admin.order.AddOrder');
    }
    public function updateOrder()
    {
        return view('admin.order.EditOrder');
    }
    public function updatePostOrder()
    {
        return view('admin.order.EditOrder');
    }
}

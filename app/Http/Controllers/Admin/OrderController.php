<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function listOrder()
    {
        $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select(
                'orders.id as order_id',
                'users.name as userName',
                'orders.total_price',
                'orders.status',
                'products.name as productName',
                'order_details.quantity',
                'order_details.price as product_price'
            )
            ->get();
        return view('admin.order.ListOrder', compact('orders'));
    }
}

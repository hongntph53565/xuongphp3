@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h2 class="mt-4">Chi tiết đơn hàng #{{ $order->id }}</h2>

        <div class="card mb-4">
            <div class="card-body">
                <h5>Khách hàng: {{ $order->user->name }}</h5>
                <p>Email: {{ $order->user->email }}</p>
                <p>Ngày đặt hàng: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p>Trạng thái: {{ $order->status }}</p>
                <p>Tổng tiền: <strong class="text-danger">{{ number_format($order->total_price) }} VND</strong></p>
            </div>
        </div>

        <h5>Danh sách sản phẩm:</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td><img src="{{ asset($item->product->image) }}" width="60" alt=""></td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }} VND</td>
                        <td>{{ number_format($item->quantity * $item->price) }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
@endsection

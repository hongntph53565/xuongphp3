@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Quản lý Đơn hàng</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Tên User</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng Giá</th>
                    <th scope="col">Trạng thái</th>
                    {{-- <th scope="col">Hành Động</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->productName }}</td>
                        <td>{{ $value->userName }}</td>
                        <td>{{ $value->quantity }}</td>
                        <td>{{ $value->total_price }} VND</td>
                        <td>
                            <form action="" method="post">
                                <select class="form-select" id="status" name="status">
                                    <option value="Chờ xử lý"{{ $value->status == 'Chờ xử lý' ? 'selected' : '' }}>Chờ xử lý
                                    </option>
                                    <option value="Đã giao"{{ $value->status == 'Đã giao' ? 'selected' : '' }}>Đã giao
                                    </option>
                                    <option
                                        value="Đang vận chuyển"{{ $value->status == 'Đang vận chuyển' ? 'selected' : '' }}>
                                        Đang vận chuyển
                                    </option>
                                    <option value="Đã hủy"{{ $value->status == 'Đã hủy' ? 'selected' : '' }}>Đã hủy
                                    </option>
                                </select>
                            </form>
                        </td>
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('admin.orders.order-detail', $value->id) }}">Xem chi tiết</a> --}}
                            {{-- <a class="btn btn-danger" href="">Xóa</a> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

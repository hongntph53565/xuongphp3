@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Quản lý Giỏ Hàng</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11</td>
                    <td>11</td>
                    <td>11</td>
                    <td>11</td>
                    <td>11</td>
                    <td>
                        <a class="btn btn-warning" href="">Sửa</a>
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Thêm Người dùng</h1>
        <form action="{{ route('admin.users.addPostUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên người dùng:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên người dùng">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập Email">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập Mật khẩu">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Vai trò:</label>
                <select class="form-control" id="role" name="role">
                    <option value="0">Admin</option>
                    <option value="1" selected>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </form>
    </div>
@endsection

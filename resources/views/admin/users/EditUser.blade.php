@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Cập nhật Người dùng</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên người dùng:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                    placeholder="Nhập tên người dùng">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}"
                    placeholder="Nhập Email">
            </div>
            {{-- <div class="mb-3">
                <label for="name" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}"
                    placeholder="Nhập Mật khẩu">
            </div> --}}
            <div class="mb-3">
                <label for="role" class="form-label">Vai trò:</label>
                <select class="form-control" id="role" name="role">
                    <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                    <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật </button>
        </form>
    </div>
@endsection

@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Cập nhật Danh Mục</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục:</label>
                <input type="text" class="form-control" id="cate_name" name="cate_name" value="{{ $categories->name }}"
                    placeholder="Nhập tên danh mục">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm">{{ $categories->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection

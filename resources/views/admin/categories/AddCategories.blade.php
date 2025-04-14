@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Thêm Danh Mục</h1>
        <form action="{{ route('admin.categories.addPostCategory') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục:</label>
                <input type="text" class="form-control" id="cate_name" name="cate_name" placeholder="Nhập tên danh mục">
                @error('cate_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả danh mục"></textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Thêm Danh mục</button>
        </form>
    </div>
@endsection

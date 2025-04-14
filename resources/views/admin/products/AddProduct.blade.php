@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Thêm Sản phẩm</h1>
        <form action="{{ route('admin.products.addPostProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục:</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Nhập tên sản phẩm">
                @error('pro_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Tên thương hiệu:</label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Nhập thương hiệu">
                @error('brand')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm:</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Số lượng sản phẩm:</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Nhập số lượng">
                @error('stock')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_hot" class="form-label">Hot:</label>
                <select class="form-control" id="is_hot" name="is_hot">
                    <option value="0">Không</option>
                    <option value="1">Có</option>
                </select>
                @error('is_hot')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh:</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Thêm Sản phẩm</button>
        </form>
    </div>
@endsection

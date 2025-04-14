@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Chỉnh sửa sản phẩm</h1>
        <form action="{{ route('admin.products.updatePatchProduct', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục:</label>
                <select class="form-control" id="category_id" name="category_id">

                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" {{ $cate->id == $product->category_id ? 'selected' : '' }}>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Nhập tên sản phẩm"
                    value="{{ $product->name }}">
                @error('pro_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Tên thương hiệu:</label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Nhập thương hiệu"
                    value="{{ $product->brand }}">
                @error('brand')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm:</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá"
                    value="{{ $product->price }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Số lượng sản phẩm:</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Nhập số lượng"
                    value="{{ $product->stock }}">
                @error('stock')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_hot" class="form-label">Hot:</label>
                <div class="mb-3">
                    <label for="is_hot" class="form-label">Hot:</label>
                    <select class="form-control" id="is_hot" name="is_hot">
                        <option value="1" {{ $product->is_hot == 1 ? 'selected' : '' }}>Có</option>
                        <option value="0" {{ $product->is_hot == 0 ? 'selected' : '' }}>Không</option>
                    </select>
                    @error('is_hot')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh hiện tại:</label>
                <br>
                @if ($product->image == null)
                    <span>Không có ảnh</span>
                @else
                    {{-- <img width="80" src="{{ asset($product->image) }}" alt=""> --}}
                    <img width="80" src="{{ asset(Storage::url($product->image)) }}" alt="">
                @endif
                <br>
                <label for="image" class="form-label">Chọn ảnh mới (nếu muốn thay đổi):</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm">{{ $product->description }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($product->image == '' ? 'images/default.png' : $product->image) }}" class="img-fluid"
                    alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h2 class="product-title">{{ $product->name }}</h2>
                <p class="text-muted">Mã sản phẩm: <span>{{ $product->id }}</span></p>
                <h3 class="text-danger">{{ $product->price }} VND</h3>
                <h5 class="mt-3">Mô Tả</h5>
                <p>
                    {{-- Mùi hương mạnh mẽ, đầy quyến rũ dành cho phái mạnh. Một sự kết hợp hoàn hảo giữa sự nam tính và sự lôi cuốn.
                Hương thơm từ các loại gỗ quý và gia vị tạo nên một dấu ấn khó quên cho mỗi người đàn ông. --}}
                    {{ $product->description }}
                </p>
                <div class="d-flex">
                    <a href="#" class="btn btn-warning me-3">Thêm vào giỏ hàng</a>
                    <a href="#" class="btn btn-danger">Mua ngay</a>
                </div>
                <div class="mt-4">
                    <h5>Đánh Giá</h5>
                    <div>
                        <span class="text-warning">⭐⭐⭐⭐⭐</span>
                        <span class="text-muted">(100 đánh giá)</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bình luận sản phẩm -->
        <div class="row mt-5">
            <h4 class="col-12 mb-4">Bình luận</h4>

            <!-- Form gửi bình luận -->
            <div class="col-12 mb-4">
                <form action="" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
                    <div class="mb-3">
                        <label for="comment" class="form-label">Nội dung:</label>
                        <textarea name="content" id="comment" class="form-control" rows="3" placeholder="Nhập bình luận..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Gửi</button>
                </form>
            </div>
        </div>

        <!-- Các sản phẩm liên quan -->
        <div class="row mt-5">
            <h4 class="col-12 mb-4">Sản phẩm liên quan</h4>
            @if ($productOfCategory->isEmpty())
                <div class="alert alert-primary" role="alert">
                    Không có sản phẩm liên quan
                </div>
            @endif

            <!-- Sản phẩm liên quan 1 -->
            @foreach ($productOfCategory as $value)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset($value->image == '' ? 'images/default.png' : $value->image) }}" class="img-fluid"
                            alt="{{ $value->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $value->name }}</h5>
                            <h5 class="text-muted fs-6">{{ $value->name }}</h5>
                            <p class="card-text text-muted">{{ $value->price }} VND</p>
                            <a href="{{ route('show', $value->id) }}" class="btn btn-primary">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

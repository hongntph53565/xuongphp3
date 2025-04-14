<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Home Page Content -->
    <section id="featured-products" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Sản Phẩm Nổi Bật</h2>
            <div class="row">
                <!-- Product Card 1 -->
                @foreach ($products as $value)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset(Storage::url($value->image)) }}" class="card-img-top" alt="Sản phẩm 1">
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
    </section>
@endsection

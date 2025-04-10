@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        @if (session('message'))
            <p class="text-success">{{ session('message') }}</p>
        @endif
        <h1 class="mt-4">Dashboard</h1>
        <p>Chào mừng bạn đến với trang quản trị.</p>
    </div>
@endsection

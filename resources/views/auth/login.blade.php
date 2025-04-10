<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    @yield('css') <!-- Thêm CSS riêng nếu cần -->
</head>

<body>

    <div class="container">
        <h1 class="mt-4">ĐĂNG NHẬP</h1>
        @if (session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif

        <form action="{{ route('postLogin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập Email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập Mật khẩu">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" class="form-label">Remember Me</label>
            </div>
            <div class="mb-3">
                <a class="" href="{{ route('register') }}">Đăng ký</a>
            </div>
            <button type="submit" class="btn btn-success">Đăng nhập</button>
        </form>
    </div>
</body>

</html>

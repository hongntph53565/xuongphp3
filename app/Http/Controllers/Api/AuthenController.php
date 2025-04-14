<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Kiểm tra thông tin đăng nhập
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['Thông tin đăng nhập không đúng.'],
            ]);
        }

        // Lấy người dùng hiện tại
        $user = $request->user();
        // Tạo token mới
        $token = $user->createToken('api-token')->plainTextToken;

        // Trả về phản hồi với token mới
        return response()->json([
            'message' => 'Đăng nhập thành công.',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Authentication
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function postLogin(UserLoginRequest $request)
    {
        $dataUserLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember =
            $request->has('remember');
        if (Auth::attempt($dataUserLogin, $remember)) {
            // Logout hết các tài khoản khác
            Session::where('user_id', Auth::id())->delete();
            //Tạo phiên đăng nhập mới
            session()->put('user_id', Auth::id());
            //Đăng nhập thành công
            if (Auth::user()->role == '0') {
                return redirect()->route('admin.dashboard')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            } else {
                echo "Đăng nhập user";
            }
        } else {
            //Đăng nhập thất bại
            return redirect()->back()->with([
                'message' => 'Email hoặc password không đúng'
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Đăng xuất thành công'
        ]);
    }
    public function register()
    {
        return view('auth.register');
    }
    public function postRegister(RegisterRequest $request)
    {
        $check = User::where('email', $request->email)->exists();
        if ($check) {
            return redirect()->back()->with([
                'message' => 'Tài khoản email đã tồn tại'
            ]);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $newUser = User::create($data);
            // Auth::login($newUser); //Tự động đăng nhập cho user này
            // return dashboard
            return redirect()->route('login')->with([
                'message' => 'Đăng ký thành công. Vui lòng đăng nhập'
            ]);
        }
    }
}

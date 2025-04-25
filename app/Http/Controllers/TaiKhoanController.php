<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('dangnhap');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $taiKhoan = TaiKhoanModel::where('email', $request->email)->first();

        if ($taiKhoan && Hash::check($request->password, $taiKhoan->password)) {
            Auth::login($taiKhoan, $request->remember);
            return redirect()->intended('/'); // hoặc route dashboard
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không đúng.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function register(Request $request)
{
    $request->validate([
        'username' => 'required|string|min:1|max:255',
        'email' => 'required|string|email|max:255|unique:tai_khoan',
        'password' => 'required|string|min:1',
    ]);

    $user = TaiKhoanModel::create([
        'id_user' => now()->format('YmdHis'), 
        'username' => $request->username,
        'email' => $request->email,
        'password' => $request->password, 
        'role' => 'user',
    ]);

    Auth::login($user);

    return redirect('/')->with('success', 'Đăng ký thành công!');
}
}

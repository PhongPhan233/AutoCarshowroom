<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


use App\Models\ChiTietPhieuDangKyModel;
use App\Models\DichVuModel;
use App\Models\PhieuDangKyModel;
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

        if ($taiKhoan && Hash::check($request->password, $taiKhoan->password) && $taiKhoan->role != 'admin') {
            Auth::login($taiKhoan, $request->remember);
            return redirect()->intended('/'); // hoặc route dashboard
        }
        else if($taiKhoan && Hash::check($request->password, $taiKhoan->password) && $taiKhoan->role == 'admin')
        {
            Auth::login($taiKhoan, $request->remember);
            $dsphieu = PhieuDangKyModel::with('loaiDichVu', 'taikhoan', 'chitietphieu')->get();
            return view('quanlyphieu', compact('dsphieu'));
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
            'confirmpassword' => 'required|string|min:1',
        ]);
        if ($request->password != $request->confirmpassword) {
            return back()->withErrors(['confirmpassword' => 'Mật khẩu xác nhận không khớp.'])->withInput();
        }

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
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:tai_khoan,email',
        ]);

        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('otp_email', $request->email);

        // Gửi email
        Mail::raw("Mã OTP của bạn là: $otp", function($message) use ($request) {
            $message->to($request->email)
                    ->subject('Mã OTP');
        });

        return response()->json(['success' => 'OTP đã được gửi đến email của bạn']);
    }
}

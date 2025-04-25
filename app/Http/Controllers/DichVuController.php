<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ChiTietPhieuDangKyModel;
use App\Models\DichVuModel;
use App\Models\PhieuDangKyModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DatLichServiceMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class DichVuController extends Controller
{
    //
    public function loaidichvu(){
        $dsdichvu = DichVuModel::all();
        return view('dichvu', compact('dsdichvu'));
    }
    public function dangkydichvu(Request $request)
    {
        try {
            if (!Auth::check()) {
                return back()->with('error', 'Bạn phải đăng nhập để đặt lịch.');
            }
        // Dữ liệu
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email',
            'ma_loai' => 'required|string',
            'ngay_lap' => 'required|date',
            'noi_dung' => 'nullable|string',
        ]);

        // mã phiếu
        $maPhieu = strtoupper(Str::random(8));

        // lưu phiếu
        $phieu = new PhieuDangKyModel();
        $phieu->ma_phieu = $maPhieu;
        $phieu->id_user = Auth::id(); // bạn phải login mới dùng được
        $phieu->ngay_lap = Carbon::parse($request->ngay_lap);
        $phieu->ma_loai = $request->ma_loai;
        $phieu->save();

        // chi tiết
        $chiTiet = new ChiTietPhieuDangKyModel();
        $chiTiet->ma_phieu = $maPhieu;
        $chiTiet->noi_dung = $request->noi_dung;
        $chiTiet->save();

        $loaiDichVu = DichVuModel::find($request->ma_loai);

        $thongTin = [
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'ten_loai' => $loaiDichVu->ten_loai,
            'ngay_lap' => $request->ngay_lap,
            'noi_dung' => $request->noi_dung,
        ];

        Mail::to($request->email)->send(new DatLichServiceMail($thongTin));

        
        return back()->with('success', 'Đặt lịch thành công! Thông tin xác nhận đã được gửi đến email của bạn.');
    } catch (\Exception $e) {
        Log::error('Lỗi đặt lịch: ' . $e->getMessage());
        return back()->with('error', 'Có lỗi xảy ra khi đặt lịch: ' . $e->getMessage());
    }
    }

    
}

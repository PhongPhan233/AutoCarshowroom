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
use App\Models\TaiKhoanModel;
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

        $thongtin = [
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'ten_loai' => $loaiDichVu->ten_loai,
            'ngay_lap' => $request->ngay_lap,
            
            'noi_dung' => $request->noi_dung,
        ];

        Mail::to($request->email)->send(new DatLichServiceMail($thongtin));

        
        return back()->with('success', 'Đặt lịch thành công! Thông tin xác nhận đã được gửi đến email của bạn.');
    } catch (\Exception $e) {
        Log::error('Lỗi đặt lịch: ' . $e->getMessage());
        return back()->with('error', 'Có lỗi xảy ra khi đặt lịch: ' . $e->getMessage());
    }
    }
    public function showAdmin(){
        $dsphieu = PhieuDangKyModel::with('loaiDichVu', 'taikhoan', 'chitietphieu')->get();
        return view('quanlyphieu', compact('dsphieu'));
    }


    public function showUser(){
        $dsphieu = PhieuDangKyModel::with('loaiDichVu', 'taikhoan', 'chitietphieu')->get();
        return view('user', compact('dsphieu'));
    }
    public function showDetail($id)
{
    try {
        $phieu = PhieuDangKyModel::where('ma_phieu', $id)->firstOrFail();


        // Kiểm tra dữ liệu chi tiết
        $chiTiet = $phieu->chitietphieu;  // Lấy chi tiết liên quan
        $taikhoan = TaiKhoanModel::where('id_user', $phieu->id_user)->first();
        return response()->json([
            'success' => true,
            'data' => [
                'ma_phieu' => $phieu->ma_phieu,
                'nguoi_lap' => $taikhoan ? $taikhoan->username : 'Không xác định',
                'ngay_lap' => $phieu->created_at->format('d/m/Y'),
                'loai_dich_vu' => $phieu->loaiDichVu ? $phieu->loaiDichVu->ten_loai : '',
                'noi_dung' => $chiTiet ? $chiTiet->noi_dung : 'Không có ghi chú',
            ]
        ]);
    } catch (\Exception $e) {
        // Log lỗi chi tiết để dễ dàng tìm nguyên nhân
        Log::error('Lỗi khi lấy chi tiết phiếu: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy phiếu hoặc có lỗi xảy ra.',
        ], 500);
    }
}
public function updateTrangThai(Request $request, $maPhieu)
{
    try {
        $phieu = PhieuDangKyModel::where('ma_phieu', $maPhieu)->firstOrFail();

        $request->validate([
            'trang_thai' => 'required|string|in:Chờ xử lý,Tiếp nhận phiếu,Đã hoàn thành,Từ chối phiếu',
        ]);

        $phieu->trang_thai = $request->input('trang_thai');
        $phieu->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật trạng thái phiếu thành công.',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Có lỗi xảy ra khi cập nhật trạng thái.',
        ], 500);
    }
}


public function updateTrangThai_(Request $request, $id)
{
    try {
        // Tìm phiếu theo ID
        $phieu = PhieuDangKyModel::findOrFail($id);
        if (!$phieu) {
            return response()->json([
                'success' => false,
                'message' => 'Phiếu không tồn tại!'
            ], 404);
        }
        // Cập nhật trạng thái
        $phieu->trang_thai = $request->input('trang_thai');
        $phieu->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật trạng thái thành công!'
        ]);
    } catch (\Exception $e) {
        Log::error('Lỗi khi cập nhật trạng thái phiếu: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Cập nhật thất bại!'
        ], 500);
    }
}
    
    
}

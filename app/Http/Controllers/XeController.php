<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\KieuXeModel;
use App\Models\LoaiXeModel;
use App\Models\NgoaiHinhModel;
use App\Models\XeModel;
use Illuminate\Http\Request;

class XeController extends Controller
{
    public function DanhSachXe()
{
    $dsXe = XeModel::with('hangXe', 'loaiXe', 'kieuXe', 'hinhanhXe')->get();
    $loaixe = LoaiXeModel::all();
    $dskieuxe = KieuXeModel::all();
    $dsngoaihinh = NgoaiHinhModel::all();

    return view('danhsach', compact('dsXe', 'loaixe', 'dskieuxe','dsngoaihinh' ));
}
public function show($ma_xe)
{
    $xe = XeModel::with(['kieuXe', 'loaiXe', 'hangXe', 'thongSoKyThuat', 'hinhanhXe', 'xe360', 'ngoaihinh', 'dungtich'])->find($ma_xe);

    if (!$xe) {
        abort(404, 'Không tìm thấy xe');
    }

    return view('chitiet', compact('xe'));
}

}

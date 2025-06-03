<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuDangKyModel extends Model
{
    use HasFactory;
    protected $table = 'phieu_dang_ky';
    protected $primaryKey = 'ma_phieu'  ;
    protected $guard = 'ma_phieu';
    public $timestamps = true;
    protected $fillable = ['id_user', 'trang_thai', 'ngay_lap', 'ma_loai'];

    public function loaiDichVu()
    {
        return $this->belongsTo(DichVuModel::class, 'ma_loai','ma_loai');
    }
    public function taikhoan()
    {
        return $this->belongsTo(TaiKhoanModel::class, 'id_user','id_user');
    }
    public function chitietphieu()
    {
        return $this->hasOne(ChiTietPhieuDangKyModel::class, 'ma_phieu', 'ma_phieu');
    }
}

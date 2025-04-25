<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XeModel extends Model
{
    use HasFactory;
    protected $table = 'xe';
    
    protected $primaryKey = 'ma_xe';
    protected $keyType = 'string';
    protected $fillable = ['ten_xe', 'ma_loai', 'ma_kieu', 'ma_hang','nxs','mo_ta','created_at', 'updated_at'];

    public function kieuXe()
    {
        return $this->belongsTo(KieuXeModel::class, 'ma_kieu', 'ma_kieu');
    }

    public function loaiXe()
    {
        return $this->belongsTo(LoaiXeModel::class, 'ma_loai', 'ma_loai');
    }

    public function hangXe()
    {
        return $this->belongsTo(HangXeModel::class, 'ma_hang', 'ma_hang');
    }
    public function thongSoKyThuat()
    {
        return $this->hasOne(ThongSoKyThuatModel::class, 'ma_xe', 'ma_xe');
    }
    public function hinhanhXe()
    {
        return $this->hasOne(HinhAnhXeModel::class, 'ma_xe', 'ma_xe');
    }
    public function xe360()
    {
        return $this->hasOne(Car_360Model::class, 'ma_xe', 'ma_xe');
    }
    public function ngoaihinh()
    {
        return $this->hasOne(NgoaiHinhModel::class, 'ma_xe', 'ma_xe');
    }
    public function dungtich()
    {
        return $this->hasOne(DungTichModel::class, 'ma_xe', 'ma_xe');
    }
}

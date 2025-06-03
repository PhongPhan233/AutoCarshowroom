<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongSoKyThuatModel extends Model
{
    //
    use HasFactory;
    public $timestamps = false;
    protected $table = 'thong_so_ky_thuat';
    protected $primaryKey = 'ma_xe';
    protected $fillable = ['tong_chieu_dai', 'chieu_rong_tong_the', 'chieu_cao_tong_the',
    'khoang_sang_gam_xe', 'ban_kinh', 'van_toc_toi_da', 'dong_co', 'khoi_luong'];

    public function Xe()
    {
        return $this->belongsTo(XeModel::class, 'ma_xe', 'ma_xe');
    }
}

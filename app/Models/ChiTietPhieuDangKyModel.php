<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuDangKyModel extends Model
{
    //
    use HasFactory;
    protected $table = 'chi_tiet_phieu_dang_ky';
    protected $primaryKey = 'ma_phieu';
    public $timestamps = false;
    protected $fillable = ['noi_dung'];
    
    public function Chitiet()
    {
        return $this->belongsTo(PhieuDangKyModel::class, 'ma_phieu', 'ma_phieu');
    }
}

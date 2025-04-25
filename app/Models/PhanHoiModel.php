<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoiModel extends Model
{
    //
    use HasFactory;

    protected $table = 'phan_hoi';
    protected $primaryKey = 'ma_phan_hoi';
    protected $fillable = ['id_user', 'email', 'ngay_lap', 'created_at', 'updated_at'];
    public function id_user()
    {
        return $this->belongsTo(TaiKhoanModel::class, 'id_user', 'id_user');
    }
}

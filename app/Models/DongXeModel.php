<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DongXeModel extends Model
{
    //
    use HasFactory;
    protected $table = 'dong_xe';
    protected $guard = 'ma_dongxe';
    protected $primaryKey = 'ma_dongxe';

    protected $fillable = ['ma_hang', 'ten_dongxe'];

    public function hangXe()
    {
        return $this->belongsTo(HangXeModel::class, 'ma_hang', 'ma_hang');
    }
    
}

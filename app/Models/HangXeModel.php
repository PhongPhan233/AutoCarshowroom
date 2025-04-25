<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HangXeModel extends Model
{
    //
    use HasFactory;
    protected $table = 'hang_xe';
    protected $primaryKey = 'ma_hang';
    protected $keyType = 'string';
    protected $guard = 'ma_hang';
    protected $fillable = ['ten_hang', 'xuat_xu', 'updated_at','created_at'];
    

    
}

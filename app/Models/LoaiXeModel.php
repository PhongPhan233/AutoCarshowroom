<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiXeModel extends Model
{
    //
    use HasFactory;
    protected $table = 'loai_xe';
    protected $primaryKey = 'ma_loai';
    protected $keyType = 'string';
    protected $fillable = ['ten_loai'];

    
}

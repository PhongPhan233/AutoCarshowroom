<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KieuXeModel extends Model
{
    //
    use HasFactory;
    protected $table ='kieu_xe';
    protected $primaryKey = 'ma_kieu';
    protected $keyType = 'string';
    protected $fillable = ['ten_kieu'];
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVuModel extends Model
{
    //
    use HasFactory;
    protected $table = 'loai_dich_vu';
    protected $guard = 'ma_loai';
    protected $primaryKey = 'ma_loai';
    
    protected $fillable = ['ten_loai'];
    
}


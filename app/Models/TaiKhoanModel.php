<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoanModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'tai_khoan';
    protected $primaryKey = 'id_user';
    public $incrementing = false; // id_user là string nên không tự tăng
    protected $keyType = 'string';

    protected $fillable = [
        'id_user',
        'username',
        'email',
        'password', // thêm password
        'role',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}

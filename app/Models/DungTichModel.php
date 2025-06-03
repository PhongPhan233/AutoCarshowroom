<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DungTichModel extends Model
{
    //
    use HasFactory;
    public $timestamps = false;
    protected $table = 'dung_tich';
    protected $primaryKey = 'ma_xe';
    protected $keyType = 'string';
    protected $fillable = ['dung_tich_nhien_lieu', 'dung_tich_khoang_hanh_ly'];
    public function dungtich_xe()
    {
        return $this->belongsTo(XeModel::class, 'ma_xe', 'ma_xe');
    }
}

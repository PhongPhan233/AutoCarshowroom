<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhXeModel extends Model
{
    //
    use HasFactory;
    protected $table = "HinhAnhXe";
    protected $primaryKey = 'ma_xe';
    protected $keyType = 'string';
    protected $fillable = ['ma_xe' ,'mat_truoc', 'mat_ben', 'mat_sau', 'hinh_xe', 'created_at', 'updated_at'];
    public function HinhAnh_xe()
    {
        return $this->belongsTo(XeModel::class, 'ma_xe', 'ma_xe');
    }
    
}

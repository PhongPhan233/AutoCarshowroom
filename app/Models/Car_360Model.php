<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_360Model extends Model
{
    //
    use HasFactory;
    protected $table = 'car360';
    protected $primaryKey = 'ma_xe';
    protected $fillable = ['view', 'view_3D',
    'created_at', 'updated_at'];

    public function Xe_car360()
    {
        return $this->belongsTo(XeModel::class, 'ma_xe', 'ma_xe');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoaiHinhModel extends Model
{
    //
    use HasFactory;
    protected $table = 'ngoai_hinh';
    protected $primaryKey = 'ma_xe';
    protected $keyType = 'string';
    protected $fillable = ['so_cua', 'so_ghe', 'mau_sac'];

    public function xe_ngoaihinh()
    {
        return $this->belongsTo(XeModel::class, 'ma_xe', 'ma_xe');
    }
}

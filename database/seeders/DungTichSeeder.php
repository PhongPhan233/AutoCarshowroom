<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DungTichModel;
class DungTichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DungTichModel::insert([
            [
                'ma_xe'=>1,
                
                'dung_tich_nhien_lieu'=>4022, 
                'dung_tich_khoang_hanh_ly'=>303
            ],
            [
                'ma_xe'=>2,
                
                'dung_tich_nhien_lieu'=>3230, 
                'dung_tich_khoang_hanh_ly'=>203
            ],
            [
                'ma_xe'=>3,
                
                'dung_tich_nhien_lieu'=>1200, 
                'dung_tich_khoang_hanh_ly'=>100
            ]
            ]);
    }
}

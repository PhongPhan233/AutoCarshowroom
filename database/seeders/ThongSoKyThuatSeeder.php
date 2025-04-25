<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\thongSoKyThuatModel;
class ThongSoKyThuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ThongSoKyThuatModel::insert([
            ['ma_xe'=>1,'tong_chieu_dai' => 3000, // mm
                'chieu_rong_tong_the' => 1700, // mm
                'chieu_cao_tong_the' => 20,
                'khoang_sang_gam_xe' => 150, // mm
                'ban_kinh' => 1, // mét
                'van_toc_toi_da' => 300, // km/h
                'dong_co' => '1.5L I4',
                'khoi_luong' => 1000],
                ['ma_xe'=>2,'tong_chieu_dai' => 3000, // mm
                'chieu_rong_tong_the' => 1700, // mm
                'chieu_cao_tong_the' => 20,
                'khoang_sang_gam_xe' => 150, // mm
                'ban_kinh' => 1, // mét
                'van_toc_toi_da' => 300, // km/h
                'dong_co' => '1.5L I4',
                'khoi_luong' => 1000],
                ['ma_xe'=>3,'tong_chieu_dai' => 3000, // mm
                'chieu_rong_tong_the' => 1700, // mm
                'chieu_cao_tong_the' => 20,
                'khoang_sang_gam_xe' => 150, // mm
                'ban_kinh' => 1, // mét
                'van_toc_toi_da' => 300, // km/h
                'dong_co' => '1.5L I4',
                'khoi_luong' => 1000],
        ]);
        
}
}

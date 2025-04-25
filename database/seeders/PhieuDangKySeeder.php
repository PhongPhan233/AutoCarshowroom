<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaiKhoanModel;
use App\Models;
use App\Models\PhieuDangKyModel;
use Faker\Factory as Faker;
class PhieuDangKySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PhieuDangKyModel::insert([
            ['ma_phieu'=> 1,
            'id_user'=>1,
            'ngay_lap'=> now(),
            'ma_loai'=>1,
            'created_at' => now(),
            'updated_at' => now()],
            ['ma_phieu'=> 2,
            'id_user'=>2,
            'ngay_lap'=> now(),
            'ma_loai'=>1,
            'created_at' => now(),
            'updated_at' => now()],
            ['ma_phieu'=> 3,
            'id_user'=>3,
            'ngay_lap'=> now(),
            'ma_loai'=>1,
            'created_at' => now(),
            'updated_at' => now()],
        ]);
    }
}

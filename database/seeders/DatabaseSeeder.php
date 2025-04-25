<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TaiKhoanSeeder::class,
            HangXeSeeder::class,
            LoaiXeSeeder::class,
            KieuXeSeeder::class,
            XeSeeder::class,
            NgoaiHinhSeeder::class,
            DungTichSeeder::class,
            HinhAnhXeSeeder::class,
            DichVuSeeder::class,
            Car360Seeder::class,
            PhieuDangKySeeder::class,
            ThongSoKyThuatSeeder::class,
            
        ]);
    }
}


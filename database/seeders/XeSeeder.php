<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\XeModel;
use App\Models\KieuXeModel;
use App\Models\LoaiXeModel;
use App\Models\HangXeModel;
use Faker\Factory as Faker;
class XeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Lấy danh sách ID có sẵn từ các bảng liên quan
        
        XeModel::insert([
            ['ma_xe' => 1,
                'ten_xe' => 'Ford Mustang VI FL2018',
                'ma_loai' => 1,
                'ma_kieu' => 3,
                'ma_hang' => 'H23',
                'nsx' => 2018,
                'mo_ta' => 'ádiaguhfgiuhafuig',
                'created_at' => now(),
                'updated_at' => now()],
            ['ma_xe' => 2,
                'ten_xe' => 'A',
                'ma_loai' => 2,
                'ma_kieu' => 2,
                'ma_hang' => 'H2',
                'nsx' => 2005,
                'mo_ta' => 'àdijghaiuwehg',
                'created_at' => now(),
                'updated_at' => now()],
            ['ma_xe' => 3,
                'ten_xe' => 'C',
                'ma_loai' => 3,
                'ma_kieu' => 3,
                'ma_hang' => 'H23',
                'nsx' => 2000,
                'mo_ta' => 'àdijghaiuwehg',
                'created_at' => now(),
                'updated_at' => now()],
                ['ma_xe' => 4,
                'ten_xe' => 'D',
                'ma_loai' => 3,
                'ma_kieu' => 1,
                'ma_hang' => 'H23',
                'nsx' => 2002,
                'mo_ta' => 'àdijghaiuwehg',
                'created_at' => now(),
                'updated_at' => now()],
        ]);
        
        
    }
}

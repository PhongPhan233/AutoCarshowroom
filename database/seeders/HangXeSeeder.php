<?php

namespace Database\Seeders;

use App\Models\hangXeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;
use Faker\Factory as Faker;
class HangXeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Chèn dữ liệu vào bảng hang_xe
        hangXeModel::create([
            'ma_hang' => 'H1',
            'ten_hang' => 'Toyota',
            'xuat_xu' => 'Nhật Bản',
        ]);

        hangXeModel::create([
            'ma_hang' => 'H2',
            'ten_hang' => 'Honda',
            'xuat_xu' => 'Nhật Bản',
        ]);

        hangXeModel::create([
            'ma_hang' => 'H23',
            'ten_hang' => 'Ford',
            'xuat_xu' => 'Mỹ',
        ]);

        HangXeModel::create([
            'ma_hang' => 'H232',
            'ten_hang' => 'BMW',
            'xuat_xu' => 'Đức',
        ]);

        HangXeModel::create([
            'ma_hang' => 'H17',
            'ten_hang' => 'Mercedes-Benz',
            'xuat_xu' => 'Đức',
        ]);
    }
}

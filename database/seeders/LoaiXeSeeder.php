<?php

namespace Database\Seeders;

use App\Models\LoaiXeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;


class LoaiXeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoaiXeModel::insert([
            ['ma_loai' => 1, 'ten_loai' => 'Hạng A'],
            ['ma_loai' => 2, 'ten_loai' => 'Hạng B'],
            ['ma_loai' => 3, 'ten_loai' => 'Hang C'],
            ['ma_loai' => 4, 'ten_loai' => 'Hang phổ thông'],
            ['ma_loai' => 5, 'ten_loai' => 'Hang sang'],
            ['ma_loai' => 6, 'ten_loai' => 'Bán tải'],
            ['ma_loai' => 7, 'ten_loai' => 'Điện'],
        ]);
    }
}

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
            ['ma_loai' => 1, 'ten_loai' => 'Santa Fe'],
            ['ma_loai' => 2, 'ten_loai' => 'Fortuner'],
            ['ma_loai' => 3, 'ten_loai' => 'GLC 300 4MATIC'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KieuXeModel;

class KieuXeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KieuXeModel::insert([
            ['ma_kieu' => 1, 'ten_kieu' => 'Sedan'],
            ['ma_kieu' => 2, 'ten_kieu' => 'SUV'],
            ['ma_kieu' => 3, 'ten_kieu' => 'Hatchback'],
            ['ma_kieu' => 4, 'ten_kieu' => 'Sport'],
            ['ma_kieu' => 5, 'ten_kieu' => 'Pickup'],
            ['ma_kieu' => 6, 'ten_kieu' => 'MPV	'],
            ['ma_kieu' => 7, 'ten_kieu' => 'Classic'],
            
        ]);
    }
}

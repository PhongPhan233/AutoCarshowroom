<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;
use App\Models\DichVuModel;
class DichVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DichVuModel::insert([
            [ 'ma_loai'=> 1,
            'ten_loai' => 'Lái Thử',
            'created_at' => now(),
            'updated_at' => now()],
            ['ma_loai'=> 2,
            'ten_loai' => 'Rửa xe',
            'created_at' => now(),
            'updated_at' => now()],
            ['ma_loai'=> 3,
            'ten_loai' => 'Bảo dưỡng',
            'created_at' => now(),
            'updated_at' => now()],
        ]);
    }
}

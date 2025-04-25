<?php

namespace Database\Seeders;

use App\Models\NgoaiHinhModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NgoaiHinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        NgoaiHinhModel::insert([
            [
                'ma_xe'=>1,
                'so_cua'=>4, 
                'so_ghe'=>7, 
                'mau_sac'=>'Đen'
            ],
            [
                'ma_xe'=>2,
                'so_cua'=>4, 
                'so_ghe'=>4, 
                'mau_sac'=>'Hồng'
            ],
            [
                'ma_xe'=>3,
                'so_cua'=>4, 
                'so_ghe'=>2, 
                'mau_sac'=>'Xám'
            ],
        ]);
    }
}

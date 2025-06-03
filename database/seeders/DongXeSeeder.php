<?php

namespace Database\Seeders;

use App\Models\DongXeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DongXeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DongXeModel::insert([
            [
                'ma_dongxe'=>1,
                
                'ma_hang'=>'H1', 
                'ten_dongxe'=>'SantaFE'
            ],
            [
                'ma_dongxe'=>2,
                
                'ma_hang'=>'H2', 
                'ten_dongxe'=>'GLC'
            ],
            [
                'ma_dongxe'=>3,
                
                'ma_hang'=>'H23', 
                'ten_dongxe'=>'Ranger'
            ],
            [
                'ma_dongxe'=>4,
                
                'ma_hang'=>'H17', 
                'ten_dongxe'=>'AMG'
            ]
            ]);
    }

}

<?php

namespace Database\Seeders;

use App\Models\Car_360Model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Car360Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Car_360Model::insert([
            [ 'ma_xe'=>1,
            'view'=> 'images/car360/Ford/Ford_Mustang_VI_FL2018',
            'view_3D' => 'models/scene.glb',
            'created_at' => now(), 
            'updated_at' => now()],
            [ 'ma_xe'=>2,
            'view'=> 'images/car360/Mercedes/Mercedes_AMG_GT',
            'view_3D' => 'models/scene.glb',
            'created_at' => now(), 
            'updated_at' => now()],
            [ 'ma_xe'=>3,
            'view'=> 'images/car360/Mercedes/Mercedes_SZ223',
            'view_3D' => 'models/lamborghini_aventador.glb',
            'created_at' => now(), 
            'updated_at' => now()],
        ]);




     
    }
}

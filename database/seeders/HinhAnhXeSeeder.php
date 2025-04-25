<?php

namespace Database\Seeders;

use App\Models\HinhAnhXeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HinhAnhXeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        HinhAnhXeModel::insert([
            [
                'ma_xe'=>1, 
                'mat_truoc'=>'images\cars\Ford\Ford_Mustang\1.jpg', 
                'mat_ben'=>'images\cars\Ford\Ford_Mustang\9.jpg', 
                'mat_sau'=>'images\cars\Ford\Ford_Mustang\16.jpg', 
                'hinh_xe'=> 'images\cars\Ford\Ford_Mustang\xe.jpg', 
                'created_at'=>now(), 
                'updated_at'=>now(),],
            [
                'ma_xe'=>2, 
                'mat_truoc'=>'images/cars/Hyundai_Santa_FeV_MX5.jpg', 
                'mat_ben'=>'images/cars/Hyundai_Santa_FeV_MX5.jpg', 
                'mat_sau'=>'images/cars/Hyundai_Santa_FeV_MX5.jpg', 
                'hinh_xe'=> 'images/cars/Hyundai_Santa_FeV_MX5.jpg', 
                'created_at'=>now(), 
                'updated_at'=>now(),],
            [
                'ma_xe'=>3, 
                'mat_truoc'=>'images/cars/Ford_Mustang_Mach-ECX727.jpg', 
                'mat_ben'=>'images/cars/Ford_Mustang_Mach-ECX727.jpg', 
                'mat_sau'=>'images/cars/Ford_Mustang_Mach-ECX727.jpg', 
                'hinh_xe'=> 'images/cars/Ford_Mustang_Mach-ECX727.jpg', 
                'created_at'=>now(), 
                'updated_at'=>now(),]
            ]);
    }
}

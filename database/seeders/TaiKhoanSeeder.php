<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models;
use App\Models\TaiKhoanModel;
use Faker\Factory as Faker;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Khởi tạo Faker
        $faker = Faker::create();
        TaiKhoanModel::insert([
            ['id_user' => 1,'username' => 'dglocson',
                'email' => 'omonguyen0@gmail.com',
                'password' => bcrypt('123'), // Chắc chắn là mật khẩu đã mã hóa
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['id_user' => 2,'username' => 'phongphan',
                'email' => 'phantaithaiphong123@gmail.com',
                'password' => bcrypt('123'), // Chắc chắn là mật khẩu đã mã hóa
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),],
            ['id_user' => 3,'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123'), // Chắc chắn là mật khẩu đã mã hóa
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),]
        ]);

        
    }
}


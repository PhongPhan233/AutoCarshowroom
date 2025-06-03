<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\XeModel;
use App\Models\KieuXeModel;
use App\Models\LoaiXeModel;
use App\Models\HangXeModel;
use Faker\Factory as Faker;
class XeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Lấy danh sách ID có sẵn từ các bảng liên quan
        
        XeModel::insert([
            ['ma_xe' => 1,
                'ten_xe' => 'Ford Mustang VI FL2018',
                'ma_loai' => 1,
                'ma_kieu' => 3,
                'ma_hang' => 'H23',
                'ma_dongxe' => 1,
                'mo_rong' => 'images/chi_tiet/Ford/Ford_Mustang_VI_FL2018',
                'nsx' => 2018,
                'mo_ta' => 'Ford Mustang VI phiên bản nâng cấp giữa vòng đời (facelift) năm 2018 mang đến nhiều cải tiến đáng chú ý về thiết kế, hiệu suất và công nghệ, giúp mẫu xe cơ bắp Mỹ này trở nên hiện đại và hấp dẫn hơn.',
                'created_at' => now(),
                'updated_at' => now()],
            ['ma_xe' => 2,
                'ten_xe' => 'Mercedes AMG GTC190 FL 2019',
                'ma_loai' => 5,
                'ma_kieu' => 4,
                'ma_hang' => 'H17',
                'ma_dongxe' => 4,
                'mo_rong' => 'images/chi_tiet/Mercedes/Merceldes_AMG_GT',
                'nsx' => 2005,
                'mo_ta' => 'Mercedes-AMG GT C (C190) Facelift 2019 là xe thể thao 2 cửa, dùng động cơ V8 4.0L Biturbo, công suất 550 mã lực, tăng tốc 0–100 km/h trong 3,7 giây. Phiên bản facelift có lưới tản nhiệt Panamericana, đèn LED mới và thiết kế khí động học cải tiến.',
                'created_at' => now(),
                'updated_at' => now()],
            ['ma_xe' => 3,
                'ten_xe' => 'C',
                'ma_loai' => 3,
                'ma_kieu' => 3,
                'ma_hang' => 'H23',
                'ma_dongxe' => 3,
                'mo_rong' => '',
                'nsx' => 2000,
                'mo_ta' => 'àdijghaiuwehg',
                'created_at' => now(),
                'updated_at' => now()],
                ['ma_xe' => 4,
                'ten_xe' => 'D',
                'ma_loai' => 3,
                'ma_kieu' => 1,
                'ma_hang' => 'H23',
                'ma_dongxe' => 3,
                'mo_rong' => '',
                'nsx' => 2002,
                'mo_ta' => 'àdijghaiuwehg',
                'created_at' => now(),
                'updated_at' => now()],
        ]);
        
        
    }
}

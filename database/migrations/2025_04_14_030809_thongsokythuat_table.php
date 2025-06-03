<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('thong_so_ky_thuat');//Thông số kỹ thuật đi
        Schema::create('thong_so_ky_thuat', function (Blueprint $table) {
            $table->string('ma_xe')->primary();
            
            $table->float('tong_chieu_dai')->nullable();
            $table->float('chieu_rong_tong_the')->nullable();
            $table->float('chieu_cao_tong_the')->nullable();
            $table->float('khoang_sang_gam_xe')->nullable();
            $table->float('ban_kinh')->nullable();
            $table->float('van_toc_toi_da')->nullable();
            $table->string('dong_co')->nullable();
            $table->float('khoi_luong')->nullable();
            $table->foreign('ma_xe')->references('ma_xe')->on('xe');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_so_ky_thuat');
    }
};

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
        //
        Schema::dropIfExists('phieu_dang_ky');
        Schema::create('phieu_dang_ky', function (Blueprint $table) {
            $table->string('ma_phieu')->primary();
            $table->string('id_user');
            $table->timestamp('ngay_lap');
            $table->string('ma_loai');
            $table->timestamps();
        
            $table->foreign('id_user')->references('id_user')->on('tai_khoan');
            $table->foreign('ma_loai')->references('ma_loai')->on('loai_dich_vu');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('phieu_dang_ky');
    }
};

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
        Schema::dropIfExists('chi_tiet_phieu_dang_ky');
        Schema::create('chi_tiet_phieu_dang_ky', function (Blueprint $table) {
            $table->string('ma_phieu');
            
            $table->text('noi_dung')->nullable();
            
            
            $table->primary('ma_phieu');
            $table->foreign('ma_phieu')->references('ma_phieu')->on('phieu_dang_ky');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('chi_tiet_phieu_dang_ky');
    }
};

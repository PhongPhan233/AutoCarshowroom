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
        Schema::dropIfExists('xe');
        Schema::create('xe', function (Blueprint $table) {
            $table->string('ma_xe')->primary();
            $table->string('ten_xe');
            $table->string('ma_loai');
            $table->string('ma_kieu');
            $table->string('ma_hang');
            $table->year('nsx');
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        
            $table->foreign('ma_loai')->references('ma_loai')->on('loai_xe');
            $table->foreign('ma_kieu')->references('ma_kieu')->on('kieu_xe');
            $table->foreign('ma_hang')->references('ma_hang')->on('hang_xe');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('xe');
    }
};

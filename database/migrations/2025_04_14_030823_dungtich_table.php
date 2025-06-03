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
        Schema::dropIfExists('dung_tich');
        Schema::create('dung_tich', function (Blueprint $table) {
            $table->string('ma_xe')->primary();
            $table->float('dung_tich_nhien_lieu')->nullable();
            $table->float('dung_tich_khoang_hanh_ly')->nullable();
            $table->foreign('ma_xe')->references('ma_xe')->on('xe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dung_tich');
    }
};

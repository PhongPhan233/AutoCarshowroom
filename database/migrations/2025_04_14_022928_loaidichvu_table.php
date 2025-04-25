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
        Schema::dropIfExists('loai_dich_vu');
        Schema::create('loai_dich_vu', function (Blueprint $table) {
            $table->string('ma_loai')->primary();
            $table->string('ten_loai');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('loai_dich_vu');
    }
};

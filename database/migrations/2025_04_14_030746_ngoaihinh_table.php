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
        Schema::dropIfExists('ngoai_hinh');
        Schema::create('ngoai_hinh', function (Blueprint $table) {
            $table->string('ma_xe')->primary();
            $table->text('so_cua');
            $table->text('so_ghe');
            $table->text('mau_sac');
            
        
            
            $table->foreign('ma_xe')->references('ma_xe')->on('xe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngoai_hinh');
    }
};

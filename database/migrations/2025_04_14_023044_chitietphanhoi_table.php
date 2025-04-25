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
        Schema::dropIfExists('chi_tiet_phan_hoi');
        Schema::create('chi_tiet_phan_hoi', function (Blueprint $table) {
            $table->string('ma_phan_hoi');
            $table->text('noi_dung')->nullable();
            $table->timestamps();
        
            $table->primary('ma_phan_hoi');
            $table->foreign('ma_phan_hoi')->references('ma_phan_hoi')->on('phan_hoi');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('chi_tiet_phan_hoi');
    }
};

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
        Schema::dropIfExists('phan_hoi');
        Schema::create('phan_hoi', function (Blueprint $table) {
            $table->string('ma_phan_hoi')->primary();
            $table->string('id_user');
            $table->string('email');
            $table->timestamp('ngay_lap'); 
            $table->timestamps();
        
            $table->foreign('id_user')->references('id_user')->on('tai_khoan');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('phan_hoi');
    }
};

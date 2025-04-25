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
        Schema::dropIfExists('hang_xe');
        Schema::create('hang_xe', function (Blueprint $table) {
            $table->string('ma_hang')->primary();
            $table->string('ten_hang');
            $table->string('xuat_xu');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hang_xe');
    }
};

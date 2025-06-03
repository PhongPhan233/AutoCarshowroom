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
        Schema::create('dong_xe', function (Blueprint $table) {
            $table->string('ma_dongxe')->primary();
            $table->string('ma_hang');
            $table->string('ten_dongxe');

            $table->foreign('ma_hang')->references('ma_hang')->on('hang_xe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

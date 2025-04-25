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
        Schema::dropIfExists('HinhAnhXe');
        Schema::create("HinhAnhXe", function (Blueprint $table) {
            $table->string("ma_xe")->primary();
            $table->text("mat_truoc")->nullable();
            $table->text("mat_ben")->nullable();
            $table->text("mat_sau")->nullable();
            $table->text("hinh_xe")->nullable();
            $table->timestamps();

            $table->foreign('ma_xe')->references('ma_xe')->on('xe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HinhAnhXe');
    }
};

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
        Schema::create("car360", function (Blueprint $table) {
            $table->string("ma_xe")->primary();
            $table->text("view")->nullable();
            $table->text("view_3D")->nullable();
            $table->timestamps();

            $table->foreign('ma_xe')->references('ma_xe')->on('xe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("car360");
    }
};

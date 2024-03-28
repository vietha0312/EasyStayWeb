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
        Schema::create('dat_phong_dich_vus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dat_phong_id');
            $table->unsignedBigInteger('dich_vu_id');
            $table->foreign('dat_phong_id')->references('id')->on('dat_phongs')->onDelete('cascade');
            $table->foreign('dich_vu_id')->references('id')->on('dich_vus')->onDelete('cascade');
            $table->bigInteger('so_luong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_phong_dich_vus');
    }
};

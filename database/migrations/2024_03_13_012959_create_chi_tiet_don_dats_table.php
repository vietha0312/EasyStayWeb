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
        Schema::create('chi_tiet_don_dats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_phong');
            $table->bigInteger('id_don_dat');
            $table->string('CMND', 225);
            $table->string('ten', 225);
            $table->string('so dien thoai', 225);
            $table->bigInteger('gioi_han_nguoi');
            $table->bigInteger('slg_phong');
            $table->decimal('tong_tien');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_dats');
    }
};

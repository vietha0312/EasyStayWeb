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
        Schema::create('don_dats', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phong', 225);
            $table->date('ngay_dat');
            $table->bigInteger('khach_hang_id');
            $table->string('payment', 225);
            $table->string('ghi_chu', 225);
            $table->boolean('trang_thai')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_dats');
    }
};

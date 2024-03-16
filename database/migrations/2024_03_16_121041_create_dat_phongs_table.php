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
        Schema::create('dat_phongs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_khach_hang');
            $table->bigInteger('id_loai_phong');
            $table->string('ten_khach_hang', 225);
            $table->string('email');
            $table->string('sdt');
            $table->string('thoi_gian_den');
            $table->string('thoi_gian_di');
            $table->string('so_luong_nguoi');
            $table->string('so_luong_phong');
            $table->bigInteger('id_dich_vu');
            $table->string('tong_tien');
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
        Schema::dropIfExists('dat_phongs');
    }
};

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
            $table->unsignedBigInteger('khach_hang_id');
            $table->foreign('khach_hang_id')->references('id')->on('users');
            $table->unsignedBigInteger('loai_phong_id');
            $table->foreign('loai_phong_id')->references('id')->on('loai_phongs');
            // $table->string('ten_khach_hang', 225);
            // $table->string('email');
            // $table->string('so_dien_thoai');
            $table->datetime('thoi_gian_den');
            $table->datetime('thoi_gian_di');
            $table->integer('so_luong_nguoi');
            $table->integer('so_luong_phong');
            $table->unsignedBigInteger('dich_vu_id');
            $table->foreign('dich_vu_id')->references('id')->on('dich_vus');
            $table->decimal('tong_tien');
            $table->string('payment', 225);
            $table->string('ghi_chu', 225)->nullable();
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

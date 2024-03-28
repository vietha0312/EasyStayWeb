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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('loai_phong_id')->nullable();
            $table->foreign('loai_phong_id')->references('id')->on('loai_phongs');
            $table->unsignedBigInteger('phong_id')->nullable();
            $table->foreign('phong_id')->references('id')->on('phongs');
            $table->decimal('don_gia')->nullable();
            $table->integer('so_luong_nguoi');
            $table->integer('so_luong_phong');
            $table->dateTime('thoi_gian_den');
            $table->dateTime('thoi_gian_di');
            $table->unsignedBigInteger('dich_vu_id')->nullable();
            $table->foreign('dich_vu_id')->references('id')->on('dich_vus');
            $table->unsignedBigInteger('khuyen_mai_id')->nullable();
            $table->foreign('khuyen_mai_id')->references('id')->on('khuyen_mais');
            $table->string('payment');
            $table->decimal('tong_tien')->nullable();
            $table->boolean('trang_thai')->default(0);
            $table->string('ghi_chu')->nullable();
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

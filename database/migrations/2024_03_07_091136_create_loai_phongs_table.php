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
        Schema::create('loai_phongs', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->text('anh');
            $table->double('gia');
            $table->double('gia_ban_dau')->nullable();
            $table->integer('gioi_han_nguoi');
            $table->integer('so_luong');
            $table->text('mo_ta_ngan');
            $table->text('mo_ta_dai');
            $table->boolean('trang_thai');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loai_phongs');
    }
};

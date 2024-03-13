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
        Schema::create('khach_san', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('logo');
            $table->string('so_dien_thoai');
            $table->string('email');
            $table->string('dia_chi');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_san');
    }
};

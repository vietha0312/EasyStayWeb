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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ten_nguoi_dung');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dia_chi');
            $table->string('so_dien_thoai');
            $table->unsignedBigInteger('id_vai_tro');
            // $table->foreign('id_vai_tro')->constrained('vai_tros');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_vai_tro')->references('id')->on('vai_tros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

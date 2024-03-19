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
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->id();
            $table->string('noi_dung')->nullable();
            $table->string('anh')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('loai_phong_id')->constrained();
            
            // $table->unsignedBigInteger('user_id');
            // $table->foreignId('user_id')->references('id')->on('users');

            // $table->unsignedBigInteger('loai_phong_id');
            // $table->foreignId('loai_phong_id')->references('id')->on('loai_phongs');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gias');
    }
};

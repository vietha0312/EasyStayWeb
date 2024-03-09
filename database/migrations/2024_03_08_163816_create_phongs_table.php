<?php

use App\Models\Phong;
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
        Schema::create('phongs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phong')->unique();
            $table->foreignId('loai_phong_id')->constrained();
            $table->string('mo_ta')->nullable();
            $table->boolean('trang_thai')->default(Phong::CON_PHONG);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phongs');
    }
};

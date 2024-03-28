<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vai_tros', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chuc_vu');
            $table->string('mo_ta')->nullable();
            $table->boolean('trang_thai');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('vai_tros')->insert([
            'ten_chuc_vu' => 'Người dùng',
            'mo_ta' => '',
            'trang_thai' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('vai_tros')->insert([
            'ten_chuc_vu' => 'Admin',
            'mo_ta' => '',
            'trang_thai' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('vai_tros')->insert([
            'ten_chuc_vu' => 'Nhân viên',
            'mo_ta' => '',
            'trang_thai' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vai_tros');
    }
};

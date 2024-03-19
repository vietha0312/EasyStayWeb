<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DanhGia;
use Illuminate\Database\Seeder;

class DanhgiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DanhGia::factory()->count(10)->create([
            'noi_dung' => 'Đánh giá mẫu',
            'anh' => 'duongdananh.jpg',
            'user_id' => 1,
            'phong_id' => 1,
        ]);
    }
}

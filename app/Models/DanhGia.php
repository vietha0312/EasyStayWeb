<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
    protected $table = 'danh_gias';
    protected $fillable = [
        'noi_dung',
        'anh',
        'user_id',
        'phong_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Định nghĩa mối quan hệ với model Phong
    public function phong()
    {
        return $this->belongsTo(Phong::class);
    }

}

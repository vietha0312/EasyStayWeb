<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete


class Phong extends Model
{
    use HasFactory,
        SoftDeletes;

    const CON_PHONG = 1;
    const HET_PHONG = 0;

    protected $fillable = [
        'ten_phong',
        'loai_phong_id',
        'gioi_han_nguoi',
        'mo_ta',
        'trang_thai',
    ];

    protected function loai_phong()
    {
        return $this->belongsTo(Loai_phong::class);
    }
}

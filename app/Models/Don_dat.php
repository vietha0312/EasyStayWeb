<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Don_dat extends Model
{
    use HasFactory, SoftDeletes;

    const DA_XAC_NHAN = 1;
    const CHO_XAC_NHAN = 0;

    protected $fillable = [
        'ma_phong',
        'ngay_dat',
        'khach_hang_id',
        'payment',
        'ghi_chu',
        'trang_thai',
    ];
}

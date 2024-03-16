<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatPhong extends Model
{
    use HasFactory, SoftDeletes;

    const DA_XAC_NHAN = 1;
    const CHO_XAC_NHAN = 0;

    protected $fillable = [
        'id_khach_hang',
        'id_loai_phong',
        'ten_khach_hang',
        'email',
        'sdt',
        'thoi_gian_den',
        'thoi_gian_di',
        'so_luong_nguoi',
        'so_luong_phong',
        'id_dich_vu',
        'tong_tien',
        'payment',
        'ghi_chu',
        'trang_thai'
    ];
}

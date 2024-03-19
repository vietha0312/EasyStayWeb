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

    protected $table = 'dat_phongs';
    protected $fillable = [
        'id_khach_hang',
        'id_loai_phong',
        'thoi_gian_den',
        'thoi_gian_di',
        'so_dien_thoai',
        'so_luong_nguoi',
        'so_luong_phong',
        'id_dich_vu',
        'tong_tien',
        'payment',
        'ghi_chu',
        'trang_thai'
    ];
    protected function user()
    {
        return $this->belongsTo(User::class);
    }
    protected function dich_vu()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(DichVu::class);
    }
    protected function loai_phong()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(Loai_phong::class);
    }
}

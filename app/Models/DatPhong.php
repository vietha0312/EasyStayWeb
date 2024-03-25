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
        'user_id',
        'loai_phong_id',
        'phong_id',
        'don_gia',
        'so_luong_nguoi',
        'so_luong_phong',
        'thoi_gian_den',
        'thoi_gian_di',
        'khuyen_mai_id',
        'tong_tien',
        'payment',
        'trang_thai',
        'ghi_chu',
    ];
    protected function user()
    {
        return $this->belongsTo(User::class);
    }
    protected function phong()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(Phong::class);
    }
    protected function loai_phong()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(Loai_phong::class);
    }
    protected function khuyen_mai()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(KhuyenMai::class);
    }
}

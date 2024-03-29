<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class KhuyenMai extends Model
{
    use HasFactory,
    SoftDeletes;
    //lOẠI GIẢM GIÁ
    const GIAM_THEO_PHAN_TRAM = 1;
    const GIAM_THEO_VND = 0; 
    //TRẠNG THÁI
    const DANG_AP_DUNG = 1;
    const KET_THUC = 0; 
   
protected $fillable = [
    'ten_khuyen_mai',
    'loai_phong_id',
    'ma_giam_gia',
    'loai_giam_gia',
    'gia_tri_giam',
    'mo_ta',
    'so_luong',
    'ngay_bat_dau',
    'ngay_ket_thuc',
    'trang_thai',
];

protected $dates = ['ngay_bat_dau', 'ngay_ket_thuc'];

public function getTrangThaiAttribute($value)
    {
        if ($this->ngay_ket_thuc < Carbon::now()) {
            return 1; // Kết thúc
        } else {
            return $value; // Đang áp dụng
        }
    }


public function loai_phong()
{
    return $this->belongsTo(Loai_phong::class);
}

}

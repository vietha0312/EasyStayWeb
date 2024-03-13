<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    'phong_id',
    'ma_giam_gia',
    'loai_giam_gia',
    'gia_tri_giam',
    'mo_ta',
    'so_luong',
    'ngay_bat_dau',
    'ngay_ket_thuc',
    'trang_thai',
];

public function phong()
{
    return $this->belongsTo(Phong::class);
}

}

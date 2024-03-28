<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ChiTietDatPhong extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'chi_tiet_dat_phongs';
    protected $fillable =
    [
        'dat_phong_id',
        'thanh_tien',
    ];

    protected function dat_phong()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(DatPhong::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($chiTietDatPhong) {
    //         // Lấy thông tin từ bảng dat_phong
    //         $datPhong = DB::table('dat_phongs')->find($chiTietDatPhong->dat_phong_id);
    //         $dichVuIds = explode(',', $chiTietDatPhong->dich_vu_id);
    //         if ($datPhong !== null) {
    //             $tongDichVu = 0;
    //             foreach ($dichVuIds as $dichVuId) {
    //                 $dichVu = DB::table('dich_vus')->find($dichVuId);
    //                 if ($dichVu !== null) {
    //                     $tongDichVu += $dichVu->gia;
    //                 }
    //             }
    //         $chiTietDatPhong->thanh_tien = $datPhong->tong_tien + $tongDichVu;
    // }});

    // }
}

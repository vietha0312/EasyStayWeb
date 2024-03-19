<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietDatPhong extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'chi_tiet_dat_phongs';
    protected $fillable =
    [
        'phong_id',
        'dat_phong_id',
        'don_gia',
        'dich_vu_id',
        'thanh_tien',
    ];
    protected function loai_phong()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(Loai_phong::class);
    }
    protected function dat_phong()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(DatPhong::class);
    }
    protected function dich_vu()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(DichVu::class);
    }
}

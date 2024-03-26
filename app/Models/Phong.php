<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete


class Phong extends Model
{
    use HasFactory,
        SoftDeletes;
    protected $table = 'phongs';

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
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(Loai_phong::class);
    }

    // protected function dat_phong(){
    //     return $this->hasMany(DatPhong::class);
    // }


    public function datPhong()
    {
        return $this->hasMany(datPhong::class, 'phong_id', 'id');
    }
}

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

    public function datPhong()
    {
        return $this->hasMany(datPhong::class, 'phong_id', 'id');
    }
    public function datPhongs()
    {
        return $this->belongsToMany(DatPhong::class, 'dat_phong_noi_phongs', 'phong_id', 'dat_phong_id');
    }
    public function chiTietDatPhong()
    {
        return $this->hasMany(ChiTietDatPhong::class, 'phong_id', 'id');
    }
    protected static function boot(){
        parent::boot();
        static::updating(function($phong){
            //Kiểm tra trạng thái của phòng đang được cập nhật từ 1 sang

            if($phong->isDirty('trang_thai') && $phong->trang_thai == 0){
                //
            }
        });
    }
}

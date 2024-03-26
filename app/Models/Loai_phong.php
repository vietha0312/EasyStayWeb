<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class Loai_phong extends Model
{
    use HasFactory,
        SoftDeletes;

    const CON_PHONG = 1;
    const HET_PHONG = 0;    
    protected $fillable = [
        'ten',
        'anh',
        'gia',
        'gia_ban_dau',
        'gioi_han_nguoi',
        'so_luong',
        'mo_ta_ngan',
        'mo_ta_dai',
        'trang_thai',
    ];

    public function anhPhong(){
        return $this->hasMany('App\Models\Anh_phong');
    }

    public function Phong(){
        return $this->hasMany(Phong::class);
    }

    // protected static function boot(){
    //     parent::boot();
    //     static::saved(function($loaiphongs){
    //         //Kiem tra so luong phong trong cua loai phong
    //         if($loaiphongs->available_phongs == 0){
    //             //Cap nhat trang thai cua loai phong thanh het phong
    //             $loaiphongs->trang_thai = 0;
    //             $loaiphongs->save();
    //         }
    //     });
    // }

   

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chi_tiet_don_dat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'phong_id',
        'don_dat_id',
        'CMND',
        'ten',
        'so dien thoai',
        'gioi_han_nguoi',
        'slg_phong',
        'tong_tien',
    ];

    protected function don_dat(){
        return $this->belongsTo(Don_dat::class);
    }

    protected function phong(){
        return $this->belongsTo(Phong::class);
    }
}

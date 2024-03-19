<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class Bai_viet extends Model
{
    use HasFactory,
        SoftDeletes;

    const XUAT_BAN = 1;
    const NHAP = 0;
    protected $fillable = [
        'tieu_de',
        'anh',
        'mo_ta_ngan',
        'noi_dung',
        'trang_thai',

    ];
}

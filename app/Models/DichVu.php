<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    use HasFactory;
        //TRẠNG THÁI
        const AP_DUNG = 1;
        const KET_THUC = 0; 
       
    protected $fillable = [
        'ten_dich_vu',
        'gia',
        'so_luong',
        'trang_thai',
    ];
}

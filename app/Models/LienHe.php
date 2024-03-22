<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LienHe extends Model
{
    use HasFactory, SoftDeletes;

    const DA_PHAN_HOI = 1;
    const CHO_PHAN_HOI = 0;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'comments',
        'trang_thai'
    ];
}

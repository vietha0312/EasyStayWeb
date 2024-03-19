<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten',
        'logo',
        'so_dien_thoai',
        'email',
        'mo_ta',
        'dia_chi',
        'facebook',
        'instagram',
        'twitter',
    ];
}

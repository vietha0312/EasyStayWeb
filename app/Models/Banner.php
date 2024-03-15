<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes ;

    const ACTIVE = 1;
    const IN_ACTIVE = 0;

    protected $fillable = ["anh","mo_ta","trang_thai"];
}

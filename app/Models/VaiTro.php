<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaiTro extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'vai_tros';
    const HOAT_DONG=1;
    const DUNG_HOAT_DONG=0;
    protected $fillable = ['ten_chuc_vu', 'mo_ta', 'trang_thai'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_vai_tro', 'id');
    }
}

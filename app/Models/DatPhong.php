<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class DatPhong extends Model
{
    use HasFactory, SoftDeletes;

    const DA_XAC_NHAN = 1;
    const CHO_XAC_NHAN = 0;

    protected $table = 'dat_phongs';
    protected $fillable = [
        'user_id',
        'loai_phong_id',
        'phong_id',
        'phong_ids',
        'don_gia',
        'so_luong_nguoi',
        'so_luong_phong',
        'thoi_gian_den',
        'thoi_gian_di',
        'dich_vu_id',
        'khuyen_mai_id',
        'tong_tien',
        'payment',
        'trang_thai',
        'ghi_chu',
    ];
    protected function user()
    {
        return $this->belongsTo(User::class);
    }
    public function phongs()
    {
        return $this->belongsToMany(Phong::class, 'dat_phong_noi_phongs', 'dat_phong_id', 'phong_id');
    }
    protected function loai_phong()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(Loai_phong::class);
    }
    protected function khuyen_mai()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(KhuyenMai::class);
    }
    protected function dich_vu()
    {
        // return $this->belongsTo('App\Models\Loai_phong','loai_phong_id','id');
        return $this->belongsTo(DichVu::class);
    }

    protected $phongIdTemp;

    // Phương thức để gán phong_id tạm thời
    public function setPhongIdTemp($phongId)
    {
        $this->phongIdTemp = $phongId;
        return $this;
    }

    // Phương thức để lấy phong_id tạm thời
    public function getPhongIdTemp()
    {
        return $this->phongIdTemp;
    }
    public function datPhongNoiPhong(){
        return $this->hasMany(DatPhongNoiPhong::class);
    }

    // public function getPhongIdsAttribute($value)
    // {
    //     return explode(',', $value);
    // }

    // public function setPhongIdsAttribute($value)
    // {
    //     $this->attributes['phongIds'] = implode(',', $value);
    // }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Http\Request;

class DatPhongController extends Controller
{
    const PATH_VIEW = 'admin.dat_phong.';

    public function index(){
        $datphong = DatPhong::query()->latest()->paginate(7);
        return view(self::PATH_VIEW. __FUNCTION__, compact('datphong'));
    }


}

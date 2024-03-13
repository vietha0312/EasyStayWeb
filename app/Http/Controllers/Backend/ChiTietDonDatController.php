<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Chi_tiet_don_dat;
use Illuminate\Http\Request;

class ChiTietDonDatController extends Controller
{
    const PATH_VIEW = 'admin.chi_tiet_don_dat.';

    public function index(){
        $chitiet = Chi_tiet_don_dat::query()->latest()->paginate(7);
        return view(self::PATH_VIEW. __FUNCTION__, compact('chitiet'));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Don_dat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DonDatController extends Controller
{
    const PATH_VIEW = 'admin.don_dat.';

    public function index()
    {
        $dondat = Don_dat::query()->latest()->paginate(7);
        return view(self::PATH_VIEW . __FUNCTION__, compact('dondat'));
    }


}

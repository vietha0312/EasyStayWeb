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

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ma_phong' => 'required|unique:don_dats|max:225',
            'ngay_dat' => 'date',
            'khach_hang_id' => 'required|unique:don_dats|max:225',
            'payment' => 'required|max:225',
            'ghi_chu' => 'nullable',
            'trang_thai' => [
                'required',
                Rule::in([
                    Don_dat::DA_XAC_NHAN,
                    Don_dat::CHO_XAC_NHAN
                ])
            ],
        ]);

        Don_dat::query()->create($request->all());

        return back()->with('msg', 'Add Success');
    }




}

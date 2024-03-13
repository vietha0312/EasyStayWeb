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

    public function edit(Request $request, Don_dat $don_dat){
        return view(self::PATH_VIEW . __FUNCTION__, compact('don_dat'));
    }

    public function update(Request $request, Don_dat $don_dat)
    {
        $request->validate([
            'ma_phong' => 'required|max:225',
            'ngay_dat' => 'date',
            'khach_hang_id' => 'required|max:225',
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

        $don_dat->update($request->all());

        return back()->with('msg', 'Update Success');
    }






}

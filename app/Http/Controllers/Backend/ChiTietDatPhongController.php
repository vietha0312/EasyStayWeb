<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChiTietDatPhongDataTable;
use App\Http\Controllers\Controller;
use App\Models\ChiTietDatPhong;
use Illuminate\Http\Request;

class ChiTietDatPhongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.chi_tiet_dat_phong.';

    public function index(Request $request, ChiTietDatPhongDataTable $datatables){
        // $chi_tiet_dat_phong = ChiTietDatPhong::query()->latest()->paginate(7);
        return $datatables->render(self::PATH_VIEW. __FUNCTION__    );
    }
    public function create()
    {
        // $loai_phong = Loai_phong::query()->pluck('ten','id')->toArray();
        // return view(self::PATH_VIEW . __FUNCTION__, compact('loai_phong'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'ten_phong' => 'required|unique::phongs',
        //     'loai_phong_id' => [
        //         Rule::exists('phongs','id')
        //     ],
        //     'mo_ta' => 'required',
        //     'trang_thai' => 'required',
        //     // 'trang_thai' => [
        //     //     Rule::in([1,0])
        //     // ],
        // ]);
        ChiTietDatPhong::query()->create($request->all());
        return back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(ChiTietDatPhong $chiTietDatPhong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChiTietDatPhong $chiTietDatPhong)
    {
        // $loai_phong = Loai_phong::query()->pluck('ten','id')->toArray();
        // dd($phong);
        return view(self::PATH_VIEW . __FUNCTION__, compact('loai_phong'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChiTietDatPhong $chiTietDatPhong)
    {
        // $request->validate([
        //     'ten_phong' => 'required|unique::phongs,ten_phong,' . $phong->id,
        //     'loai_phong_id' => [
        //         Rule::exists('phongs','id')
        //     ],
        //     'mo_ta' => 'required',
        //     'trang_thai' => 'required',
        //     'trang_thai' => [
        //         Rule::in([1,0])
        //     ],
        // ]);
        $chiTietDatPhong->update($request->all());
        return back()->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChiTietDatPhong $chiTietDatPhong)
    {
        $chiTietDatPhong->delete();
        return response(['trang_thai' => 'success']);
    }
}

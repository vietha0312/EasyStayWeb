<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DatPhongDataTable;
use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Http\Request;
use App\Models\DichVu;
use App\Models\User;
use App\Models\Loai_phong;

class DatPhongController extends Controller
{
    const PATH_VIEW = 'admin.dat_phong.';

    public function index(Request $request, DatPhongDataTable $datatables){
        $datphong = DatPhong::query()->latest()->paginate(7);
        return $datatables->render(self::PATH_VIEW. __FUNCTION__, compact('datphong'));
    }
    public function create()
    {
        // $loai_phong = Loai_phong::query()->pluck('ten','id')->toArray();
        // $user = User::query()->pluck('ten_nguoi_dung','id')->toArray();
        // $dich_vu= DichVu::query()->pluck('ten','id')->toArray();
        // return view(self::PATH_VIEW . __FUNCTION__, compact('loai_phong','user','dich_vu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DatPhong::query()->create($request->all());
        // return back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(DatPhong $datPhong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DatPhong $datPhong)
    {
        $loai_phong = Loai_phong::query()->pluck('ten','id')->toArray();
        $user = User::query()->pluck('ten_nguoi_dung','id')->toArray();
        $dich_vu= DichVu::query()->pluck('ten','id')->toArray();
        return view(self::PATH_VIEW . __FUNCTION__, compact('loai_phong','datPhong','user','dich_vu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DatPhong $datPhong)
    {
        // $request->validate([
        //     'ten_phong' => 'required|unique::phongs,ten_phong,' . $datPhong->id,
        //     'loai_phong_id' => [
        //         Rule::exists('phongs','id')
        //     ],
        //     'mo_ta' => 'required',
        //     'trang_thai' => 'required',
        //     'trang_thai' => [
        //         Rule::in([1,0])
        //     ],
        // ]);
        $datPhong->update($request->all());
        return back()->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatPhong $datPhong)
    {
        $datPhong->delete();
        return response(['trang_thai' => 'success']);
    }

}

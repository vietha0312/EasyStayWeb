<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\PhongDataTable;
use App\Models\Phong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Loai_phong;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.phong.';

    public function index(Request $request, PhongDataTable $datatables)
    {
        $loai_phong = Loai_phong::findOrFail($request->loai_phong);
        return $datatables->render('admin.phong.index', compact('loai_phong'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loai_phong = Loai_phong::query()->pluck('ten','id')->toArray();
        return view(self::PATH_VIEW . __FUNCTION__, compact('loai_phong'));
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
        Phong::query()->create($request->all());
        return back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Phong $phong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phong $phong)
    {
        $loai_phong = Loai_phong::query()->pluck('ten','id')->toArray();
        // dd($phong);
        return view(self::PATH_VIEW . __FUNCTION__, compact('loai_phong','phong'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phong $phong)
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
        $phong->update($request->all());
        return back()->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phong $phong)
    {
        $phong->delete();
        return response(['trang_thai' => 'success']);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\Phong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Loai_phong;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.phong.';
    public function index()
    {
        $data = Phong::query()->latest()->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
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
        $phong->update($request->all());
        return back()->with('msg','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phong $phong)
    {
        $phong->delete();
        return back()->with('msg', 'Xóa thành công');
    }
}

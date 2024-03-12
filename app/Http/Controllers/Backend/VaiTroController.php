<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VaiTro;

class VaiTroController extends Controller
{
    //
    const PATH_VIEW = 'admin.vai_tro.';
    public function index()
    {
        $data = VaiTro::query()->latest()->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        VaiTro::query()->create($request->all());
        return back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(VaiTro $vai_tro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VaiTro $vai_tro)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('vai_tro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VaiTro $vai_tro)
    {
        $vai_tro->update($request->all());
        return back()->with('msg','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaiTro $vai_tro)
    {
        $vai_tro->delete();
        return back()->with('msg', 'Xóa thành công');
    }
}

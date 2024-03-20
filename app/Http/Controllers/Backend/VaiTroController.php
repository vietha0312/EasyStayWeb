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
    public function phanQuyen(){
        $data = VaiTro::query();
        return $data;

    }
    // if($data->ten_chuc_vu === 'Admin') {
    //     echo '<li>
    //             <a href="'. url('admin') .'" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="settings" class="size-4 me-2"></i>Cài đặt Admin</a>
    //         </li>';
    // }
}

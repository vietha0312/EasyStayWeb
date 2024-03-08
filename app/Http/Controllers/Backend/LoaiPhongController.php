<?php

namespace App\Http\Controllers\Backend;

use App\Models\Loai_phong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LoaiPhongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_UPLOAD = 'loai_phong';
    public function index()
    {
        $data = Loai_phong::query()->latest()->paginate();
        return view('admin.loai_phong.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.loai_phong.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('anh');
        if($request->hasFile('anh')){
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        }
        Loai_phong::query()->create($data);
        return back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loai_phong $loai_phong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loai_phong $loai_phong)
    {
        return view('admin.loai_phong.edit', compact('loai_phong'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loai_phong $loai_phong)
    {
        $data = $request->except('anh');
        if($request->hasFile('anh')){
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        }
        $oldAnh = $loai_phong->anh;
        if($request->hasFile('anh') && Storage::exists($oldAnh)){
            Storage::delete($oldAnh);
        }
        $loai_phong->update($data);
        return back()->with('msg','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loai_phong $loai_phong)
    {
        $loai_phong->delete();
        if(Storage::exists($loai_phong->anh)){
            Storage::delete($loai_phong->anh);
        }
        return back()->with('msg','Xóa thành công');
    }
}

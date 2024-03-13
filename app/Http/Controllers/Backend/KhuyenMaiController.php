<?php

namespace App\Http\Controllers\Backend;

use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use App\Models\Phong;
use App\Http\Controllers\Controller;



class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $khuyenMaiList = KhuyenMai::all();
        return view('admin.khuyen_mai.index', compact('khuyenMaiList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $phongList = Phong::all();
        return view('admin.khuyen_mai.create', compact('phongList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
 $data=$request->all();
    $request->validate([
        'ten_khuyen_mai' => 'required|string|max:255',
        'phong_id' => 'required|integer|exists:phongs,id',
        'ma_giam_gia' => 'required|string|max:255|unique:khuyen_mais,ma_giam_gia',
        'loai_giam_gia' => 'required|boolean',
        'gia_tri_giam' => 'required|numeric',
        'so_luong' => 'required|integer',
        'ngay_bat_dau' => 'required|date',
        'ngay_ket_thuc' => 'required|date|after:ngay_bat_dau',
        'trang_thai' => 'required|boolean',
        'mo_ta' => 'nullable|string',
    ]);

    
    KhuyenMai::query()->create($data);
    return redirect()->route('admin.khuyen_mai.index')->with('success', 'Tạo khuyến mãi thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(KhuyenMai $khuyenMai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KhuyenMai $khuyenMai)
    {
        //
        
        $phongList = Phong::all();
        return view('admin.khuyen_mai.edit', compact('khuyenMai','phongList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $khuyenMai = KhuyenMai::findOrFail($id);

    $request->validate([
        'ten_khuyen_mai' => 'required|string|max:255',
        'ma_giam_gia' => 'required|string|max:255|unique:khuyen_mais,ma_giam_gia,' . $khuyenMai->id,
        'phong_id' => 'required|integer|exists:phongs,id',
        'loai_giam_gia' => 'required|boolean',
        'gia_tri_giam' => 'required|numeric',
        'so_luong' => 'required|integer',
        'ngay_bat_dau' => 'required|date',
        'ngay_ket_thuc' => 'required|date|after:ngay_bat_dau',
        'trang_thai' => 'required|boolean',
        'mo_ta' => 'nullable|string',
    ]);

    $khuyenMai->update($request->all());
    return redirect()->route('admin.khuyen_mai.index')->with('success', 'Cập nhật khuyến mãi thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KhuyenMai $khuyenMai)
    {
        //
        $khuyenMai->delete();
      
        return back()->with('msg','Xóa thành công');
    }
}

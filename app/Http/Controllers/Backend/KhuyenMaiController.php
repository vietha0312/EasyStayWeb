<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\KhuyenMaiDataTable;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use App\Models\Phong;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Loai_phong;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, KhuyenMaiDataTable $datatables)
    {

        return $datatables->render('admin.khuyen_mai.index');
        // $khuyenMaiList = KhuyenMai::all();
        // return view('admin.khuyen_mai.index', compact('khuyenMaiList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $loai_phongs = Loai_phong::all();
        return view('admin.khuyen_mai.create', compact('loai_phongs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user): RedirectResponse
    {
        if (! Gate::allows('create', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        //
 $data=$request->all();
    $request->validate([
        'ten_khuyen_mai' => 'required|string|max:255',
        'loai_phong_id' => 'required|integer|exists:phongs,id',
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

        $loai_phongs = Loai_phong::all();
        return view('admin.khuyen_mai.edit', compact('khuyenMai','loai_phongs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, User $user): RedirectResponse
    {
        if (! Gate::allows('update', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        //
        $khuyenMai = KhuyenMai::findOrFail($id);

    $request->validate([
        'ten_khuyen_mai' => 'required|string|max:255',
        'ma_giam_gia' => 'required|string|max:255|unique:khuyen_mais,ma_giam_gia,' . $khuyenMai->id,
        'loai_phong_id' => 'required|integer|exists:phongs,id',
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
    public function destroy(KhuyenMai $khuyenMai, User $user): RedirectResponse
    {
        if (! Gate::allows('delete', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        //
        $khuyenMai->delete();

        // return back()->with('msg','Xóa thành công');
        return response(['trang_thai' => 'success']);

    }
}

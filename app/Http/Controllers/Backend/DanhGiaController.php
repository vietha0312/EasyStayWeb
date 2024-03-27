<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DanhGiaDataTable;
use App\Models\DanhGia;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Loai_phong;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, DanhGiaDataTable $datatable, User $user)
    {
        if (!Gate::allows('view', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        } else {
            $loai_phong = Loai_phong::findOrFail($request->loai_phong);
            return $datatable->render('admin.danh_gia.index', compact('loai_phong'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DanhGia $danhGia)
    {
        if (auth()->check()) {
            $danhgia = new DanhGia();
            $danhgia->noi_dung = $request->input('noi_dung');
            $danhgia->loai_phong_id = $request->loai_phong_id;
            $danhgia->user_id = auth()->id();
            $danhgia->save();
            return back();
        } else {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, User $user): RedirectResponse
    {
        if (!Gate::allows('delete', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $deleteData = DanhGia::findOrFail($id);
        $deleteData->delete();

        return response(['trang_thai' => 'success']);
        // return redirect(route('admin.danh_gia.index'))->with('success', 'Ẩn bản ghi thành công.');
    }
}

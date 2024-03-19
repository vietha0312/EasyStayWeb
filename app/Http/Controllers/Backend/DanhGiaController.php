<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DanhGiaDataTable;
use App\Models\DanhGia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Loai_phong;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, DanhGiaDataTable $datatable)
    {
        $loai_phong = Loai_phong::findOrFail($request->loai_phong);
        return $datatable->render('admin.danh_gia.index', compact('loai_phong'));
        // $data = DanhGia::all();
		// return view('admin.danh_gia.index', compact('data'));
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
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        $deleteData = DanhGia::findOrFail($id);
		$deleteData->delete();

        return response(['trang_thai' => 'success']);
		// return redirect(route('admin.danh_gia.index'))->with('success', 'Ẩn bản ghi thành công.');
    }
}

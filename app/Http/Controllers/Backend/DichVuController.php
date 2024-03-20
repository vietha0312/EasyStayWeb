<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DichVuDataTable;
use App\Models\DichVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DichVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, DichVuDataTable $datatable)
    {
        return $datatable->render('admin.dich_vu.index');
        // $dichVuList = DichVu::all();
        // return view('admin.dich_vu.index', compact('dichVuList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.dich_vu.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data=$request->all();
         $request->validate([
            'ten_dich_vu' => 'required',
            'gia' => 'required|numeric',
            'so_luong' => 'required|numeric',
            'trang_thai' => 'required|numeric',
        ]);
       

        DichVu::create($data);

        return redirect()->route('admin.dich_vu.index')->with('success', 'Thêm mới dịch vụ thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DichVu $dichVu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DichVu $dichVu)
    {
        //
        return view('admin.dich_vu.edit', compact('dichVu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $dichVu = DichVu::findOrFail($id);
        $data = $request->validate([
            'ten_dich_vu' => 'required',
            'gia' => 'required|numeric',
            'so_luong' => 'required|numeric',
            'trang_thai' => 'required|numeric',
        ]);

        $dichVu->update($request->all());

        return redirect()->route('admin.dich_vu.index')->with('success', 'Cập nhật dịch vụ thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DichVu $dichVu)
    {
        //
        $dichVu->delete();
      
        return response(['trang_thai' => 'success']);

    }
}

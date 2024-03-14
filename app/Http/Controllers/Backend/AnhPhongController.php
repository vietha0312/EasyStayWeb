<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AnhPhongDataTable;
use App\Models\Anh_phong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Loai_phong;
use App\Traits\ImageUploadTrait;


class AnhPhongController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, AnhPhongDataTable $datatables)
    {
        $loai_phong = Loai_phong::findOrFail($request->loai_phong);
        // return view('admin.loai_phong.anh_phong.index',compact('loai_phong'));
        return $datatables->render('admin.loai_phong.anh_phong.index', compact('loai_phong'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'anh.*' => ['required', 'image'],
        ]);

        $anh = $this->uploadMultiImage($request, 'anh', 'upload/anh_phong');

        foreach($anh as $path){
            $anh_phong = new Anh_phong();
            $anh_phong->anh = $path;
            $anh_phong->loai_phong_id = $request->loai_phong_id;
            $anh_phong->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Anh_phong $anh_phong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anh_phong $anh_phong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anh_phong $anh_phong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anh_phong = Anh_phong::findOrFail($id);
        $this->deleteImage($anh_phong->anh);
        $anh_phong->delete();
        // return back();
        
        return response(['trang_thai' => 'success']);
    }
}

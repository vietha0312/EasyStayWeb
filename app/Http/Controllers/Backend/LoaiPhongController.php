<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\LoaiPhongDataTable;
use App\Models\Loai_phong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anh_phong;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;

class LoaiPhongController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    const PATH_UPLOAD = 'loai_phong';
    public function index(LoaiPhongDataTable $datatable)
    {
        // $data = Loai_phong::query()->latest()->paginate();
        // return view('admin.loai_phong.index', compact('data'));
        return $datatable->render('admin.loai_phong.index');
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
        $request->validate([
            'ten' => 'required|unique:loai_phongs',
            'anh' => 'required','image',
            'gia' => 'required',
            'gia_ban_dau' => 'nullable',
            'gioi_han_nguoi' => 'required',
            'so_luong' => 'required',
            'mo_ta_ngan' => 'required',
            'mo_ta_dai' => 'required',
            'trang_thai' => 'required',

        ]);
        $anh = $this->uploadImage($request, 'anh', 'uploads');

        $loai_phong = new Loai_phong();
        $loai_phong->ten = $request->ten;
        $loai_phong->anh = $anh;
        $loai_phong->gia = $request->gia;
        $loai_phong->gia_ban_dau = $request->gia_ban_dau;
        $loai_phong->gioi_han_nguoi = $request->gioi_han_nguoi;
        $loai_phong->so_luong = $request->so_luong;
        $loai_phong->mo_ta_ngan = $request->mo_ta_ngan;
        $loai_phong->mo_ta_dai = $request->mo_ta_dai;
        $loai_phong->trang_thai = $request->trang_thai;
        $loai_phong->deleted_at = $request->delete_at;
        $loai_phong->save();
        return back()->with('msg','Thêm thành công');
        // $data = $request->except('anh');
        // if($request->hasFile('anh')){
        //     $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        // }
        // Loai_phong::query()->create($data);
        // // toastr('Thêm thành công', 'success');
        // return back()->with('success','Thêm thành công');
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
        $request->validate([
            'ten' => 'required|unique:loai_phongs,ten,' . $loai_phong->id,
            'anh' => 'required','image',
            'gia' => 'required',
            'gia_ban_dau' => 'nullable',
            'gioi_han_nguoi' => 'required',
            'so_luong' => 'required',
            'mo_ta_ngan' => 'required',
            'mo_ta_dai' => 'required',
            'trang_thai' => 'required',

        ]);
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
    public function destroy(string $id)
    {
        $loai_phong = Loai_phong::findOrFail($id);

        $this->deleteImage($loai_phong->anh);
        $anh_phong = Anh_phong::where('loai_phong_id', $loai_phong->id)->get();
        foreach($anh_phong as $anh){
            $this->deleteImage($anh->anh);
            $anh->delete();
        }
        $loai_phong->delete();
        return response(['trang_thai' => 'success']);
        
        // $loai_phong->delete();
        // if(Storage::exists($loai_phong->anh)){
        //     Storage::delete($loai_phong->anh);
        // }
        // return back()->with('msg','Xóa thành công');
    }

    public function changeStatus(Request $request){
        $loai_phong = Loai_phong::findOrFail($request->id);
        $loai_phong->trang_thai = $request->trang_thai == 'true' ? 1 : 2;
        $loai_phong->save();

        return response(['message' => 'Trạng thái cập nhật thành công']);
    }
}

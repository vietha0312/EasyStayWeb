<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChiTietLoaiPhongDataTable;
use App\DataTables\LoaiPhongDataTable;
use App\Models\Loai_phong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anh_phong;
use App\Models\Phong;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

use function Termwind\render;

class LoaiPhongController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    const PATH_UPLOAD = 'loai_phong';
    public function index(LoaiPhongDataTable $datatable)
    {
        $so_luong = Phong::select('Loai_phongs.ten', DB::raw('COUNT(phongs.id) as so_luong'))
            ->join('Loai_phongs', 'Phongs.loai_phong_id', '=', 'Loai_phongs.id')
            ->groupBy('Loai_phongs.ten')
            ->get();

        $phong_trong = Loai_phong::select('loai_phongs.*', DB::raw('COUNT(phongs.id) as phong_trong'))
            ->leftJoin('phongs', function ($join) {
                $join->on('loai_phongs.id', '=', 'phongs.loai_phong_id')
                    ->where('phongs.trang_thai', '=', '1'); 
            })
            ->groupBy('loai_phongs.id', 'loai_phongs.ten') 
            ->get();

        return $datatable->with('so_luong', $so_luong)->with('phong_trong', $phong_trong)->render('admin.loai_phong.index');
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
    public function store(Request $request, User $user): RedirectResponse
    {
        if (! Gate::allows('create', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $request->validate([
            'ten' => 'required|unique:loai_phongs',
            'anh' => 'nullable', 'image',
            'gia' => 'required',
            'gia_ban_dau' => 'nullable',
            'gioi_han_nguoi' => 'required',
            'so_luong' => 'required',
            'mo_ta_ngan' => 'required',
            'mo_ta_dai' => 'required',
            'trang_thai' => 'required',

        ]);
        // $anh = $this->uploadImage($request, 'anh', 'upload');

        // $loai_phong = new Loai_phong();
        // $loai_phong->ten = $request->ten;
        // $loai_phong->anh = $anh;
        // $loai_phong->gia = $request->gia;
        // $loai_phong->gia_ban_dau = $request->gia_ban_dau;
        // $loai_phong->gioi_han_nguoi = $request->gioi_han_nguoi;
        // $loai_phong->so_luong = $request->so_luong;
        // $loai_phong->mo_ta_ngan = $request->mo_ta_ngan;
        // $loai_phong->mo_ta_dai = $request->mo_ta_dai;
        // $loai_phong->trang_thai = $request->trang_thai;
        // $loai_phong->deleted_at = $request->delete_at;
        // $loai_phong->save();
        // return back()->with('msg','Thêm thành công');

        $data = $request->except('anh');
        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        }
        Loai_phong::query()->create($data);
        return back()->with('success', 'Thêm thành công');
        // toastr('Thêm thành công', 'success');
    }

    /**
     * Display the specified resource.
     */
    // public function show(ChiTietLoaiPhongDataTable $datatable)
    // {
    //     return $datatable->render('admin.loai_phong.show');
    // }

    public function show(Loai_phong $loai_phong)
    {
        return view('admin.loai_phong.show', compact('loai_phong'));
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
    public function update(Request $request, Loai_phong $loai_phong, User $user): RedirectResponse
    {
        if (! Gate::allows('update', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $request->validate([
            'ten' => 'required|unique:loai_phongs,ten,' . $loai_phong->id,
            'anh' => 'nullable', 'image',
            'gia' => 'required',
            'gia_ban_dau' => 'nullable',
            'gioi_han_nguoi' => 'required',
            'so_luong' => 'required',
            'mo_ta_ngan' => 'required',
            'mo_ta_dai' => 'required',
            'trang_thai' => 'required',

        ]);
        $data = $request->except('anh');
        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        }
        $oldAnh = $loai_phong->anh;
        if ($request->hasFile('anh') && Storage::exists($oldAnh)) {
            Storage::delete($oldAnh);
        }
        $loai_phong->update($data);
        return back()->with('msg', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, User $user): RedirectResponse
    {
        if (! Gate::allows('delete', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $loai_phong = Loai_phong::findOrFail($id);

        $this->deleteImage($loai_phong->anh);
        $anh_phong = Anh_phong::where('loai_phong_id', $loai_phong->id)->get();
        foreach ($anh_phong as $anh) {
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

    public function changeStatus(Request $request)
    {
        $loai_phong = Loai_phong::findOrFail($request->id);
        $loai_phong->trang_thai = $request->trang_thai == 'true' ? 0 : 1;
        $loai_phong->save();
        return response(['message' => 'Trạng thái cập nhật thành công']);
    }
}

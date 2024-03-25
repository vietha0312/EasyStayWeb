<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DatPhongDataTable;
use App\DataTables\ChiTietDatPhongDataTable;
use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Http\Request;
use App\Models\DichVu;
use App\Models\User;
use App\Models\Loai_phong;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class DatPhongController extends Controller
{
    const PATH_VIEW = 'admin.dat_phong.';


    public function index(Request $request, DatPhongDataTable $datatables )
    {
        // $datphong = DatPhong::query()->latest()->paginate(7);
        return $datatables->render(self::PATH_VIEW . __FUNCTION__);
    }
    public function create(Request $request)
    {
        // $loai_phongs = Loai_phong::where('trang_thai',1)->with('phongs')->get();
        $loai_phongs = Loai_phong::where('trang_thai',1)->get();
    
        // $phongs = Phong::where('trang_thai',1)->get();
        // $loai_phongs = $request->input('loai_phongs', []);
        // $loai_phongs = Phong::whereIn('loai_phong_id', $loai_phongs)
        //             ->where('trang_thai', 1)
        //             ->get();
        return response()->json(['loai_phongs' => $loai_phongs]);
        // return view(self::PATH_VIEW . __FUNCTION__, ['loai_phongs'=>$loai_phongs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , User $user): RedirectResponse
    {
        if (! Gate::allows('create-A&NV', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        // DatPhong::query()->create($request->all());
        // return back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(DatPhong $datPhong, ChiTietDatPhongDataTable $datatables)
    {
        //
        return $datatables->render('admin.dat_phong.show', compact('datPhong'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DatPhong $datPhong)
    {
        $loai_phong = Loai_phong::query()->pluck('ten', 'id')->toArray();
        $user = User::query()->pluck('ten_nguoi_dung', 'id')->toArray();
        $dich_vu = DichVu::query()->pluck('ten', 'id')->toArray();
        return view(self::PATH_VIEW . __FUNCTION__, compact('loai_phong', 'datPhong', 'user', 'dich_vu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DatPhong $datPhong, User $user): RedirectResponse
    {
        if (! Gate::allows('update-A&NV', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        // $request->validate([
        //     'ten_phong' => 'required|unique::phongs,ten_phong,' . $datPhong->id,
        //     'loai_phong_id' => [
        //         Rule::exists('phongs','id')
        //     ],
        //     'mo_ta' => 'required',
        //     'trang_thai' => 'required',
        //     'trang_thai' => [
        //         Rule::in([1,0])
        //     ],
        // ]);
        $datPhong->update($request->all());
        return back()->with('msg', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatPhong $datPhong, User $user): RedirectResponse
    {
        if (! Gate::allows('delete-A&NV', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $datPhong->delete();
        return response(['trang_thai' => 'success']);
    }
}

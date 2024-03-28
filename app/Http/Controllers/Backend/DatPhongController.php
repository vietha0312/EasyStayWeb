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
use App\Models\Phong;
use App\Models\KhuyenMai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use App\Models\ChiTietDatPhong;

class DatPhongController extends Controller
{
    const PATH_VIEW = 'admin.dat_phong.';


    public function index(Request $request, DatPhongDataTable $datatables )
    {
        // $datphong = DatPhong::query()->latest()->paginate(7);
        return $datatables->render(self::PATH_VIEW . __FUNCTION__);
    }
    public function create(DatPhong $datPhong)
    {
        // $loai_phongs = Loai_phong::where('trang_thai',1)->with('phongs')->get();
        // $loai_phongs = Loai_phong::where('trang_thai',1)->get();

        // $phongs = Phong::where('trang_thai',1)->get();
        // $loai_phongs = $request->input('loai_phongs', []);
        // $loai_phongs = Phong::whereIn('loai_phong_id', $loai_phongs)
        //             ->where('trang_thai', 1)
        //             ->get();
        // return response()->json(['loai_phongs' => $loai_phongs]);
        // return view(self::PATH_VIEW . __FUNCTION__, ['loai_phongs'=>$loai_phongs]);

        $user = User::query()->pluck('email','id')->toArray();
        $loai_phong = Loai_phong::query()->pluck('ten','id')->toArray();
        $phong = Phong::query()->pluck('ten_phong','id')->toArray();
        $khuyen_mai = KhuyenMai::query()->pluck('ten_khuyen_mai','id')->toArray();

        return view(self::PATH_VIEW . __FUNCTION__,compact('user','datPhong','loai_phong','phong','khuyen_mai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , User $user, Loai_phong $loaiPhong, KhuyenMai $khuyenMai): RedirectResponse
    {
        if (! Gate::allows('create-A&NV', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $loaiPhong = Loai_phong::findOrFail($request->loai_phong_id);
        $khuyenMai = KhuyenMai::findOrFail($request->khuyen_mai_id);
        $datPhong=DatPhong::create([
            'user_id'=> $request->user_id,
            'loai_phong_id'=> $request->loai_phong_id,
            'phong_id' => null,
            'don_gia'=>null,
            'so_luong_nguoi'=>$request->so_luong_nguoi,
            'so_luong_phong'=>$request->so_luong_phong,
            'thoi_gian_den'=>$request->thoi_gian_den,
            'thoi_gian_di'=>$request->thoi_gian_di,
            'dich_vu_id' => null,
            'khuyen_mai_id'=>$request->khuyen_mai_id,
            'tong_tien'=>null,
            'payment'=>$request->payment,
            'trang_thai'=> 1,
            'ghi_chu'=>null,
        ]);
        $datPhong->setPhongIdTemp($request->phong_id);
        $phongIds = Phong::where('trang_thai', 1)
        ->limit($datPhong->so_luong_phong)
        ->pluck('id')
        ->toArray();
        if($request->khuyen_mai_id && $khuyenMai->loai_giam_gia == 1)
        {
            $tong_tien = ($loaiPhong->gia * $datPhong->so_luong_phong-($loaiPhong->gia * $datPhong->so_luong_phong)*$khuyenMai->gia_tri_giam/100);
        }else{
            $tong_tien = ($loaiPhong->gia * $datPhong->so_luong_phong)-$khuyenMai->gia_tri_giam;
        }
        $datPhong->phongs()->attach($phongIds);
        $datPhong->update([
            'tong_tien' => $tong_tien
        ]);



        if($datPhong->dich_vu_id != null){

            $dichVuIds = explode(',', $datPhong->dich_vu_id);

            $tongTienDatPhong = $datPhong->tong_tien;

            // Tính toán tổng giá trị của các dịch vụ từ các ID
            $tongDichVu = 0;
            foreach ($dichVuIds as $dichVuId) {
                $dichVu = DichVu::find($dichVuId);
                if ($dichVu) {
                    $tongDichVu += $dichVu->gia;
                }
            }

            // Tính tổng tiền mới cho chi tiết đặt phòng
            $tongTienMoi = $tongTienDatPhong + $tongDichVu;

        }else{
            $tongTienDatPhong = $datPhong->tong_tien;

            $tongTienMoi = $tongTienDatPhong;
        }
        // Tạo một chi tiết đặt phòng và lưu tổng giá trị của các dịch vụ
        ChiTietDatPhong::create([
            'dat_phong_id' => $datPhong->id,
            'thanh_tien' => $tongTienMoi, // Tổng tiền mới cho chi tiết đặt phòng
        ]);

        return redirect()->route('admin.dat_phong.index')->with('success', 'Thêm mới dịch vụ thành công!');
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
        $so_luong_dich_vu = DichVu::count();
        $loai_phong = Loai_phong::query()->pluck('ten', 'id')->toArray();
        $user = User::query()->pluck('ten_nguoi_dung', 'id')->toArray();
        $dich_vus = DichVu::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('loai_phong', 'datPhong', 'user', 'dich_vus','so_luong_dich_vu'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DatPhong $datPhong, User $user): RedirectResponse
    {
        if (! Gate::allows('update-A&NV', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $request->validate([
            'dich_vu_ids' => 'required|array',
            'dich_vu_ids.*.id' => 'required|numeric',
            'dich_vu_ids.*.so_luong' => 'required|numeric|min:0',
            'ghi_chu' => 'nullable|string',
        ]);
        // Tính toán tổng tiền cho các dịch vụ
        $tongTienDichVu = 0;
        foreach ($request->dich_vu_ids as $dichVuData) {
            $dichVu = DichVu::find($dichVuData['id']);
            if ($dichVu) {
                $tongTienDichVu += $dichVu->gia * $dichVuData['so_luong'];
            }
        }

        // Tính tổng tiền mới cho chi tiết đặt phòng
        $tongTienMoi = $datPhong->tong_tien + $tongTienDichVu;

        // Tạo một chi tiết đặt phòng mới hoặc cập nhật nếu đã tồn tại
        $chiTietDatPhong = ChiTietDatPhong::updateOrCreate(
            ['dat_phong_id' => $datPhong->id],
            ['thanh_tien' => $tongTienMoi]
        );

        // Lưu ghi chú vào đối tượng DatPhong
        $datPhong->ghi_chu = $request->ghi_chu;
        $datPhong->save();

        // Xóa các dịch vụ hiện có của DatPhong trước khi thêm mới
        $datPhong->dichVus()->detach();

        // Lưu dữ liệu vào bảng trung gian
        foreach ($request->dich_vu_ids as $dichVuData) {
            $dichVu = DichVu::find($dichVuData['id']);
            if ($dichVu) {
                $datPhong->dichVus()->attach($dichVu->id, ['so_luong' => $dichVuData['so_luong']]);
            }
        }

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
    public function searchKhuyenMai(Request $request)
    {
        $term = $request->input('term');
        $khuyen_mai = KhuyenMai::where('ten_khuyen_mai', 'LIKE', '%'.$term.'%')->pluck('ten_khuyen_mai', 'id');
        return response()->json($khuyen_mai);
    }
}

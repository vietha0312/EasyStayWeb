<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDatPhong;
use App\Models\Phong;
use App\Models\DatPhong;
use App\Models\Loai_phong;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class KiemTraPhongController extends Controller
{
   
    function checkPhong(Request $request)
    {
        // try {
            $ngayBatDau = Carbon::parse($request->input('thoi_gian_den'));
            $ngayKetThuc = Carbon::parse($request->input('thoi_gian_di'));
        // } catch (Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Lỗi định dạng ngày tháng.'
        //     ], 400);
        // }

        $loaiPhongs = Loai_phong::all();

        $availableLoaiPhongs = $loaiPhongs->filter(function ($loaiPhong) use ($ngayBatDau, $ngayKetThuc) {

            $availableRooms = Phong::where('loai_phong_id', $loaiPhong->id)
                ->whereDoesntHave('datPhong', function ($query) use ($ngayBatDau, $ngayKetThuc) {
                    $query->where('thoi_gian_den', '<', $ngayKetThuc)
                        ->where('thoi_gian_di', '>', $ngayBatDau);
                })
                ->exists();

            return $availableRooms;
        });

        // dd($availableLoaiPhongs->toArray());
        return view('client.pages.checkPhong', compact('availableLoaiPhongs','ngayBatDau','ngayKetThuc'));

        // return response()->json([
        //     'success' => true,
        //     'available_loai_phongs' => $availableLoaiPhongs
        // ]);
    }
}

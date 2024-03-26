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

class KiemTraPhongController extends Controller
{
    public function checkPhong(Request $request){
        // $thoiGianDen = Carbon::createFromFormat('Y-m-d', $request->thoi_gian_den);
        // $thoiGianDi = Carbon::createFromFormat('Y-m-d', $request->thoi_gian_di);

        $thoiGianDen = $request->input('thoi_gian_den');
        $thoiGianDi = $request->input('thoi_gian_di');

        // dd($thoiGianDen);

        //Tìm tất cả các loại phòng trống
        $loaiPhongs = Loai_phong::all();

        //Mảng chứa loại phòng và phòng trống
        $loaiPhongsTrong = [];
       

        //Kiểm tra từng loại phòng
        foreach($loaiPhongs as $loaiPhong){
            //Lấy tất cả các phòng trong loại phòng đó
            $phongs = $loaiPhong->phong()->where('trang_thai',1)->get();

            //Kiểm tra mỗi phòng có trống không trong khoảng thời gian đó
            $phongsTrong = [];
            foreach($phongs as $phong){
                $phongTrong = $phong->datPhong()->where(function($query) use ($thoiGianDen, $thoiGianDi){
                    $query->where('thoi_gian_den', '>=', $thoiGianDi)
                        ->orWhere('thoi_gian_di', '<=', $thoiGianDen);
                })->doesntExist();

                if($phongTrong){
                    $phongsTrong[] = $phong;
                }
            }

            //Nếu có ít nhất 1 phòng trống, thêm loại phòng và các phòng trống vào mảng
            if(!empty($phongsTrong)){
                $loaiPhongsTrong[] = [
                    'loaiPhong' => $loaiPhong,
                    'phongs' => $phongsTrong,
                ];
            }
        }

        // dd($loaiPhongsTrong);
        //Trả về view với thông tin các loại phòng trống
        return view('client.pages.checkPhong', compact('loaiPhongsTrong', 'thoiGianDen', 'thoiGianDi'));   



        // $phongTrong = Phong::whereDoesntHave('chi_tiet_loai_phong', function($query) use ($thoiGianDen, $thoiGianDi){
        //     $query->where(function($subQuery) use ($thoiGianDen, $thoiGianDi){
        //         $subQuery->where('ngay_bat_dau', '>=', $thoiGianDen)
        //                 ->where('ngay_bat_dau', '<', $thoiGianDi);
        //     })->orWhere(function($subQuery) use ($thoiGianDen, $thoiGianDi){
        //         $subQuery->where('ngay_ket_thuc','>', $thoiGianDen)
        //                 ->where('ngay_ket_thuc','<=', $thoiGianDi);
        //     });
        // })->get();

        // $phongTrong = Phong::where('trang_thai',1)->get();
        // // dd($phongTrong);
        // foreach($phongTrong as $data){
        //     $so_phong_dat = ChiTietDatPhong::where('thoi_gian_den','<=', $thoiGianDen)
        //         ->where('thoi_gian_di', '>=', $thoiGianDi)
        //         ->where('phong_id', $data->id)
        //         ->count();
        //     $data ->so_phong_trong = $data->so_phong - $so_phong_dat;
        //     // dd($data);
        // }

        
        // return view('client.pages.checkPhong', ['phongTrong' => $phongTrong]);   


        // $loaiphongs = Loai_phong::all();

        // $ngayCanKT = Carbon::now();

        // $loaiphongTrong = [];

        // foreach ($loaiphongs as $loaiphong){
        //     $soLuongPhongTrong = $loaiphong->phongs()->whereDoesntHave('chi_tiet_dat_phong', function($query) use ($ngayCanKT){
        //         $query->where('thoi_gian_den', '<=', $ngayCanKT)
        //         ->where('thoi_gian_di', '>=', $ngayCanKT);   
        //     })->count();
        // }
        // if($soLuongPhongTrong > 0){
        //     $loaiphongTrong[] = $loaiphong;
        // }
    }

    

   
    



   
    
}

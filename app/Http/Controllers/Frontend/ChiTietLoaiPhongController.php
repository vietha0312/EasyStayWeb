<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anh_phong;
use App\Models\Loai_phong;
use Illuminate\Http\Request;


class ChiTietLoaiPhongController extends Controller{
    public function detail(string $id){
        $detail = Loai_phong::where('trang_thai',1)->where('id',$id)->first();
        $anhphong = Anh_phong::where('trang_thai',1)->where('id',$id);
        // dd($detail);
        return view('client.pages.loai_phong.chitietloaiphong', compact('detail','anhphong'));
    }

    public function allRoom(){
        $rooms = Loai_phong::all();
        return view('client.pages.loai_phong.loai_phong',compact('rooms'));
    }
}
?>
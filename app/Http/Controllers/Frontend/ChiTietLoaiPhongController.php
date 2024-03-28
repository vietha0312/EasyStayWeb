<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anh_phong;
use App\Models\DanhGia;
use App\Models\Hotel;
use App\Models\Loai_phong;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Event\TestSuite\Loaded;

class ChiTietLoaiPhongController extends Controller{
    public function detail(string $id){
        $detail = Loai_phong::all()->where('id',$id)->first();
        // $detail = Loai_phong::find($id);
        // $detail = Loai_phong::where('trang_thai',1)->where('id',$id)->first();
        $khach_sans = Hotel::all();
        // $danh_gias = DanhGia::all()->where('id',$id)->first();
        $danh_gias = DanhGia::where('loai_phong_id', $id)->get();
        $khach_hangs = User::all();
        // dd($detail);
        return view('client.pages.loai_phong.chitietloaiphong', compact('detail','khach_sans','danh_gias','khach_hangs'));
    }

    public function allRoom(){
        $rooms = Loai_phong::all();
        return view('client.pages.loai_phong.loai_phong',compact('rooms'));
    }
}
?>
<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bai_viet;
use App\Models\Hotel;
use Illuminate\Http\Request;


class BaiVietController extends Controller{
    public function index(){
        $baiviet = Bai_viet::all();
        // dd($baiviet);
        return view('client.pages.bai_viet.index', compact('baiviet'));
    }

    public function show(Bai_viet $bai_viet){
        // $detail = Bai_viet::where('trang_thai',1)->where('id',$id)->first();
        $khach_sans = Hotel::all();
        $baiviets = Bai_viet::all();
        return view('client.pages.bai_viet.show', compact('bai_viet','khach_sans','baiviets'));
    }
}
?>
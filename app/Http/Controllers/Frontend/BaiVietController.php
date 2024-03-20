<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bai_viet;
use Illuminate\Http\Request;


class BaiVietController extends Controller{
    public function list(){
        $baiviets = Bai_viet::all();
        return view('client.pages.bai_viet.danh_sach', compact('baiviets'));
    }

    public function detailNews(string $id){
        $detail = Bai_viet::where('trang_thai',1)->where('id',$id)->first();
        return view('client.pages.bai_viet.chi_tiet',compact('detail'));
    }
}
?>
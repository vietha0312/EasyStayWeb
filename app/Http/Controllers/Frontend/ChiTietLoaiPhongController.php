<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Loai_phong;
use Illuminate\Http\Request;


class ChiTietLoaiPhongController extends Controller{
    public function detail(string $id){
        $detail = Loai_phong::where('trang_thai',1)->where('id',$id)->first();
        dd($detail);
        return view('client.pages.chitiet', compact('detail'));
    }
}
?>
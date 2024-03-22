<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bai_viet;
use App\Models\Hotel;
use Illuminate\Http\Request;

class BaiVietFEController extends Controller
{
    public function index(){
        $tintuc = Bai_viet::all();
        return view('client.pages.bai_viet.index', compact('tintuc'));
    }

    public function show(string $id){
        $detail = Bai_viet::where('trang_thai',1)->where('id',$id)->first();
        $khach_sans = Hotel::all();
        $bai_viets = Bai_viet::all();
        return view('client.pages.bai_viet.show', compact('detail','khach_sans','bai_viets'));
    }
}

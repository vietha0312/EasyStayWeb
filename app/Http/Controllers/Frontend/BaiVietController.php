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
}
?>
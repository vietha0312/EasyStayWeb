<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Loai_phong;
use Illuminate\Http\Request;


class LienHeController extends Controller
{
    public function contact(){
        $khach_sans = Hotel::all();
        return view('client.pages.lienhe', compact('khach_sans'));
    }
}

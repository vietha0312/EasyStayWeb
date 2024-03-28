<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    public function index(Request $request)
    {
        return view('admin.thongke');
    }

}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HoSoController extends Controller
{
    public function index(){ 
        $user = User::all();

        return view('client.pages.hoso', compact('user'));
    }
}

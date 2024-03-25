<?php

use App\Models\Loai_phong;
use App\Models\Phong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/loai_phong', function(){
//     $loaiphongs = Loai_phong::where('trang_thai',1)->get();
//     return response()->json($loaiphongs);
// });

// Route::post('/phong', function(Request $request){
//     $selectedLoaiPhong = $request->input('selectedLoaiPhong');
//     $phongs = Phong::whereIn('id', $selectedLoaiPhong)
//             ->where('trang_thai',1)
//             ->get();
//     return response()->json($phongs);         
// });

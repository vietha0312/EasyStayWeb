<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AnhPhongController;
use App\Http\Controllers\Backend\BaiVietController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\DanhGiaController;
use App\Http\Controllers\Backend\LoaiPhongController;
use App\Http\Controllers\Backend\PhongController;
use App\Http\Controllers\Backend\hotelController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\DatPhongController;
use App\Http\Controllers\Backend\VaiTroController;
use App\Http\Controllers\Backend\ChiTietDatPhongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ExportController;
use App\Http\Controllers\Backend\KhuyenMaiController;
use App\Http\Controllers\Backend\DichVuController;
use App\Http\Controllers\Backend\ThongKeController;
use App\Http\Controllers\Frontend\ChiTietLoaiPhongController;
use App\Http\Controllers\Frontend\KiemTraPhongController;
use App\Http\Controllers\Frontend\LienHeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
// 	return view('client.layouts.master');
// });

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');






Route::get('chi_tiet_loai_phong/{id}', [ChiTietLoaiPhongController::class, 'detail'])->name('client.pages.loai_phong.chitietloaiphong');
Route::get('loai_phong', [ChiTietLoaiPhongController::class, 'allRoom'])->name('clients.pages.loai_phong.loai_phong');

Route::get('tin_tuc', [App\Http\Controllers\Frontend\BaiVietFEController::class, 'index'])->name('client.pages.bai_viet.index');
Route::get('chi_tiet_tin_tuc/{id}', [App\Http\Controllers\Frontend\BaiVietFEController::class, 'show'])->name('client.pages.bai_viet.show');

Route::get('lien_he', [LienHeController::class,'contact'])->name('client.pages.lien_he');

Route::post('kiem_tra_phong',[KiemTraPhongController::class,'checkPhong'])->name('kiem_tra_phong');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/profile', function () {
    //     // Kiểm tra xem người dùng đã đăng nhập hay chưa
    //     if (auth()->check()) {
    //         // Người dùng đã đăng nhập, trả về view của trang profile
    //         return view('profile');
    //     } else {
    //         // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
    //         return redirect('/login');
    //     }
    // });
});



require __DIR__ . '/auth.php';




// ->middleware(['auth', 'verified'])
    Route::middleware(['auth','verified','block.user'])->prefix('admin')
    ->as('admin.')
    ->group(function () {

        // Route::resource('tong_quan', ThongKeController::class);

        Route::resource('loai_phong', LoaiPhongController::class);
        Route::resource('phong', PhongController::class);
        Route::resource('anh_phong', AnhPhongController::class);
        Route::resource('khach_san', hotelController::class);
        Route::resource('bai_viet', BaiVietController::class);
        Route::resource('user', RegisteredUserController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('danh_gia', DanhGiaController::class);
        Route::resource('vai_tro', VaiTroController::class);
        Route::resource('dat_phong', DatPhongController::class);
        Route::resource('chi_tiet_dat_phong', ChiTietDatPhongController::class);
        Route::put('loai_phong/change-status', [LoaiPhongController::class, 'changeStatus'])->name('loai_phong.change-status');
        Route::get('exportUser', [ExportController::class, 'exportUser'])->name('exportUser');
        Route::put('searchKhuyenMai', [DatPhongController::class, 'searchKhuyenMai'])->name('searchKhuyenMai');
        Route::resource('khuyen_mai', KhuyenMaiController::class);
        Route::resource('dich_vu', DichVuController::class);

        Route::resource('lien_he', LienHeController::class);
    });

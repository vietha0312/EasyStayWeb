<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AnhPhongController;
use App\Http\Controllers\Backend\BaiVietController;
use App\Http\Controllers\Backend\DanhGiaController;
use App\Http\Controllers\Backend\LoaiPhongController;
use App\Http\Controllers\Backend\PhongController;
use App\Http\Controllers\Backend\KhachSanController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\ChiTietDonDatController;
use App\Http\Controllers\Backend\VaiTroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ExportController;
use App\Http\Controllers\Backend\DonDatController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::resource('loai_phong', LoaiPhongController::class);
        Route::resource('phong', PhongController::class);
        // Route::resource('anh_phong', AnhPhongController::class);
        // Route::resource('khach_san', KhachSanController::class);
        // Route::resource('bai_viet', BaiVietController::class);
        Route::resource ('user', RegisteredUserController::class);
        // Route::resource('danh_gia',DanhGiaController::class);
        Route::resource('vai_tro',VaiTroController::class);
        Route::resource('don_dat', DonDatController::class);
        Route::resource('chi_tiet_don_dat', ChiTietDonDatController::class);
        Route::get('exportUser', [ExportController::class, 'exportUser']);
    });





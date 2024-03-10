<?php

use App\Http\Controllers\Backend\LoaiPhongController;
use App\Http\Controllers\Backend\PhongController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')
	->as('admin.')
	->group(function () {
		Route::resource('loai_phong', LoaiPhongController::class);
		Route::resource('phong', PhongController::class);
		Route::resource('banners', BannerController::class);
	});

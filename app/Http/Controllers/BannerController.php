<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{

		$data = Banner::all();
		return view('admin.banner.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.banner.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(BannerRequest $request)
	{
		// Lưu hình ảnh vào thư mục storage
		$anh = $request->file('anh');
		$tenAnh = time() . '.' . $anh->getClientOriginalExtension();

		// Kiểm tra xem ảnh có tồn tại trong hệ thống không
		if (Storage::exists('banners/' . $tenAnh)) {
			return redirect()->back()->with('error', 'Hình ảnh đã tồn tại.');
		}

		$anh->storeAs('banners', $tenAnh);

		// Tạo bản ghi mới
		Banner::create([
			'anh' => $tenAnh,
			'mo_ta' => $request->mo_ta,
			'trang_thai' => $request->trang_thai,
		]);

		return redirect(route('admin.banners.index'))->with('success', 'Đã tạo bản ghi thành công.');
	}


	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		$findData = Banner::find($id);
		return view('admin.banner.edit', compact('findData'));
	}
	public function show(Request $request)
	{
	}
	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, $id)
	{
		// Lấy bản ghi cần cập nhật
		$record = Banner::findOrFail($id);

		// Kiểm tra và xử lý ảnh mới
		if ($request->hasFile('anh')) {
			// Xoá ảnh cũ
			Storage::delete('banners/' . $record->anh);

			// Lưu ảnh mới vào thư mục storage
			$anh = $request->file('anh');
			$tenAnh = time() . '.' . $anh->getClientOriginalExtension();
			$anh->storeAs('banners', $tenAnh);

			// Cập nhật tên ảnh mới vào bản ghi
			$record->anh = $tenAnh;
		}

		// Cập nhật trường status
		$record->trang_thai = $request->trang_thai;
		$record->mo_ta = $request->mo_ta;
		$record->save();

		return redirect(route('admin.banners.index'))->with('success', 'Đã cập nhật bản ghi thành công.');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$deleteData = Banner::find($id);
		$deleteData->delete();

		return redirect(route('admin.banners.index'))->with('success', 'Xoá bản ghi thành công.');
	}
}

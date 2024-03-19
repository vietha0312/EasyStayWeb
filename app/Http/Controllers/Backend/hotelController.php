<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\KhachSanDataTable;
use App\Models\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class hotelController extends Controller{


const PATH_VIEW = 'admin.khach_san.';
const PATH_UPLOAD = 'khach_san';

public function index(Request $request, KhachSanDataTable $datatables)
{
    return $datatables->render('admin.khach_san.index');
    // $data = Hotel::paginate();
    // return view(self::PATH_VIEW . 'index', compact('data'));
}

public function edit(Hotel $khach_san)
{
    return view(self::PATH_VIEW . 'edit', compact('khach_san'));
}

public function update(Request $request, Hotel $khach_san)
{
    $data = $request->except('logo');

    if ($request->hasFile('logo')) {
        $data['logo'] = Storage::put(self::PATH_UPLOAD, $request->file('logo'));

        $oldLogo = $khach_san->logo;
        if($request->hasFile('logo') && (Storage::exists($oldLogo))){
            Storage::delete($oldLogo);
        }
    }

    $khach_san->update($data);

    return redirect()->route('admin.khach_san.index')->with('msg', 'Sửa thành công');

  


}


}
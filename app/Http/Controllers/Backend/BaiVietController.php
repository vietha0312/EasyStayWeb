<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BaiVietDataTable;
use App\Models\Bai_viet;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
class BaiVietController extends Controller
{
    const PATH_VIEW = 'admin.bai_viet.';
    const PATH_UPLOAD = 'bai_viet';

    public function index( Request $request, BaiVietDataTable $datatable , User $user): RedirectResponse
    {
        if (! Gate::allows('view', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        return $datatable->render('admin.bai_viet.index');
        // $data = Bai_viet::latest()->paginate(5);
        // return view(self::PATH_VIEW . 'index', compact('data'));
    }

    public function create()
    {
        return view(self::PATH_VIEW . 'create');
    }

    public function store(Request $request , User $user): RedirectResponse
    {
        $request->validate([
            'tieu_de' => 'required|max:225',
            'anh' => 'nullable|image|max:1080',
            'mo_ta_ngan' => 'nullable|max:225',
            'noi_dung' => 'required',
            'trang_thai' => [
                Rule::in([
                    Bai_viet::XUAT_BAN,
                    Bai_viet::NHAP
                ])
            ],
        ]);
        $data = $request->except('anh');

        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        }

        Bai_viet::query()->create($data);

        return back()->with('msg', 'Thêm thành công');
    }

    public function edit(Bai_viet $bai_viet)
    {
        return view(self::PATH_VIEW . 'edit', compact('bai_viet'));
    }

    public function update(Request $request, Bai_viet $bai_viet , User $user): RedirectResponse
    {
        $request->validate([
            'tieu_de' => 'required|max:225',
            'anh' => 'nullable|image|max:1080',
            'mo_ta_ngan' => 'nullable|max:225',
            'noi_dung' => 'required',
            'trang_thai' => [
                Rule::in([
                    Bai_viet::XUAT_BAN,
                    Bai_viet::NHAP
                ])
            ],
        ]);

        $data = $request->except('anh');

        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));

            if (Storage::exists($bai_viet->anh)) {
                Storage::delete($bai_viet->anh);
            }
        }

        $bai_viet->update($data);
        return back()->with('msg', 'Cập nhật thành công');
    }

    public function destroy(Bai_viet $bai_viet , User $user): RedirectResponse
    {
        if (! Gate::allows('delete', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $bai_viet->delete();

        if (Storage::exists($bai_viet->anh)) {
            Storage::delete($bai_viet->anh);
        }

        return response(['trang_thai' => 'success']);
    }
}

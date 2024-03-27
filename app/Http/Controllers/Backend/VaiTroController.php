<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VaiTro;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
class VaiTroController extends Controller
{
    //
    const PATH_VIEW = 'admin.vai_tro.';
    public function index()
    {
        $data = VaiTro::query()->latest()->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user): RedirectResponse
    {
        if (! Gate::allows('create', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        VaiTro::query()->create($request->all());
        return back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(VaiTro $vai_tro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VaiTro $vai_tro)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('vai_tro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VaiTro $vai_tro, User $user): RedirectResponse
    {
        if (! Gate::allows('update', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $vai_tro->update($request->all());
        return back()->with('msg','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaiTro $vai_tro, User $user): RedirectResponse
    {
        if (! Gate::allows('delete', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $vai_tro->delete();
        return back()->with('msg', 'Xóa thành công');
    }

}

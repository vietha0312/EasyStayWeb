<?php

namespace App\Http\Controllers\Auth;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VaiTro;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function index(Request $request, UserDataTable $datatable)
    {
        // var_dump(Auth::user()->id_vai_tro);
        //     die;
        return $datatable->render('admin.user.index');
        // $data=User::query()->latest()->paginate(10);
        // return view('admin.user.' . __FUNCTION__,compact('data'));
    }
    public function create(): View
    {
        $vai_tro = VaiTro::query()->pluck('ten_chuc_vu','id')->toArray();
        return view('auth.register',compact('vai_tro'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'ten_nguoi_dung' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dia_chi' => ['nullable'],
            'gioi_tinh' => ['nullable'],
            'ngay_sinh' => ['nullable'],
            'anh'=>['nullable'],
            'so_dien_thoai',
        ]);

        $user = User::create([
            'ten_nguoi_dung' => $request->ten_nguoi_dung,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dia_chi' => null,
            'gioi_tinh' => null,
            'ngay_sinh' => null,
            'anh'=>null,
            'so_dien_thoai' => $request->so_dien_thoai,
            'id_vai_tro' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit(User $user)
    {
        $vaitro = VaiTro::query()->pluck('ten_chuc_vu','id')->toArray();
        return view('admin.user.'. __FUNCTION__,compact('vaitro','user'));
    }
    public function update(Request $request, User $user): RedirectResponse
    {
        if (! Gate::allows('update', $user)) {
                return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        $request->validate([
            'ten_nguoi_dung' => ['required', 'string', 'max:255'],
            'email' =>[
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id)
            ],
            'dia_chi'=>['nullable', 'string'],
            'so_dien_thoai'=> ['string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'gioi_tinh'=>['nullable', 'string'],
            'ngay_sinh'=>['nullable', 'date', 'before:today'],
            'anh'=>['nullable', 'image', 'max:2048'],
        ]);
        $data = $request->except('anh');
        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put('user', $request->file('anh'));

            $oldAnh = $user->anh;
            if($request->hasFile('anh') && (Storage::exists($oldAnh))){
                Storage::delete($oldAnh);
            }
        }
        $user->update($data);

        // Chuyển hướng trở lại trang trước với thông báo thành công
        return back()->with('msg', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        if (! Gate::allows('delete', $user)) {
                return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
            }
        $user->delete();
        if(Storage::exists($user->anh)){
            Storage::delete($user->anh);
        }
        return response(['trang_thai' => 'success']);
    }

}

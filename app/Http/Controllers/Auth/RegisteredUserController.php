<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VaiTro;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function index()
    {
        $data=User::query()->latest()->paginate(10);
        return view('admin.user.' . __FUNCTION__,compact('data'));
    }
    public function create(): View
    {
        $vai_tro = VaiTro::query()->pluck('ten_chuc_vu','id')->toArray();
        return view('auth.register' . __FUNCTION__,compact('vai_tro'));
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
            'dia_chi',
            'so_dien_thoai',
        ]);

        $user = User::create([
            'ten_nguoi_dung' => $request->ten_nguoi_dung,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dia_chi' => $request->dia_chi,
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
    public function update(Request $request, User $user)
    {
        // $request->validate([
        //     'ten_nguoi_dung' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'dia_chi',
        //     'so_dien_thoai',
        // ]);
        $user->update($request->all());
        return back()->with('msg','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('msg','Xóa thành công');
    }

}

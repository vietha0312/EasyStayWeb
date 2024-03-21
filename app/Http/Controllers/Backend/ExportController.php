<?php

namespace App\Http\Controllers\Backend;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class ExportController extends Controller
{
    public function exportUser(User $user): RedirectResponse
    {
        if (! Gate::allows('view-A&NV', $user)) {
            return Redirect::back()->with('error', 'Bạn không có quyền thực hiện thao tác này.');
        }
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}

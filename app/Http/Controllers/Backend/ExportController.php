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
    public function exportUser()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}

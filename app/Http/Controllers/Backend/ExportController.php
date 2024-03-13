<?php

namespace App\Http\Controllers\Backend;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportUser()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}

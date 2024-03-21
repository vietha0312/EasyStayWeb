<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\LienHe;
use App\Models\Loai_phong;
use Illuminate\Http\Request;


class LienHeController extends Controller
{
    const PATH_VIEW = 'admin.lien_he.';

    public function contact()
    {
        $khach_sans = Hotel::all();
        return view('client.pages.lienhe', compact('khach_sans'));
    }


    public function index()
    {
        $lienhe = LienHe::query()->latest()->paginate(7);
        return view(self::PATH_VIEW . __FUNCTION__, compact('lienhe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|max:225',
            'subject' => 'required|max:225',
            'comments' => 'nullable|max:225'
        ]);

        LienHe::query()->create($request->all());

        return redirect()->route('client.pages.lien_he');
        
    }
}

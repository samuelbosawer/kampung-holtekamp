<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $datas = Pengaduan::when($request->s, function ($query) use ($request) {
            $s = $request->s;

            $query->where(function ($q) use ($s) {
                $q->where('nama', 'LIKE', "%{$s}%")
                    ->orWhere('email', 'LIKE', "%{$s}%")
                    ->orWhere('nomor_hp', 'LIKE', "%{$s}%")
                    ->orWhere('pesan', 'LIKE', "%{$s}%");
            });
        })
        ->orderBy('id', 'desc')
        ->paginate(7);

        return view('admin.pengaduan.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    public function show($id)
    {
        $data = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.show', compact('data'));
    }
}

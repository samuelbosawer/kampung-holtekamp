<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Pengumuman;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Surat;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     // Tampilkan semua data
    public function index()
    {
       
        $rw = Rw::count();
        $rt = Rt::count();
        $warga = Warga::count();
        $user = User::count();
        $jenissurat = JenisSurat::count();
        $surat = Surat::count();
        $pengumuman = Pengumuman::count();

        return view('admin.crud_tamplate.create-update-show',compact('rw','rt','warga','user','jenissurat','surat','pengumuman'));


    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        //
    }

    // Tampilkan detail satu data
    public function show($id)
    {
         return view('admin.crud_tamplate.create-update-show');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
         return view('admin.crud_tamplate.create-update-show');
    }

    // Update data
    public function update(Request $request, $id)
    {
        //
    }

    // Hapus data
    public function destroy($id)
    {
        //
    }
}

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
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Tampilkan semua data
    public function index()
    {

        $status = null;
        $rw = Rw::count();
        $rt = Rt::count();
        $warga = Warga::count();
        $user = User::count();
        $jenissurat = JenisSurat::count();
        $surat = Surat::count();
        $pengumuman = Pengumuman::count();


          if (Auth::user()->hasRole('kepala')) {
            
              $status = Surat::whereNull('status_kepala')->count();
        }



        if (Auth::user()->hasRole('rt')) {
            if (Auth::user()->rt) {
                // Hitung warga hanya di RT ini
                $warga = Warga::where('rt_id', Auth::user()->rt->id)->count();
                // Hitung surat hanya dari warga di RT ini
                $surat = Surat::whereHas('warga', function ($q) {
                    $q->where('rt_id', Auth::user()->rt->id);
                })->count();
            }
            
            
              $status = Surat::whereHas('warga', function ($q) {
                $q->where('rt_id', Auth::user()->rts->id);
            })->whereNull('status_rt')->count();

        }

        if (Auth::user()->hasRole('rw')) {
            if (Auth::user()->rws)
                // Hitung warga hanya di RT ini
                $warga = Warga::where('rw_id', Auth::user()->rws->id)->count();
                $rt = Rt::where('rw_id', Auth::user()->rws->id)->count();
            // Hitung surat hanya dari warga di RT ini
            $surat = Surat::whereHas('warga', function ($q) {
                $q->where('rw_id', Auth::user()->rws->id);
            })->count();

            $status = Surat::whereHas('warga', function ($q) {
                $q->where('rw_id', Auth::user()->rws->id);
            })->whereNull('status_rw')->count();

        } 



        return view('admin.dashboard.index', compact('rw', 'rt', 'warga', 'user', 'jenissurat', 'surat', 'pengumuman','status'));
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

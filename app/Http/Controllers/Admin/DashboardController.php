<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\PendampinganKasus;
use App\Models\PengaduanMasyarakat;
use App\Models\Pengajuan;
use App\Models\PentugasPendamping;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     // Tampilkan semua data
    public function index()
    {
        $kriteria = Kriteria::count();
        $alternatif = Alternatif::count();
        $pengaduan = PengaduanMasyarakat::count();
        $petugas = PentugasPendamping::count();
        $rekomendasi = Rekomendasi::count();
        $pendampingan = PengaduanMasyarakat::count();
        $pengajuan = Pengajuan::count();

         if (auth()->user()?->hasRole('masyarakat'))
        {
            $pengaduan = PengaduanMasyarakat::where('user_id', auth()->id())->count();
             $pendampingan = PendampinganKasus::with([
            'petugasPendamping',
            'pengaduanMasyarakat.user'
        ])
            // 🔐 Filter jika login sebagai masyarakat
            ->when(auth()->check() && auth()->user()->hasRole('masyarakat'), function ($query) {
                $query->whereHas('pengaduanMasyarakat', function ($q) {
                    $q->where('user_id', auth()->id());
                });
            })->count();
        }




        return view('admin.dashboard.index',compact('kriteria','alternatif','pengaduan','petugas', 'rekomendasi','pendampingan','pengajuan'));
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

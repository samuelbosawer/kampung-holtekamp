<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenisSuratController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = JenisSurat::whereNotNull('nama')
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('nama', 'LIKE', "%{$s}%")
                        ->orWhere('keterangan', 'LIKE', "%{$s}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.jenissurat.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.jenissurat.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:50',

        ], [
            'nama.required'   => 'Nama wajib diisi',
        ]);

        // Simpan User
        $user = JenisSurat::create([
            'nama'    => $request->nama,
            'keterangan' => $request->keterangan,
        ]);



        Alert::success('Berhasil', 'Data Jenis surat ditambahkan');
        return redirect()->route('dashboard.jenis-surat');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = JenisSurat::where('id', $id)->first();
        $judul = 'Detail Jenis Surat';
        return view('admin.jenissurat.create-update-show', compact('data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $data = JenisSurat::where('id', $id)->first();
        $judul = 'Ubah Jenis Surat';
        return view('admin.jenissurat.create-update-show', compact('data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $jenissurat = JenisSurat::findOrFail($id);
        $request->validate([
            'nama'   => 'required|string|max:50',

        ], [
            'nama.required'   => 'Nama wajib diisi',
        ]);

        $jenissurat->nama = $request->nama;
        $jenissurat->keterangan = $request->keterangan;
        $jenissurat->save();


        Alert::success('Berhasil', 'Data Jenis surat diubah');
        return redirect()->route('dashboard.jenis-surat');
    }

    // Hapus data
    public function destroy($id)
    {
        $surat = JenisSurat::findOrFail($id);
        $surat->delete();
        Alert::success('Berhasil', 'Data jenis surat berhasil dihapus');
        return redirect()->route('dashboard.jenis-surat');
    }
}

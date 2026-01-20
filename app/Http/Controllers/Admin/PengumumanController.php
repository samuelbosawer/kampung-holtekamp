<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class PengumumanController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Pengumuman::with('user')
            ->whereNotNull('judul')
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('judul', 'LIKE', "%{$s}%")
                        ->orWhere('isi_pengumuman', 'LIKE', "%{$s}%")
                        ->orWhere('tanggal', 'LIKE', "%{$s}%")
                        ->orWhereHas('user', function ($uq) use ($s) {
                            $uq->where('email', 'LIKE', "%{$s}%");
                        });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.pengumuman.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.pengumuman.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi_pengumuman' => 'required',
            'tanggal' => 'required|date',
        ]);

        $coverPath = null;

        // Simpan gambar hasil resize dari base64
        if ($request->cover_base64) {

            $image = $request->cover_base64;

            // Bersihkan header base64
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'pengumuman_' . time() . '.jpg';

            $path = public_path('uploads/pengumuman');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            file_put_contents($path . '/' . $fileName, base64_decode($image));

            $coverPath = 'uploads/pengumuman/' . $fileName;
        }

        Pengumuman::create([
            'judul' => $request->judul,
            'isi_pengumuman' => $request->isi_pengumuman,
            'tanggal' => $request->tanggal,
            'cover' => $coverPath,
            'user_id' => auth()->id(),
        ]);

        Alert::success('Berhasil', 'Pengumuman berhasil ditambahkan');
        return redirect()->route('dashboard.pengumuman');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = Pengumuman::where('id', $id)->first();
        $judul = 'Detail Data Pengumuman';
        return view('admin.pengumuman.create-update-show', compact('data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $data = Pengumuman::where('id', $id)->first();
        $judul = 'Ubah Data Pengumuman';
        return view('admin.pengumuman.create-update-show', compact('data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi_pengumuman' => 'required',
            'tanggal' => 'required|date',
        ]);

        $coverPath = $pengumuman->cover;

        // Jika ada gambar baru dari base64
        if ($request->cover_base64) {

            // Hapus cover lama
            if ($pengumuman->cover && file_exists(public_path($pengumuman->cover))) {
                unlink(public_path($pengumuman->cover));
            }

            $image = $request->cover_base64;

            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'pengumuman_' . time() . '.jpg';

            $path = public_path('uploads/pengumuman');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            file_put_contents($path . '/' . $fileName, base64_decode($image));

            $coverPath = 'uploads/pengumuman/' . $fileName;
        }

        $pengumuman->update([
            'judul' => $request->judul,
            'isi_pengumuman' => $request->isi_pengumuman,
            'tanggal' => $request->tanggal,
            'cover' => $coverPath,
        ]);

        Alert::success('Berhasil', 'Pengumuman berhasil diperbarui');
        return redirect()->route('dashboard.pengumuman');
    }

    // Hapus data
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if ($pengumuman->cover && file_exists(public_path($pengumuman->cover))) {
            unlink(public_path($pengumuman->cover));
        }

        $pengumuman->delete();

        Alert::success('Berhasil', 'Pengumuman berhasil dihapus');
        return redirect()->route('dashboard.pengumuman');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RwController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    { 
            $datas = Rw::with('user')
                ->whereNotNull('nama_rw')
                ->when($request->s, function ($query) use ($request) {
                    $s = $request->s;

                    $query->where(function ($q) use ($s) {
                        $q->where('nama_rw', 'LIKE', "%{$s}%")
                            ->orWhere('kepala_rw', 'LIKE', "%{$s}%")
                            ->orWhere('keterangan', 'LIKE', "%{$s}%")
                            ->orWhereHas('user', function ($uq) use ($s) {
                                $uq->where('email', 'LIKE', "%{$s}%");
                            });
                    });
                })
                ->orderBy('id', 'desc')
                ->paginate(7);

            return view('admin.rw.index', compact('datas'))
                ->with('i', (request()->input('page', 1) - 1) * 7);
        
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.rw.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_rw'   => 'required|string|max:50',
            'kepala_rw' => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
        ], [
            'nama_rw.required'   => 'Nama RW wajib diisi',
            'kepala_rw.required' => 'Nama Kepala RW wajib diisi',
            'email.required'     => 'Email wajib diisi',
            'email.email'        => 'Format email tidak valid',
            'email.unique'       => 'Email sudah terdaftar',
            'password.required'  => 'Password wajib diisi',
            'password.min'       => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sama',
        ]);

        // Simpan User
        $user = User::create([
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

            $user->assignRole('rw');

        // Simpan RW
        Rw::create([
            'nama_rw'   => $request->nama_rw,
            'kepala_rw' => $request->kepala_rw,
            'keterangan' => $request->keterangan,
            'user_id'   => $user->id,
        ]);

        Alert::success('Berhasil', 'Data RW berhasil ditambahkan');
        return redirect()->route('dashboard.rw');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = Rw::with('user')->where('id', $id)->first();
        $judul = 'Detail Data RW';
        return view('admin.rw.create-update-show', compact('data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {

        $data = Rw::with('user')->where('id', $id)->first();
        $judul = 'Ubah Data RW';
        return view('admin.rw.create-update-show', compact('data', 'judul'));
    }

    public function update(Request $request, $id)
    {
        $rw = Rw::findOrFail($id);
        $user = User::findOrFail($rw->user_id);

        $request->validate([
            'nama_rw'   => 'required|string|max:50',
            'kepala_rw' => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'nullable|min:6|confirmed',
        ], [
            'nama_rw.required'   => 'Nama RW wajib diisi',
            'kepala_rw.required' => 'Nama Kepala RW wajib diisi',
            'email.required'     => 'Email wajib diisi',
            'email.email'        => 'Format email tidak valid',
            'email.unique'       => 'Email sudah digunakan',
            'password.min'       => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sama',
        ]);

        // Update User
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Update RW
        $rw->update([
            'nama_rw'   => $request->nama_rw,
            'kepala_rw' => $request->kepala_rw,
            'keterangan' => $request->keterangan,
        ]);

        Alert::success('Berhasil', 'Data RW berhasil diperbarui');

        return redirect()->route('dashboard.rw');
    }

    // Hapus data
    public function destroy($id)
    {
        $rw = Rw::findOrFail($id);

        // hapus user terkait
        User::where('id', $rw->user_id)->delete();

        // hapus rw
        $rw->delete();

        Alert::success('Berhasil', 'Data RW berhasil dihapus');

        return redirect()->route('dashboard.rw');
    }
}

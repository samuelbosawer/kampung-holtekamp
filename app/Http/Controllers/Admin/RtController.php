<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RtController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {

       if (Auth::user()->hasRole('rt')) {
            return redirect()->route('dashboard.rt.detail', Auth::user()->rts->id);
        }


        $datas = Rt::with(['rw', 'user'])
    ->whereNotNull('nama_rt')

    // 🔐 FILTER JIKA YANG LOGIN ADALAH RW
    ->when(Auth::user()->hasRole('rw'), function ($query) {
        if (Auth::user()->rws) {
            $query->where('rw_id', Auth::user()->rws->id);
        }
    })

    // 🔍 FITUR SEARCH
    ->when($request->s, function ($query) use ($request) {
        $s = $request->s;

        $query->where(function ($q) use ($s) {
            $q->where('nama_rt', 'LIKE', "%{$s}%")
              ->orWhere('kepala_rt', 'LIKE', "%{$s}%")
              ->orWhere('keterangan', 'LIKE', "%{$s}%")

              // relasi ke RW
              ->orWhereHas('rw', function ($rq) use ($s) {
                  $rq->where('nama_rw', 'LIKE', "%{$s}%");
              })

              // relasi ke User
              ->orWhereHas('user', function ($uq) use ($s) {
                  $uq->where('email', 'LIKE', "%{$s}%");
              });
        });
    })

    ->orderBy('id', 'desc')
    ->paginate(7);

        return view('admin.rt.index', compact('datas'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        $rws = Rw::orderBy('id', 'desc')->get();
        return view('admin.rt.create-update-show', compact('rws'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_rt'   => 'required',
            'kepala_rt' => 'required',
            'rw_id'     => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
        ], [
            'nama_rt.required'   => 'Nama RT wajib diisi',
            'kepala_rt.required' => 'Kepala RT wajib diisi',
            'rw_id.required'     => 'RW wajib dipilih',
            'email.required'     => 'Email wajib diisi',
            'email.unique'       => 'Email sudah terdaftar',
            'password.confirmed' => 'Konfirmasi password tidak sama',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('rt');

        Rt::create([
            'nama_rt'   => $request->nama_rt,
            'kepala_rt' => $request->kepala_rt,
            'keterangan' => $request->keterangan,
            'rw_id'     => $request->rw_id,
            'user_id'   => $user->id,
        ]);

        Alert::success('Berhasil', 'Data RT berhasil ditambahkan');
        return redirect()->route('dashboard.rt');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $rws = Rw::orderBy('id', 'desc')->get();
        $judul = 'Detail Data RT';
        $data = RT::where('id', $id)->first();
        return view('admin.rt.create-update-show', compact('rws', 'data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $rws = Rw::orderBy('id', 'desc')->get();
        $judul = 'Ubah Data RT';
        $data = RT::where('id', $id)->first();
        return view('admin.rt.create-update-show', compact('rws', 'data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $rt = Rt::findOrFail($id);
        $user = User::findOrFail($rt->user_id);

        $request->validate([
            'nama_rt'   => 'required',
            'kepala_rt' => 'required',
            'rw_id'     => 'required',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'nullable|confirmed|min:6',
        ]);

        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $rt->update([
            'nama_rt'   => $request->nama_rt,
            'kepala_rt' => $request->kepala_rt,
            'keterangan' => $request->keterangan,
            'rw_id'     => $request->rw_id,
        ]);

        Alert::success('Berhasil', 'Data RT berhasil diperbarui');
        return redirect()->route('dashboard.rt');
    }

    public function destroy($id)
    {
        $rt = Rt::findOrFail($id);
        User::where('id', $rt->user_id)->delete();
        $rt->delete();
        Alert::success('Berhasil', 'Data RT berhasil dihapus');
        return redirect()->route('dashboard.rt');
    }
}

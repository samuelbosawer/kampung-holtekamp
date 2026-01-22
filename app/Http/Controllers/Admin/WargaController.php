<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class WargaController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {

        if (Auth::user()->hasRole('warga')) {
            return redirect()->route('dashboard.warga.detail', Auth::user()->wargas->id);
        }

        $datas = Warga::with(['rt', 'rw', 'user'])

            // 🔐 FILTER JIKA YANG LOGIN ADALAH RW
            ->when(Auth::user()->hasRole('rw'), function ($query) {
                if (Auth::user()->rws) {
                    $query->where('rw_id', Auth::user()->rws->id);
                }
            })

             // 🔐 FILTER JIKA YANG LOGIN ADALAH RT
            ->when(Auth::user()->hasRole('rt'), function ($query) {
                if (Auth::user()->rts) {
                    $query->where('rt_id', Auth::user()->rts->id);
                }
            })



            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('nik', 'LIKE', "%{$s}%")
                        ->orWhere('nama_lengkap', 'LIKE', "%{$s}%")
                        ->orWhere('alamat', 'LIKE', "%{$s}%")
                        ->orWhere('pekerjaan', 'LIKE', "%{$s}%")
                        ->orWhere('status', 'LIKE', "%{$s}%")
                        ->orWhereHas('rt', fn($rt) =>
                        $rt->where('nama_rt', 'LIKE', "%{$s}%"))
                        ->orWhereHas('rw', fn($rw) =>
                        $rw->where('nama_rw', 'LIKE', "%{$s}%"))
                        ->orWhereHas('user', fn($u) =>
                        $u->where('email', 'LIKE', "%{$s}%"));
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('admin.warga.index', compact('datas'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.warga.create-update-show', [
            'judul' => 'Tambah Data Warga',
            'rts'   => Rt::all(),
            'rws'   => Rw::all(),
        ]);
    }


    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nik'           => 'required|unique:wargas,nik',
            'nama_lengkap'  => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required',
            'rt_id'         => 'required',
            'rw_id'         => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|confirmed',
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'status.required' => 'Status perkawinan wajib dipilih',
            'pekerjaan.required' => 'Pekerjaan wajib dipilih',
            'alamat.required' => 'Alamat wajib diisi',
            'rw_id.required' => 'RW wajib dipilih',
            'rt_id.required' => 'RT wajib dipilih',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah digunakan',
            'password.confirmed' => 'Konfirmasi password tidak sama',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('warga');

        Warga::create([
            'nik'           => $request->nik,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'rt_id'         => $request->rt_id,
            'rw_id'         => $request->rw_id,
            'pekerjaan'     => $request->pekerjaan,
            'status'        => $request->status,
            'user_id'       => $user->id,
        ]);

        Alert::success('Berhasil', 'Data Warga berhasil ditambahkan');
        return redirect()->route('dashboard.warga');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = Warga::with(['rt', 'rw', 'user'])->findOrFail($id);

        return view('admin.warga.create-update-show', [
            'judul' => 'Detail Data Warga',
            'data'  => $data,
            'rts'   => Rt::all(),
            'rws'   => Rw::all(),
        ]);
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $data = Warga::with(['rt', 'rw', 'user'])->findOrFail($id);

        return view('admin.warga.create-update-show', [
            'judul' => 'Ubah Data Warga',
            'data'  => $data,
            'rts'   => Rt::all(),
            'rws'   => Rw::all(),
        ]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);
        $user  = User::findOrFail($warga->user_id);

        $request->validate([
            'nik' => [
                'required',
                Rule::unique('wargas', 'nik')->ignore($warga->id),
            ],
            'nama_lengkap'  => 'required|string|max:100',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status'        => 'required|in:Belum Kawin,Sudah Kawin',
            'pekerjaan'     => 'required|string|max:100',
            'alamat'        => 'required|string',
            'rw_id'         => 'required|exists:rws,id',
            'rt_id'         => [
                'required',
                'exists:rts,id',
                function ($attr, $value, $fail) use ($request) {
                    if (!\App\Models\Rt::where('id', $value)
                        ->where('rw_id', $request->rw_id)
                        ->exists()) {
                        $fail('RT tidak sesuai dengan RW yang dipilih.');
                    }
                },
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|confirmed|min:6',
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus terdiri dari 16 digit',
            'nik.unique' => 'NIK sudah terdaftar',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'status.required' => 'Status perkawinan wajib dipilih',
            'pekerjaan.required' => 'Pekerjaan wajib dipilih',
            'alamat.required' => 'Alamat wajib diisi',
            'rw_id.required' => 'RW wajib dipilih',
            'rw_id.exists' => 'RW tidak valid',
            'rt_id.required' => 'RT wajib dipilih',
            'rt_id.exists' => 'RT tidak valid',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.confirmed' => 'Konfirmasi password tidak sama',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        // UPDATE USER
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // UPDATE WARGA
        $warga->update([
            'nik'           => $request->nik,
            'nama_lengkap'  => $request->nama_lengkap,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status'        => $request->status,
            'pekerjaan'     => $request->pekerjaan,
            'alamat'        => $request->alamat,
            'rw_id'         => $request->rw_id,
            'rt_id'         => $request->rt_id,
        ]);

        Alert::success('Berhasil', 'Data Warga berhasil diperbarui');

        return redirect()->route('dashboard.warga');
    }


    // Hapus data
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        User::where('id', $warga->user_id)->delete();
        $warga->delete();

        Alert::success('Berhasil', 'Data Warga berhasil dihapus');
        return redirect()->route('dashboard.warga');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
     // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = User::with('roles')
            ->when($request->s, function ($q) use ($request) {
                $s = $request->s;
                $q->where(function ($qq) use ($s) {
                    $qq->where('name', 'LIKE', "%{$s}%")
                       ->orWhere('email', 'LIKE', "%{$s}%")
                       ->orWhereHas('roles', fn ($r) =>
                            $r->where('name', 'LIKE', "%{$s}%"));
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);
             return view('admin.pengguna.index', compact('datas'))
                ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        // return view('admin.pengguna.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        //
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        return view('admin.pengguna.create-update-show');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $data = User::where('id',$id)->first();
        return view('admin.pengguna.create-update-show', compact('data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
         $user = User::findOrFail($id);
        $request->validate([
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'nullable|min:6|confirmed',
        ], [
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


        Alert::success('Berhasil', 'Data pengguna berhasil diperbarui');

        return redirect()->route('dashboard.user');
    }

    // Hapus data
    public function destroy($id)
    {
        //
    }
}

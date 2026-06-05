<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Pengumuman;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengumuman = Pengumuman::get();
        $warga = Warga::count();
        return view('visitor.home',compact('warga','pengumuman'));

    }


     public function daftar()
    {
        return view('visitor.daftar');
    }

    public function saran(Request $request)
    {
         // 1. Validasi
         $validated = $request->validate([

        // Validasi untuk user
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed', // gunakan password_confirmation
        ]);

    // 2. Simpan ke table users

    $user = User::create([
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

     $user->assignRole('masyarakat');

    Alert::success('Berhasil', 'Pendaftaran Akun Berhail');
    return redirect()->route('login');
    }

    public function pengaduan()
    {
        return view('visitor.pengaduan');
    }

    public function pengaduanSubmit(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_hp' => 'required|string|max:25',
            'pesan' => 'required|string',
        ]);

        // Simpan data pengaduan ke database
        Pengaduan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'pesan' => $request->pesan,
        ]);

        Alert::success('Berhasil', 'Pengaduan Anda Berhasil Dikirim');
        return redirect()->route('pengaduan');
    }

    public function prosedur()
    {
        return view('visitor.prosedur');
    }
    
}

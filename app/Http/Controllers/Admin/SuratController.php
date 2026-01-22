<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class SuratController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Surat::with('jenissurat', 'warga')
            ->whereNotNull('nama_surat')

            // 🔐 FILTER JIKA LOGIN SEBAGAI RW
            ->when(Auth::user()->hasRole('rt'), function ($query) {
                if (Auth::user()->rts) {
                    $query->whereHas('warga', function ($wq) {
                        $wq->where('rt_id', Auth::user()->rts->id);
                    });
                }
            })


            // 🔐 FILTER JIKA LOGIN SEBAGAI RW
            ->when(Auth::user()->hasRole('rw'), function ($query) {
                if (Auth::user()->rws) {
                    $query->whereHas('warga', function ($wq) {
                        $wq->where('rw_id', Auth::user()->rws->id);
                    });
                }
            })


             // 🔐 FILTER JIKA LOGIN SEBAGAI RW
            ->when(Auth::user()->hasRole('warga'), function ($query) {
                if (Auth::user()->wargas) {
                    $query->whereHas('warga', function ($wq) {
                        $wq->where('id', Auth::user()->wargas->id);
                    });
                }
            })


            // 🔍 FITUR SEARCH
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('nama_surat', 'LIKE', "%{$s}%")
                        ->orWhere('keterangan', 'LIKE', "%{$s}%")
                        ->orWhere('tanggal_pengajuan', 'LIKE', "%{$s}%")
                        ->orWhere('status_rw', 'LIKE', "%{$s}%")
                        ->orWhere('status_rt', 'LIKE', "%{$s}%")
                        ->orWhere('status_rt', 'LIKE', "%{$s}%")
                        ->orWhere('status_kepala', 'LIKE', "%{$s}%")

                        // relasi ke jenis surat
                        ->orWhereHas('jenissurat', function ($rq) use ($s) {
                            $rq->where('nama', 'LIKE', "%{$s}%");
                        })

                        // 🔍 tambahan search lewat warga
                        ->orWhereHas('warga', function ($wq) use ($s) {
                            $wq->where('nama_lengkap', 'LIKE', "%{$s}%");
                        });
                });
            })

            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.surat.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        $jenis = JenisSurat::orderBy('id', 'desc')->get();
        $warga = Warga::orderBy('id', 'desc')->get();
        return view('admin.surat.create-update-show', compact('jenis', 'warga'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_surat'        => 'required|string|max:255',
            'nomor_surat'       => 'required|string|max:100|unique:surats,nomor_surat',
            'tanggal_pengajuan' => 'required|date',
            'warga_id'          => 'required|exists:wargas,id',
            'status_rw'         => 'nullable|in:Disetujui,Menunggu,Ditolak',
            'status_rt'         => 'nullable|in:Disetujui,Menunggu,Ditolak',
            'status_kepala'    => 'nullable|in:Disetujui,Menunggu,Ditolak',
            'keterangan'       => 'nullable|string',
        ], [
            'nama_surat.required' => 'Nama surat wajib diisi',
            'nomor_surat.required' => 'Nomor surat wajib diisi',
            'nomor_surat.unique' => 'Nomor surat sudah digunakan',
            'tanggal_pengajuan.required' => 'Tanggal pengajuan wajib diisi',
            'warga_id.required' => 'Warga wajib dipilih',
            'warga_id.exists' => 'Warga tidak valid',
            // 'status_rw.required' => 'Status RW wajib dipilih',
            // 'status_rt.required' => 'Status RW wajib dipilih',
            // 'status_kepala.required' => 'Status Kepala Kampung wajib dipilih',
        ]);

        Surat::create([
            'nama_surat'         => $request->nama_surat,
            'nomor_surat'        => $request->nomor_surat,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'warga_id'           => $request->warga_id,
            'status_rw'          => $request->status_rw,
            'status_rw'          => $request->status_rw,
            'status_rt'          => $request->status_rt,
            'status_kepala'     => $request->status_kepala,
            'keterangan'        => $request->keterangan,
        ]);

        Alert::success('Berhasil', 'Data surat berhasil ditambahkan');
        return redirect()->route('dashboard.surat');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $jenis = JenisSurat::orderBy('id', 'desc')->get();
        $warga = Warga::orderBy('id', 'desc')->get();
        $judul = 'Detail Data Surat';
        $data = Surat::where('id', $id)->first();
        return view('admin.surat.create-update-show', compact('jenis', 'warga', 'data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $jenis = JenisSurat::orderBy('id', 'desc')->get();
        $warga = Warga::orderBy('id', 'desc')->get();
        $judul = 'Ubah Data Surat';
        $data = Surat::where('id', $id)->first();
        return view('admin.surat.create-update-show', compact('jenis', 'warga', 'data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);

        $request->validate([
            'nama_surat'        => 'required|string|max:255',
            'nomor_surat'      => [
                'required',
                'string',
                'max:100',
                Rule::unique('surats', 'nomor_surat')->ignore($surat->id),
            ],
            'tanggal_pengajuan' => 'required|date',
            'warga_id'          => 'required|exists:wargas,id',
            'status_rw'         => 'in:Disetujui,Menunggu,Ditolak',
            'status_rt'         => 'in:Disetujui,Menunggu,Ditolak',
            'status_kepala'    => 'in:Disetujui,Menunggu,Ditolak',
            'keterangan'       => 'nullable|string',
        ], [
            'nama_surat.required' => 'Nama surat wajib diisi',
            'nomor_surat.required' => 'Nomor surat wajib diisi',
            'nomor_surat.unique' => 'Nomor surat sudah digunakan',
            'tanggal_pengajuan.required' => 'Tanggal pengajuan wajib diisi',
            'warga_id.required' => 'Warga wajib dipilih',
            // 'status_rw.required' => 'Status RW wajib dipilih',
            // 'status_rt.required' => 'Status RW wajib dipilih',
            // 'status_kepala.required' => 'Status Kepala Kampung wajib dipilih',
        ]);

        $surat->update([
            'nama_surat'         => $request->nama_surat,
            'nomor_surat'        => $request->nomor_surat,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'warga_id'           => $request->warga_id,
            'status_rw'          => $request->status_rw,
            'status_rw'          => $request->status_rw,
            'status_rt'          => $request->status_rt,
            'status_kepala'     => $request->status_kepala,
            'keterangan'        => $request->keterangan,
        ]);

        Alert::success('Berhasil', 'Data surat berhasil diperbarui');
        return redirect()->route('dashboard.surat');
    }

    // Hapus data
    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();
        Alert::success('Berhasil', 'Data surat berhasil dihapus');
        return redirect()->route('dashboard.surat');
    }
}

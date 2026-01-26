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
use Mpdf\Mpdf;

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

    public function validasi($id)
    {
        $surat = Surat::findOrFail($id);
        $user  = Auth::user();

        // RW hanya boleh ubah status_rw
        if ($user->hasRole('rw')) {

            $surat->update([
                'status_rw' => 'Disetujui'
            ]);
        }

        // RT hanya boleh ubah status_rt
        elseif ($user->hasRole('rt')) {

            $surat->update([
                'status_rt' => 'Disetujui'
            ]);
        }

        // Kepala hanya boleh ubah status_kepala
        elseif ($user->hasRole('kepala')) {

            $surat->update([
                'status_kepala' => 'Disetujui'
            ]);
        }

        // Role lain tidak boleh validasi
        else {
            Alert::error('Akses Ditolak', 'Anda tidak memiliki hak untuk memvalidasi surat');
            return redirect()->back();
        }

        Alert::success('Berhasil', 'Data surat berhasil divalidasi');
        return redirect()->route('dashboard.surat');
    }


    public function pdf($id)
    {
        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', 300);

        // set locale sekali saja
        \Carbon\Carbon::setLocale('id');

        $surat = Surat::with(['jenisSurat', 'warga.rt', 'warga.rw'])
            ->findOrFail($id);

        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'margin_top' => 30,
            'margin_bottom' => 25,
            'margin_left' => 20,
            'margin_right' => 20,
            'tempDir' => storage_path('app/mpdf'),
        ]);

        $html = view('admin.surat.pdf', compact('surat'))->render();

        $mpdf->WriteHTML($html);

        return $mpdf->Output('Surat-' . $surat->nama_surat . '.pdf', 'I');
    }

    // Tampilkan form tambah data
    public function create()
    {
        $jenis = JenisSurat::orderBy('id', 'desc')->get();
        $warga = Warga::orderBy('id', 'desc')->get();
        if (Auth::user()->hasRole('warga')) {
            $warga =  $warga = Warga::where('user_id', Auth::user()->id)->get();
        }
        return view('admin.surat.create-update-show', compact('jenis', 'warga'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_surat'        => 'required|string|max:255',
            'tanggal_pengajuan' => 'required|date',
            'warga_id'          => 'required|exists:wargas,id',
            'status_rw'         => 'nullable|in:Disetujui,Menunggu,Ditolak',
            'status_rt'         => 'nullable|in:Disetujui,Menunggu,Ditolak',
            'status_kepala'    => 'nullable|in:Disetujui,Menunggu,Ditolak',
            'keterangan'       => 'nullable|string',
            'jenis_surat_id'  => 'required',
        ], [
            'nama_surat.required' => 'Nama surat wajib diisi',
            'tanggal_pengajuan.required' => 'Tanggal pengajuan wajib diisi',
            'warga_id.required' => 'Warga wajib dipilih',
            'warga_id.exists' => 'Warga tidak valid',
            'jenis_surat_id.required' => 'Jenis surat wajib diisi',
            // 'status_rw.required' => 'Status RW wajib dipilih',
            // 'status_rt.required' => 'Status RW wajib dipilih',
            // 'status_kepala.required' => 'Status Kepala Kampung wajib dipilih',
        ]);

        Surat::create([
            'nama_surat'         => $request->nama_surat,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'warga_id'           => $request->warga_id,
            'jenis_surat_id'          => $request->jenis_surat_id,
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
            'tanggal_pengajuan' => 'required|date',
            'warga_id'          => 'required|exists:wargas,id',
            'status_rw'         => 'in:Disetujui,Menunggu,Ditolak',
            'status_rt'         => 'in:Disetujui,Menunggu,Ditolak',
            'status_kepala'    => 'in:Disetujui,Menunggu,Ditolak',
            'keterangan'       => 'nullable|string',
            'jenis_surat_id'  => 'required',
        ], [
            'nama_surat.required' => 'Nama surat wajib diisi',
            'tanggal_pengajuan.required' => 'Tanggal pengajuan wajib diisi',
            'warga_id.required' => 'Warga wajib dipilih',
            'jenis_surat_id.required' => 'Jenis surat wajib diisi',
            // 'status_rw.required' => 'Status RW wajib dipilih',
            // 'status_rt.required' => 'Status RW wajib dipilih',
            // 'status_kepala.required' => 'Status Kepala Kampung wajib dipilih',
        ]);

        $surat->update([
            'nama_surat'         => $request->nama_surat,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'warga_id'           => $request->warga_id,
            'jenis_surat_id'          => $request->jenis_surat_id,
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    // ================= INDEX =================
    public function index(Request $request)
    {
        // $datas = Review::with('user')->orderBy('id','desc')->paginate(7);


        $datas = Review::with('user')
            ->whereNotNull('review')

            // 🔍 FITUR SEARCH
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('review', 'LIKE', "%{$s}%")
                        ->orWhere('tanggal', 'LIKE', "%{$s}%")
                        // 🔍 tambahan search lewat warga
                        ->orWhereHas('user', function ($wq) use ($s) {
                            $wq->where('email', 'LIKE', "%{$s}%");
                        });
                });
            })

            ->when(Auth::user()->hasRole('warga'), function ($query) {
                if (Auth::user()->wargas) {
                    $query->whereHas('user', function ($wq) {
                        $wq->where('id', Auth::user()->id);
                    });
                }
            })

            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.review.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // ================= CREATE =================
    public function create()
    {
        if (!Auth::user()->hasRole('warga')) {
            Alert::error('Akses Ditolak', 'Anda tidak memiliki izin menambah review');
            return redirect()->route('dashboard.review.index');
        }

        return view('admin.review.create-update-show', [
            'judul' => 'Tambah Review'
        ]);
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        if (!Auth::user()->hasRole('warga')) {
            Alert::error('Akses Ditolak', 'Anda tidak memiliki izin');
            return redirect()->route('dashboard.review.index');
        }

        $request->validate([
            'kategori' => 'required',
            'nilai'    => 'required',
            'review'   => 'required|min:5',
        ], [
            'kategori.required' => 'Kategori penilaian wajib dipilih',
            'nilai.required'    => 'Nilai penilaian wajib dipilih',
            'review.required'   => 'Kritik dan saran wajib diisi',
        ]);

        Review::create([
            'kategori' => $request->kategori,
            'nilai'    => $request->nilai,
            'review'   => $request->review,
            'tanggal'  => now(),
            'user_id'  => Auth::id(),
        ]);

        Alert::success('Berhasil', 'Terima kasih atas penilaian Anda');
        return redirect()->route('dashboard.review');
    }

    // ================= SHOW =================
    public function show($id)
    {
        $data = Review::with('user')->findOrFail($id);

        return view('admin.review.create-update-show', [
            'judul' => 'Detail Review',
            'data'  => $data
        ]);
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data = Review::findOrFail($id);

        if (!Auth::user()->hasRole('warga') || $data->user_id != Auth::id()) {
            Alert::error('Akses Ditolak', 'Anda tidak dapat mengubah review ini');
            return redirect()->route('dashboard.review');
        }

        return view('admin.review.create-update-show', [
            'judul' => 'Ubah Review',
            'data'  => $data
        ]);
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $request->validate([
            'kategori' => 'required',
            'nilai'    => 'required',
            'review'   => 'required|min:5',
        ]);

        $review->update([
            'kategori' => $request->kategori,
            'nilai'    => $request->nilai,
            'review'   => $request->review,
        ]);

        Alert::success('Berhasil', 'Data review berhasil diperbarui');
        return redirect()->route('dashboard.review');
    }

    // ================= DESTROY =================
    public function destroy($id)
    {
        $data = Review::findOrFail($id);

        if (!Auth::user()->hasRole('warga') || $data->user_id != Auth::id()) {
            Alert::error('Akses Ditolak', 'Anda tidak memiliki izin menghapus');
            return redirect()->route('dashboard.review');
        }

        $data->delete();

        Alert::success('Berhasil', 'Review berhasil dihapus');
        return redirect()->route('dashboard.review');
    }
}

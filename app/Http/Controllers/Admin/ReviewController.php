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
        abort_unless(Auth::user()->hasRole('warga'), 403);
        return view('admin.review.create-update-show', ['mode' => 'create']);
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        abort_unless(Auth::user()->hasRole('warga'), 403);

        $request->validate([
            'q1' => 'required|integer|min:1|max:5',
            'q2' => 'required|integer|min:1|max:5',
            'q3' => 'required|integer|min:1|max:5',
            'q4' => 'required|integer|min:1|max:5',
            'q5' => 'required|integer|min:1|max:5',
            'q6' => 'required|integer|min:1|max:5',
            'q7' => 'required|integer|min:1|max:5',
            'q8' => 'required|integer|min:1|max:5',
            'q9' => 'required|integer|min:1|max:5',
            'q10' => 'required|integer|min:1|max:5',
            'q11' => 'required|integer|min:1|max:5',
            'q12' => 'required|integer|min:1|max:5',
        ], [
            '*.required' => 'Semua pertanyaan wajib diisi',
        ]);

        Review::create(array_merge(
            $request->all(),
            ['user_id' => Auth::id(), 'tanggal' => now()]
        ));

        Alert::success('Terima Kasih', 'Penilaian berhasil disimpan');
        return redirect()->route('dashboard.review');
    }

    // ================= SHOW =================
    public function show($id)
    {
        $data = Review::with('user')->findOrFail($id);
        return view('admin.review.create-update-show', [
            'data' => $data,
            'mode' => 'detail'
        ]);
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data = Review::findOrFail($id);

        abort_if(
            !Auth::user()->hasRole('warga') || $data->user_id != Auth::id(),
            403
        );

        return view('admin.review.create-update-show', [
            'data' => $data,
            'mode' => 'edit'
        ]);
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $data = Review::findOrFail($id);

        abort_if($data->user_id != Auth::id(), 403);

        $request->validate([
            'q1' => 'required|integer|min:1|max:5',
            'q2' => 'required|integer|min:1|max:5',
            'q3' => 'required|integer|min:1|max:5',
            'q4' => 'required|integer|min:1|max:5',
            'q5' => 'required|integer|min:1|max:5',
            'q6' => 'required|integer|min:1|max:5',
            'q7' => 'required|integer|min:1|max:5',
            'q8' => 'required|integer|min:1|max:5',
            'q9' => 'required|integer|min:1|max:5',
            'q10' => 'required|integer|min:1|max:5',
            'q11' => 'required|integer|min:1|max:5',
            'q12' => 'required|integer|min:1|max:5',
        ]);

        $data->update($request->except(['user_id', 'tanggal']));

        Alert::success('Berhasil', 'Penilaian diperbarui');
        return redirect()->route('dashboard.review');
    }

    // ================= DESTROY =================
    public function destroy($id)
    {
        $data = Review::findOrFail($id);

        abort_if(
            !Auth::user()->hasRole('warga') || $data->user_id != Auth::id(),
            403
        );

        $data->delete();
        Alert::success('Dihapus', 'Data penilaian dihapus');
        return back();
    }
}

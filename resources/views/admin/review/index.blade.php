@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <h5 class="card-header">
                <i class="menu-icon tf-icons bx bx-star"></i> Data Penilaian Pengguna
            </h5>

            <div class="table-responsive p-4">

                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-6 col-12">

                        {{-- hanya warga yang boleh tambah --}}
                        @if (Auth::user()->hasRole('warga'))
                            <a href="{{ route('dashboard.review.tambah') }}" class="btn btn-primary w-md-auto">
                                Tambah Data Review<i class="bx bx-plus ms-1"></i>
                            </a>
                        @endif

                    </div>

                    <div class="col-md-6 col-12">
                        @include('admin.layout.search')
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-white text-center" width="50">No</th>
                            <th class="text-white">Nama</th>
                            <th class="text-white text-center">Tanggal</th>

                            {{-- LIKERT --}}
                            <th class="text-white text-center">Total Skor</th>
                            <th class="text-white text-center">Rata-rata</th>
                            <th class="text-white text-center">Persentase</th>
                            <th class="text-white text-center">Kategori</th>

                            <th class="text-white text-center" width="80"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($datas as $index => $data)
                            @php
                                // TOTAL SKOR (q1 - q12)
                                $total =
                                    ($data->q1 ?? 0) +
                                    ($data->q2 ?? 0) +
                                    ($data->q3 ?? 0) +
                                    ($data->q4 ?? 0) +
                                    ($data->q5 ?? 0) +
                                    ($data->q6 ?? 0) +
                                    ($data->q7 ?? 0) +
                                    ($data->q8 ?? 0) +
                                    ($data->q9 ?? 0) +
                                    ($data->q10 ?? 0) +
                                    ($data->q11 ?? 0) +
                                    ($data->q12 ?? 0);

                                $maxSkor = 12 * 5; // 60
                                $rata = $total / 12;
                                $persen = ($total / $maxSkor) * 100;

                                // kategori persentase
                                if ($persen >= 81) {
                                    $kategori = 'Sangat Baik';
                                } elseif ($persen >= 61) {
                                    $kategori = 'Baik';
                                } elseif ($persen >= 41) {
                                    $kategori = 'Cukup';
                                } elseif ($persen >= 21) {
                                    $kategori = 'Kurang';
                                } else {
                                    $kategori = 'Buruk';
                                }
                            @endphp

                            <tr>
                                <td class="text-center">{{ $datas->firstItem() + $index }}</td>

                                <td class="fw-bolder">
                                    {{ $data->user->email ?? '-' }}
                                </td>

                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}
                                </td>

                                {{-- LIKERT --}}
                                <td class="text-center fw-bold">{{ $total }}</td>
                                <td class="text-center">{{ number_format($rata, 2) }}</td>
                                <td class="text-center">{{ number_format($persen, 0) }}%</td>

                                <td class="text-center">
                                    @if ($kategori == 'Sangat Baik')
                                        <span class="badge bg-success">{{ $kategori }}</span>
                                    @elseif ($kategori == 'Baik')
                                        <span class="badge bg-primary">{{ $kategori }}</span>
                                    @elseif ($kategori == 'Cukup')
                                        <span class="badge bg-warning text-dark">{{ $kategori }}</span>
                                    @elseif ($kategori == 'Kurang')
                                        <span class="badge bg-danger">{{ $kategori }}</span>
                                    @else
                                        <span class="badge bg-dark">{{ $kategori }}</span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>

                                        <div class="dropdown-menu">

                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.review.detail', $data->id) }}">
                                                <i class="bx bx-box me-1"></i> Detail
                                            </a>

                                            {{-- warga boleh ubah + hapus data miliknya sendiri --}}
                                            @if (Auth::user()->hasRole('warga') && $data->user_id == Auth::id())
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.review.ubah', $data->id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Ubah
                                                </a>

                                                <form action="{{ route('dashboard.review.hapus', $data->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="bx bx-trash me-1"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @php
                    $rekap = [
                        'Sangat Baik' => 0,
                        'Baik' => 0,
                        'Cukup' => 0,
                        'Kurang' => 0,
                        'Buruk' => 0,
                    ];

                    foreach ($datas as $r) {
                        $total =
                            ($r->q1 ?? 0) +
                            ($r->q2 ?? 0) +
                            ($r->q3 ?? 0) +
                            ($r->q4 ?? 0) +
                            ($r->q5 ?? 0) +
                            ($r->q6 ?? 0) +
                            ($r->q7 ?? 0) +
                            ($r->q8 ?? 0) +
                            ($r->q9 ?? 0) +
                            ($r->q10 ?? 0) +
                            ($r->q11 ?? 0) +
                            ($r->q12 ?? 0);

                        $maxSkor = 12 * 5;
                        $persen = ($total / $maxSkor) * 100;

                        if ($persen >= 81) {
                            $rekap['Sangat Baik']++;
                        } elseif ($persen >= 61) {
                            $rekap['Baik']++;
                        } elseif ($persen >= 41) {
                            $rekap['Cukup']++;
                        } elseif ($persen >= 21) {
                            $rekap['Kurang']++;
                        } else {
                            $rekap['Buruk']++;
                        }
                    }

                    $totalData = $datas->count();
                @endphp


                @if (!Auth::user()->hasRole('warga'))
                    {{-- REKAP KATEGORI --}}
                    <div class="mt-4 p-3 rounded border bg-white">
                        <p class="fw-bold mb-3">📊 Rekap Penilaian (Kategori Likert)</p>

                        <div class="row g-2">
                            <div class="col-md-2 col-6">
                                <div class="p-3 rounded border text-center bg-light">
                                    <div class="fw-bold text-success">Sangat Baik</div>
                                    <h4 class="mb-0">{{ $rekap['Sangat Baik'] }}</h4>
                                    <small class="text-muted">
                                        {{ $totalData > 0 ? number_format(($rekap['Sangat Baik'] / $totalData) * 100, 0) : 0 }}%
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-2 col-6">
                                <div class="p-3 rounded border text-center bg-light">
                                    <div class="fw-bold text-primary">Baik</div>
                                    <h4 class="mb-0">{{ $rekap['Baik'] }}</h4>
                                    <small class="text-muted">
                                        {{ $totalData > 0 ? number_format(($rekap['Baik'] / $totalData) * 100, 0) : 0 }}%
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-2 col-6">
                                <div class="p-3 rounded border text-center bg-light">
                                    <div class="fw-bold text-warning">Cukup</div>
                                    <h4 class="mb-0">{{ $rekap['Cukup'] }}</h4>
                                    <small class="text-muted">
                                        {{ $totalData > 0 ? number_format(($rekap['Cukup'] / $totalData) * 100, 0) : 0 }}%
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-2 col-6">
                                <div class="p-3 rounded border text-center bg-light">
                                    <div class="fw-bold text-danger">Kurang</div>
                                    <h4 class="mb-0">{{ $rekap['Kurang'] }}</h4>
                                    <small class="text-muted">
                                        {{ $totalData > 0 ? number_format(($rekap['Kurang'] / $totalData) * 100, 0) : 0 }}%
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-2 col-6">
                                <div class="p-3 rounded border text-center bg-light">
                                    <div class="fw-bold text-dark">Buruk</div>
                                    <h4 class="mb-0">{{ $rekap['Buruk'] }}</h4>
                                    <small class="text-muted">
                                        {{ $totalData > 0 ? number_format(($rekap['Buruk'] / $totalData) * 100, 0) : 0 }}%
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-2 col-6">
                                <div class="p-3 rounded border text-center bg-light">
                                    <div class="fw-bold">Total</div>
                                    <h4 class="mb-0">{{ $totalData }}</h4>
                                    <small class="text-muted">Data</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- INFO LIKERT --}}
                <div class="mt-3 p-3 rounded border bg-light">
                    <p class="fw-bold mb-1">📌 Metode Skala Likert</p>
                    <small class="text-muted">
                        STS = 1, TS = 2, N = 3, S = 4, SS = 5 <br>
                        Total Skor = jumlah q1–q12 (maksimal 60) <br>
                        Persentase = (Total / 60) × 100% <br>
                        Kategori:
                        81–100% (Sangat Baik), 61–80% (Baik), 41–60% (Cukup), 21–40% (Kurang), 0–20% (Buruk)
                    </small>
                </div>

            </div>

            {{-- PAGINATION --}}
            <div class="mt-3 px-4 pb-4">
                {{ $datas->links() }}
            </div>
        </div>

    </div>
@endsection

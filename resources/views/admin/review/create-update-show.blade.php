@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card mb-4">
            <h5 class="card-header fw-bolder text-capitalize">
                <i class="menu-icon tf-icons bx bx-star"></i>
                {{ $judul ?? 'Tambah Review' }}
            </h5>

            <div class="card-body">

                {{-- FORM OPEN --}}
                @if (Request::segment(4) == 'ubah')
                    <form action="{{ route('dashboard.review.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    @elseif (Request::segment(3) == 'tambah')
                        <form action="{{ route('dashboard.review.store') }}" method="POST">
                            @csrf
                        @else
                            <form>
                @endif

                {{-- HIDDEN --}}
                @auth
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endauth
                <input type="hidden" name="tanggal" value="{{ old('tanggal', $data->tanggal ?? date('Y-m-d')) }}">

                @php
                    // selain warga hanya boleh lihat
                    $disabledAll = Request::segment(3) == 'detail' || !Auth::user()->hasRole('warga');
                @endphp

                <p class="fw-bold mb-3">Berikan penilaian sesuai pengalaman Anda</p>

                {{-- TABEL PERTANYAAN --}}
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th width="5%">No</th>
                            <th>Pernyataan</th>
                            <th>STS<br>(1)</th>
                            <th>TS<br>(2)</th>
                            <th>N<br>(3)</th>
                            <th>S<br>(4)</th>
                            <th>SS<br>(5)</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $pertanyaan = [
                                1 => 'Sistem ini membantu mempermudah pengurusan surat saya',
                                2 => 'Sistem sesuai dengan kebutuhan pelayanan kampung',
                                3 => 'Bahasa dan istilah yang digunakan mudah dipahami',
                                4 => 'Navigasi sistem mudah digunakan',
                                5 => 'Tampilan sistem menarik dan rapi',
                                6 => 'Sistem membantu mempercepat proses pelayanan',
                                7 => 'Fitur sistem berjalan dengan baik',
                                8 => 'Sistem lebih efektif dibanding cara manual',
                                9 => 'Saya puas menggunakan sistem ini',
                                10 => 'Sistem layak digunakan secara berkelanjutan',
                                11 => 'Petugas kampung terbantu dengan adanya sistem',
                                12 => 'Sistem meningkatkan kualitas pelayanan kampung',
                            ];
                        @endphp

                        @foreach ($pertanyaan as $no => $label)
                            <tr>
                                <td>{{ $no }}</td>
                                <td class="text-start">{{ $label }}</td>

                                @for ($i = 1; $i <= 5; $i++)
                                    <td>
                                        <input type="radio"
                                            name="q{{ $no }}"
                                            value="{{ $i }}"
                                            {{ old("q$no", $data->{"q$no"} ?? '') == $i ? 'checked' : '' }}
                                            @if ($disabledAll) disabled @endif>
                                    </td>
                                @endfor
                            </tr>

                            {{-- ERROR PER PERTANYAAN --}}
                            @error("q$no")
                                <tr>
                                    <td colspan="7" class="text-danger text-start small py-1">
                                        <i class='bx bx-error-circle'></i>
                                        Pernyataan nomor {{ $no }} wajib diisi.
                                    </td>
                                </tr>
                            @enderror
                        @endforeach

                    </tbody>
                </table>

                {{-- KETERANGAN SKALA --}}
                <div class="mt-3 p-3 border rounded bg-light">
                    <p class="fw-bold mb-1">Keterangan Skala Penilaian:</p>
                    <ul class="mb-0">
                        <li><strong>STS (1)</strong> : Sangat Tidak Setuju</li>
                        <li><strong>TS (2)</strong> : Tidak Setuju</li>
                        <li><strong>N (3)</strong> : Netral</li>
                        <li><strong>S (4)</strong> : Setuju</li>
                        <li><strong>SS (5)</strong> : Sangat Setuju</li>
                    </ul>
                </div>

                {{-- ERROR GLOBAL --}}
                @if (
                    $errors->has('q1') || $errors->has('q2') || $errors->has('q3') ||
                    $errors->has('q4') || $errors->has('q5') || $errors->has('q6') ||
                    $errors->has('q7') || $errors->has('q8') || $errors->has('q9') ||
                    $errors->has('q10') || $errors->has('q11') || $errors->has('q12')
                )
                    <div class="mt-3">
                        <small class="text-danger fw-bold">
                            ⚠️ Semua pernyataan wajib diisi.
                        </small>
                    </div>
                @endif

                {{-- BUTTON --}}
                <div class="col-md-12 mt-4">

                    @if (Request::segment(3) == 'detail')
                        <a href="{{ route('dashboard.review.ubah', $data->id) }}" class="btn btn-dark">
                            <i class="bx bx-pencil"></i> UBAH DATA
                        </a>
                    @else
                        {{-- selain warga tidak boleh submit --}}
                        @if (Auth::user()->hasRole('warga'))
                            <button type="submit" class="btn btn-primary">
                                SIMPAN <i class="bx bx-save"></i>
                            </button>
                        @endif
                    @endif

                    <a href="{{ route('dashboard.review') }}" class="btn btn-dark">
                        KEMBALI
                    </a>

                </div>

                </form>
            </div>

        </div>
    </div>
@endsection

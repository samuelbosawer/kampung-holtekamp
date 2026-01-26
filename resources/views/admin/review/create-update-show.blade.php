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

                <p class="fw-bold mb-3">Berikan penilaian sesuai pengalaman Anda</p>

                {{-- TABEL PERTANYAAN --}}
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Pernyataan</th>
                            <th>STS (1)</th>
                            <th>TS (2)</th>
                            <th>N (3)</th>
                            <th>S (4)</th>
                            <th>SS (5)</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- PERTANYAAN 1 --}}
                        <tr>
                            <td>1</td>
                            <td class="text-start">Sistem ini membantu mempermudah pengurusan surat saya</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td>
                                    <input type="radio" name="q1" value="{{ $i }}"
                                        {{ old('q1', $data->q1 ?? '') == $i ? 'checked' : '' }}
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                </td>
                            @endfor
                        </tr>

                        {{-- PERTANYAAN 2 --}}
                        <tr>
                            <td>2</td>
                            <td class="text-start">Sistem sesuai dengan kebutuhan pelayanan kampung</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td>
                                    <input type="radio" name="q2" value="{{ $i }}"
                                        {{ old('q2', $data->q2 ?? '') == $i ? 'checked' : '' }}
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                </td>
                            @endfor
                        </tr>

                        {{-- PERTANYAAN 3 --}}
                        <tr>
                            <td>3</td>
                            <td class="text-start">Bahasa dan istilah mudah dipahami</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td>
                                    <input type="radio" name="q3" value="{{ $i }}"
                                        {{ old('q3', $data->q3 ?? '') == $i ? 'checked' : '' }}
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                </td>
                            @endfor
                        </tr>

                    </tbody>
                </table>
                @if ($errors->has('q1') || $errors->has('q2') || $errors->has('q3'))
                    <small class="text-danger">
                        Semua pertanyaan wajib diisi.
                    </small>
                @endif

                {{-- KATEGORI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori Penilaian</label>
                    <select name="kategori" class="form-control" @if (Request::segment(3) == 'detail') disabled @endif>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach (['Sistem', 'Pelayanan', 'Petugas'] as $kat)
                            <option value="{{ $kat }}"
                                {{ old('kategori', $data->kategori ?? '') == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- NILAI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nilai Kepuasan</label>
                    <select name="nilai" class="form-control" @if (Request::segment(3) == 'detail') disabled @endif>
                        <option value="">-- Pilih Nilai --</option>
                        @foreach (['Sangat Baik', 'Baik', 'Cukup', 'Kurang'] as $n)
                            <option value="{{ $n }}"
                                {{ old('nilai', $data->nilai ?? '') == $n ? 'selected' : '' }}>
                                {{ $n }}
                            </option>
                        @endforeach
                    </select>
                    @error('nilai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- KRITIK & SARAN --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Masukan / Kritik / Saran</label>
                    <textarea name="review" rows="4" class="form-control" @if (Request::segment(3) == 'detail') disabled @endif>{{ old('review', $data->review ?? '') }}</textarea>
                    @error('review')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="col-md-12 mt-3">

                    @if (Request::segment(3) == 'detail')
                        <a href="{{ route('dashboard.review.ubah', $data->id) }}" class="btn btn-dark">
                            <i class="bx bx-pencil"></i> UBAH DATA
                        </a>
                    @else
                        <button class="btn btn-primary">
                            SIMPAN <i class="bx bx-save"></i>
                        </button>
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

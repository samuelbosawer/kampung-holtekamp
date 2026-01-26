@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card mb-4">
            <h5 class="card-header fw-bolder">
                <i class="bx bx-comment"></i> {{ $judul }}
            </h5>

            <div class="card-body">

                @if (Request::segment(4) == 'ubah')
                    <form action="{{ route('dashboard.review.update', $data->id) }}" method="POST">
                        @csrf @method('PUT')
                    @elseif(Request::segment(3) == 'tambah')
                        <form action="{{ route('dashboard.review.store') }}" method="POST">
                            @csrf
                        @else
                            <form>
                @endif


                <div class="row">

                    {{-- KATEGORI PENILAIAN --}}
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Kategori Penilaian</label>
                        <select name="kategori" class="form-control" @if (Request::segment(3) == 'detail') disabled @endif>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Pelayanan"
                                {{ old('kategori', $data->kategori ?? '') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                            <option value="Sistem" {{ old('kategori', $data->kategori ?? '') == 'Sistem' ? 'selected' : '' }}>
                                Sistem Aplikasi</option>
                            <option value="Petugas" {{ old('kategori', $data->kategori ?? '') == 'Petugas' ? 'selected' : '' }}>
                                Petugas</option>
                            <option value="Fasilitas"
                                {{ old('kategori', $data->kategori ?? '') == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                            <option value="Lainnya" {{ old('kategori', $data->kategori ?? '') == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya</option>
                        </select>
                        @error('kategori')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- NILAI / RATING --}}
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Nilai Penilaian</label>
                        <select name="nilai" class="form-control" @if (Request::segment(3) == 'detail') disabled @endif>
                            <option value="">-- Pilih Nilai --</option>
                            <option value="Sangat Baik" {{ old('nilai', $data->nilai ?? '') == 'Sangat Baik' ? 'selected' : '' }}>
                                ⭐⭐⭐⭐⭐ Sangat Baik</option>
                            <option value="Baik" {{ old('nilai', $data->nilai ?? '') == 'Baik' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik
                            </option>
                            <option value="Cukup" {{ old('nilai', $data->nilai ?? '') == 'Cukup' ? 'selected' : '' }}>⭐⭐⭐ Cukup
                            </option>
                            <option value="Kurang" {{ old('nilai', $data->nilai ?? '') == 'Kurang' ? 'selected' : '' }}>⭐⭐ Kurang
                            </option>
                            <option value="Buruk" {{ old('nilai', $data->nilai ?? '') == 'Buruk' ? 'selected' : '' }}>⭐ Buruk
                            </option>
                        </select>
                        @error('nilai')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- ISI REVIEW --}}
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Kritik & Saran</label>
                        <textarea name="review" class="form-control" rows="4" @if (Request::segment(3) == 'detail') disabled @endif>{{ old('review', $data->review ?? '') }}</textarea>
                        @error('review')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <div class="mb-3 col-8">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="" class="form-control" disabled
                            value="{{ old('tanggal', $data->tanggal ?? (date('Y-m-d') ?? '')) }}"
                            @if (!Auth::user()->hasRole('warga') || Request::segment(3) == 'detail') disabled @endif>
                        @error('tanggal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                    <div>
                        @if (Auth::user()->hasRole('warga') && Request::segment(3) != 'detail')
                            <button class="btn btn-primary">Simpan</button>
                        @endif

                        <a href="{{ route('dashboard.review') }}" class="btn btn-dark">Kembali</a>
                    </div>

                    </form>
                </div>
            </div>

        </div>
    @endsection

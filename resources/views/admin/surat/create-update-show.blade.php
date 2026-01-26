@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder text-capitalize"><i class="menu-icon tf-icons bx bxs-envelope"></i>
                            {{ $judul ?? 'Tambah Data Surat' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'surat')
                                <form action="{{ route('dashboard.surat.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'surat')
                                    <form action="{{ route('dashboard.surat.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="nama_surat" class="form-label">Nama Surat </label>
                                    <input type="text" class="form-control" id="nama_surat" name="nama_surat"
                                        value="{{ old('nama_surat') ?? ($data->nama_surat ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama_surat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>




                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Jenis Surat</label>
                                    <select name="jenis_surat_id" class="form-control"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option value="">-- Jenis Surat --</option>
                                        @foreach ($jenis as $j)
                                            <option value="{{ $j->id }}"
                                                {{ old('jenis_surat_id', $data->jenis_surat_id ?? '') == $j->id ? 'selected' : '' }}>
                                                {{ $j->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis_surat_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-8 mb-3">
                                    <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan </label>
                                    <input type="date" class="form-control" id="tanggal_pengajuan"
                                        name="tanggal_pengajuan"
                                        value="{{ old('tanggal_pengajuan') ?? ($data->tanggal_pengajuan ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('tanggal_pengajuan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Warga</label>
                                    <select name="warga_id" class="form-control"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option value="">-- Pilih Warga --</option>
                                        @foreach ($warga as $w)
                                            <option value="{{ $w->id }}"
                                                {{ old('warga_id', $data->warga_id ?? '') == $w->id ? 'selected' : '' }}>
                                                {{ $w->nama_lengkap }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('warga_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Validasi Kepala Kampung</label>
                                    <select name="status_kepala" class="form-control"
                                        @if (Request::segment(3) == 'detail' || Auth::user()->hasRole(['admin', 'rw', 'rt', 'warga'])) disabled @endif>

                                        <option value="">-- Pilih Status --</option>
                                        <option value="Disetujui"
                                            {{ old('status_kepala', $data->status_kepala ?? '') == 'Disetujui' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="Menunggu"
                                            {{ old('status_kepala', $data->status_kepala ?? '') == 'Menunggu' ? 'selected' : '' }}>
                                            Menunggu
                                        </option>
                                        <option value="Ditolak"
                                            {{ old('status_kepala', $data->status_kepala ?? '') == 'Ditolak' ? 'selected' : '' }}>
                                            Ditolak
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Validasi Ketua RW</label>
                                    <select name="status_rw" class="form-control"
                                        @if (Request::segment(3) == 'detail' || Auth::user()->hasRole(['admin', 'rt', 'kepala', 'warga'])) disabled @endif>

                                        <option value="">-- Pilih Status --</option>
                                        <option value="Disetujui"
                                            {{ old('status_rw', $data->status_rw ?? '') == 'Disetujui' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="Menunggu"
                                            {{ old('status_rw', $data->status_rw ?? '') == 'Menunggu' ? 'selected' : '' }}>
                                            Menunggu
                                        </option>
                                        <option value="Ditolak"
                                            {{ old('status_rw', $data->status_rw ?? '') == 'Ditolak' ? 'selected' : '' }}>
                                            Ditolak
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Validasi Ketua RT</label>
                                    <select name="status_rt" class="form-control"
                                        @if (Request::segment(3) == 'detail' || Auth::user()->hasRole(['admin', 'rw', 'kepala', 'warga'])) disabled @endif>

                                        <option value="">-- Pilih Status --</option>
                                        <option value="Disetujui"
                                            {{ old('status_rt', $data->status_rt ?? '') == 'Disetujui' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="Menunggu"
                                            {{ old('status_rt', $data->status_rt ?? '') == 'Menunggu' ? 'selected' : '' }}>
                                            Menunggu
                                        </option>
                                        <option value="Ditolak"
                                            {{ old('status_rt', $data->status_rt ?? '') == 'Ditolak' ? 'selected' : '' }}>
                                            Ditolak
                                        </option>
                                    </select>
                                </div>




                                <div class="col-md-8 mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name ="keterangan" rows="3"
                                        @if (Request::segment(3) == 'detail') disabled @endif>{{ old('keterangan') ?? ($data->keterangan ?? '') }}</textarea>
                                    @error('keterangan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3 mx-auto">

                                    @if (Request::segment(3) == 'detail')
                                        @if (!Auth::user()->hasRole('warga'))
                                            <a href="{{ route('dashboard.surat.ubah', $data->id) }}"
                                                class="btn btn-dark text-white">
                                                <i class="menu-icon tf-icons bx bx-pencil"></i>
                                                UBAH DATA </a>
                                        @endif
                                    @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'surat')
                                        <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                                class="menu-icon tf-icons bx bx-save"></i></button>
                                    @endif

                                <a href="{{ route('dashboard.surat') }}" class="btn btn-dark text-white"> KEMBALI
                                </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection

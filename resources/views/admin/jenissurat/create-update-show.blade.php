@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder text-capitalize"><i class="menu-icon tf-icons bx bxs-envelope"></i>
                            {{ $judul ?? 'Tambah Data Jenis Surat' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'jenis-surat')
                                <form action="{{ route('dashboard.jenis-surat.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'jenis-surat')
                                    <form action="{{ route('dashboard.jenis-surat.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-8 mb-3">
                                    <label for="nama" class="form-label">Nama Jenis Surat </label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ old('nama') ?? ($data->nama ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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

                            @if (!Auth::user()->hasRole('kepala|rw|warga'))

                                @if (Request::segment(3) == 'detail')
                                    <a href="{{ route('dashboard.jenis-surat.ubah', $data->id) }}" class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i>
                                        UBAH DATA </a>
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'jenis-surat')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif

                                @endif

                                <a href="{{ route('dashboard.jenis-surat') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection

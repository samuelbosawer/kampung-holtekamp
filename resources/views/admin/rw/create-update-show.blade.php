@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder text-capitalize"><i class="menu-icon tf-icons bx bx-box-alt"></i>
                            {{ $judul ?? 'Tambah Data RW' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'rw')
                                <form action="{{ route('dashboard.rw.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'rw')
                                    <form action="{{ route('dashboard.rw.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-8 mb-3">
                                    <label for="nama_rw" class="form-label">Nomor RW </label>
                                    <input type="text" class="form-control" id="nama_rw" name="nama_rw"
                                        value="{{ old('nama_rw') ?? ($data->nama_rw ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama_rw')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="kepala_rw" class="form-label">Kepala RW </label>
                                    <input type="text" class="form-control" id="kepala_rw" name="kepala_rw"
                                        value="{{ old('kepala_rw') ?? ($data->kepala_rw ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('kepala_rw')
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

                            <div class="col-md-8">
                                <p class="p-2 rounded bg-primary text-white fw-bold">AKSES AKUN </p>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="teks" class="form-control" id="email" name="email"
                                    value="{{ old('email') ?? ($data->user->email ?? '') }}"
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-8 mb-3">
                                <label for="password_confirmation" class="form-label">Ulangi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" value=""
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3 mx-auto">


                                @if (Request::segment(3) == 'detail')
                                    <a href="{{ route('dashboard.rw.ubah', $data->id) }}" class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i>
                                        UBAH DATA </a>
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'rw')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif

                                <a href="{{ route('dashboard.rw') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection

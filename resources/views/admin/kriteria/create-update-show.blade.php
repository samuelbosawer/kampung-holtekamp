@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-box"></i>
                            {{ $judul ?? 'TAMBAH DATA KRITERIA' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'kriteria')
                                <form action="{{ route('dashboard.kriteria.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'kriteria')
                                    <form action="{{ route('dashboard.kriteria.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="kode" class="form-label">Kode Kriteria</label>
                                    <input type="text" class="form-control" id="kode" name="kode"
                                        value="{{ old('kode') ?? ($data->kode ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('kode')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kriteria" class="form-label">Kriteria</label>
                                    <input type="text" class="form-control" id="kriteria" name="kriteria"
                                        value="{{ old('kriteria') ?? ($data->kriteria ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('kriteria')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="jenis_faktor" class="form-label">Jenis Faktor</label>
                                    <select name="jenis_faktor" id="jenis_faktor" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option selected hidden>Pilih Jenis Faktor</option>
                                      
                                            <option value="Core"
                                                {{ old('jenis_faktor', $data->jenis_faktor ?? '') == 'Core' ? 'selected' : '' }}>
                                                Core
                                            </option>
                                             <option value="Secondary"
                                                {{ old('jenis_faktor', $data->jenis_faktor ?? '') == 'Secondary' ? 'selected' : '' }}>
                                                Secondary
                                            </option>
                                    </select>

                                    @error('jenis_faktor')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                  <div class="col-md-6 mb-3">
                                    <label for="bobot" class="form-label">Bobot</label>
                                    <input type="text" class="form-control" id="bobot" name="bobot"
                                        value="{{ old('bobot') ?? ($data->bobot ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('bobot')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-12 mb-3 mx-auto">
                                @if (Request::segment(3) == 'detail')
                                {{-- @if(!Auth::user()->hasAnyRole(['mahasiswa', 'dosen'])) --}}
                                    <a href="{{ route('dashboard.kriteria.ubah', $data->id) }}" class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                {{-- @endif --}}
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'kriteria')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif

                                <a href="{{ route('dashboard.kriteria') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection

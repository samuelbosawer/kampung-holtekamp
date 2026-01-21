@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header fw-bolder text-capitalize">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        {{ $judul ?? 'Tambah Data RT' }}
                    </h5>

                    <div class="card-body">

                        @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'rt')
                            <form action="{{ route('dashboard.rt.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                            @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'rt')
                                <form action="{{ route('dashboard.rt.store') }}" method="POST">
                                    @csrf
                                @else
                                    <form>
                        @endif

                        <div class="row">

                            <div class="col-md-8 mb-3">
                                <label class="form-label">Nomor RT</label>
                                <input type="text" class="form-control" name="nama_rt"
                                    value="{{ old('nama_rt') ?? ($data->nama_rt ?? '') }}"
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('nama_rt')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label">Kepala RT</label>
                                <input type="text" class="form-control" name="kepala_rt"
                                    value="{{ old('kepala_rt') ?? ($data->kepala_rt ?? '') }}"
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('kepala_rt')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label">RW</label>
                                <select name="rw_id" class="form-control"
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                    <option value="">-- Pilih RW --</option>
                                    @foreach ($rws as $rw)
                                        <option value="{{ $rw->id }}"
                                            {{ old('rw_id', $data->rw_id ?? '') == $rw->id ? 'selected' : '' }}>
                                            {{ $rw->nama_rw }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rw_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="3" @if (Request::segment(3) == 'detail') disabled @endif>{{ old('keterangan') ?? ($data->keterangan ?? '') }}</textarea>
                            </div>
                        </div>
                        @if (!Auth::user()->hasRole('kepala|rt|rw|warga'))
                            <div class="col-md-8">
                                <p class="p-2 rounded bg-primary text-white fw-bold">AKSES AKUN</p>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email') ?? ($data->user->email ?? '') }}"
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password"
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label>Ulangi Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                            </div>
                        @endif

                        <div class="col-md-12">

                            @if (!Auth::user()->hasRole('kepala|rt|rw|warga'))
                                @if (Request::segment(3) == 'detail')
                                    <a href="{{ route('dashboard.rt.ubah', $data->id) }}" class="btn btn-dark">UBAH DATA</a>
                                @else
                                    <button class="btn btn-primary">SIMPAN</button>
                                @endif
                            @endif
                            <a href="{{ route('dashboard.rt') }}" class="btn btn-dark">KEMBALI</a>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

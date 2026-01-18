@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header fw-bolder text-capitalize">
            <i class="menu-icon tf-icons bx bx-user"></i>
            {{ $judul ?? 'Tambah Data Warga' }}
        </h5>

        <div class="card-body">

            {{-- FORM OPEN --}}
            @if (Request::segment(4) == 'ubah')
                <form action="{{ route('dashboard.warga.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
            @elseif (Request::segment(3) == 'tambah')
                <form action="{{ route('dashboard.warga.store') }}" method="POST">
                    @csrf
            @else
                <form>
            @endif

            <div class="row">

                {{-- NIK --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text"
                        class="form-control @error('nik') is-invalid @enderror"
                        name="nik"
                        value="{{ old('nik') ?? ($data->nik ?? '') }}"
                        @if(Request::segment(3)=='detail') disabled @endif>
                    @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- NAMA LENGKAP --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text"
                        class="form-control @error('nama_lengkap') is-invalid @enderror"
                        name="nama_lengkap"
                        value="{{ old('nama_lengkap') ?? ($data->nama_lengkap ?? '') }}"
                        @if(Request::segment(3)=='detail') disabled @endif>
                    @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- TEMPAT LAHIR --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text"
                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                        name="tempat_lahir"
                        value="{{ old('tempat_lahir') ?? ($data->tempat_lahir ?? '') }}"
                        @if(Request::segment(3)=='detail') disabled @endif>
                    @error('tempat_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- TANGGAL LAHIR --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') ?? ($data->tanggal_lahir ?? '') }}"
                        @if(Request::segment(3)=='detail') disabled @endif>
                    @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- JENIS KELAMIN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                        @if(Request::segment(3)=='detail') disabled @endif>
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin',$data->jenis_kelamin ?? '')=='L'?'selected':'' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin',$data->jenis_kelamin ?? '')=='P'?'selected':'' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- STATUS PERKAWINAN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status Perkawinan</label>
                    <select name="status"
                        class="form-control @error('status') is-invalid @enderror"
                        @if(Request::segment(3)=='detail') disabled @endif>
                        <option value="">-- Pilih --</option>
                        <option value="Belum Kawin" {{ old('status',$data->status ?? '')=='Belum Kawin'?'selected':'' }}>Belum Kawin</option>
                        <option value="Sudah Kawin" {{ old('status',$data->status ?? '')=='Sudah Kawin'?'selected':'' }}>Sudah Kawin</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- PEKERJAAN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <select name="pekerjaan"
                        class="form-control @error('pekerjaan') is-invalid @enderror"
                        @if(Request::segment(3)=='detail') disabled @endif>
                        <option value="">-- Pilih Pekerjaan --</option>
                        @php
                            $pekerjaan = [
                                'Pelajar/Mahasiswa','Petani','Nelayan','PNS',
                                'Wiraswasta','Karyawan Swasta','Guru',
                                'Ibu Rumah Tangga','Tidak Bekerja'
                            ];
                        @endphp
                        @foreach($pekerjaan as $p)
                            <option value="{{ $p }}"
                                {{ old('pekerjaan',$data->pekerjaan ?? '')==$p?'selected':'' }}>
                                {{ $p }}
                            </option>
                        @endforeach
                    </select>
                    @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- RW --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">RW</label>
                    <select id="rw_id" name="rw_id"
                        class="form-control @error('rw_id') is-invalid @enderror"
                        @if(Request::segment(3)=='detail') disabled @endif>
                        <option value="">-- Pilih RW --</option>
                        @foreach($rws as $rw)
                            <option value="{{ $rw->id }}"
                                {{ old('rw_id',$data->rw_id ?? '')==$rw->id?'selected':'' }}>
                                {{ $rw->nama_rw }}
                            </option>
                        @endforeach
                    </select>
                    @error('rw_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- RT --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">RT</label>
                    <select id="rt_id" name="rt_id"
                        class="form-control @error('rt_id') is-invalid @enderror"
                        @if(Request::segment(3)=='detail') disabled @endif>
                        <option value="">-- Pilih RT --</option>
                        @foreach($rts as $rt)
                            <option value="{{ $rt->id }}"
                                data-rw="{{ $rt->rw_id }}"
                                {{ old('rt_id',$data->rt_id ?? '')==$rt->id?'selected':'' }}>
                                {{ $rt->nama_rt }}
                            </option>
                        @endforeach
                    </select>
                    @error('rt_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- ALAMAT --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea
                        class="form-control @error('alamat') is-invalid @enderror"
                        name="alamat" rows="3"
                        @if(Request::segment(3)=='detail') disabled @endif>{{ old('alamat') ?? ($data->alamat ?? '') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

            </div>

            {{-- AKSES AKUN --}}
            <div class="col-md-8 mt-3">
                <p class="p-2 rounded bg-primary text-white fw-bold">AKSES AKUN</p>
            </div>

            <div class="col-md-8 mb-3">
                <label>Email</label>
                <input type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') ?? ($data->user->email ?? '') }}"
                    @if(Request::segment(3)=='detail') disabled @endif>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-8 mb-3">
                <label>Password</label>
                <input type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    @if(Request::segment(3)=='detail') disabled @endif>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                @if(Request::segment(4)=='ubah')
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                @endif
            </div>

            <div class="col-md-8 mb-3">
                <label>Konfirmasi Password</label>
                <input type="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation"
                    @if(Request::segment(3)=='detail') disabled @endif>
                @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- BUTTON --}}
            <div class="col-md-12">
                @if(Request::segment(3)=='detail')
                    <a href="{{ route('dashboard.warga.ubah',$data->id) }}" class="btn btn-dark">UBAH DATA</a>
                @else
                    <button class="btn btn-primary">SIMPAN</button>
                @endif
                <a href="{{ route('dashboard.warga') }}" class="btn btn-dark">KEMBALI</a>
            </div>

            </form>
        </div>
    </div>
</div>

{{-- SCRIPT RW → RT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const rwSelect = document.getElementById('rw_id');
    const rtSelect = document.getElementById('rt_id');

    if (!rwSelect || !rtSelect) return;

    // ⛔ Jika halaman DETAIL (RW sudah disabled dari blade)
    if (rwSelect.disabled) {
        rtSelect.disabled = true;
        return;
    }

    function filterRT() {
        const rwId = rwSelect.value;

        if (!rwId) {
            rtSelect.value = '';
            rtSelect.disabled = true;
        } else {
            rtSelect.disabled = false;
        }

        Array.from(rtSelect.options).forEach(option => {
            if (!option.value) return;
            option.style.display = option.dataset.rw == rwId ? 'block' : 'none';
        });
    }

    rwSelect.addEventListener('change', filterRT);

    // trigger awal (mode edit)
    filterRT();
});
</script>
@endsection

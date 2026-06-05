@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header"><i class="menu-icon tf-icons bx bx-comment-detail"></i> Detail Pengaduan</h5>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Nama</strong></div>
                            <div class="col-md-9">{{ $data->nama }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Email</strong></div>
                            <div class="col-md-9">{{ $data->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Nomor HP</strong></div>
                            <div class="col-md-9">{{ $data->nomor_hp }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Pesan</strong></div>
                            <div class="col-md-9">{{ $data->pesan }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Dikirim</strong></div>
                            <div class="col-md-9">{{ $data->created_at->translatedFormat('d F Y H:i') }}</div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('dashboard.pengaduan') }}" class="btn btn-dark">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

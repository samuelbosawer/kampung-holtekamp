@extends('admin.layout.tamplate')

@section('content')

<style>
    .dropdown-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 38px;
    height: 38px;
    border-radius: 10px;
    text-decoration: none;
    color: #566a7f;
    background: #f6f6f9;
}

.dropdown-icon:hover {
    background: #eaeaf0;
    color: #000;
}

.dropdown-menu {
    border-radius: 12px !important;
}

</style>
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">

                <div class="card">
                    <h5 class="card-header text-capitalize"> <i class="menu-icon tf-icons bx bxs-envelope"></i> Data Surat
                    </h5>
                    <div class="table-responsive text-nowrap p-5">
                        <div class="row g-2 mb-3 align-items-center">
                            <div class="col-md-6 col-12">

                                @if (!Auth::user()->hasRole('admin|rt|rw|kepala'))
                                    <a href="{{ route('dashboard.surat.tambah') }}" class="btn btn-primary  w-md-auto">
                                        Tambah Data Surat<i class="bx bx-plus ms-1"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-6 col-12">
                                @include('admin.layout.search')
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead class="">
                                <tr class="bg-primary ">
                                    <th class="text-white text-center  p-3 fw-bolder">Nama </th>
                                    <th class="text-white text-center  p-3 fw-bolder">Validasi K. Kampung</th>
                                    <th class="text-white text-center  p-3 fw-bolder">Validasi RW</th>
                                    <th class="text-white text-center  p-3 fw-bolder">Validasi RT</th>
                                    <th class="text-white text-center  p-3 fw-bolder">Warga</th>
                                    <th class="text-white text-center  p-3 fw-bolder"></th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($datas as $data)
                                    <tr>
                                        <td class="fw-bolder"> <a
                                                href="{{ route('dashboard.surat.detail', $data->id) }}">{{ $data->nama_surat }}</a>
                                            <br>
                                            {{ $data->jenissurat->nama ?? '-' }}
                                            <br>
                                            {{ \Carbon\Carbon::parse($data->tanggal_pengajuan)->translatedFormat('d F Y') }}
                                        </td>
                                        <td>{{ $data->status_kepala ?? 'Belum ada' }}</td>
                                        <td>{{ $data->status_rw ?? 'Belum ada' }}</td>
                                        <td>{{ $data->status_rt ?? 'Belum ada' }}</td>
                                        <td>{{ $data->warga->nama_lengkap }}</td>
                                        <td class="text-center">
    <div class="dropdown">
        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i class="bx bx-dots-vertical-rounded"></i>
        </button>

        <div class="dropdown-menu dropdown-menu-end p-2" style="min-width: auto;">
            <div class="d-flex flex-column gap-2">

                {{-- DETAIL --}}
                <a class="dropdown-icon" href="{{ route('dashboard.surat.detail', $data->id) }}">
                    <i class="bx bx-box"></i>
                </a>

                {{-- VALIDASI --}}
                @if (!Auth::user()->hasRole('admin|warga'))

                    @if (Auth::user()->hasRole('rt'))
                        <a class="dropdown-icon" href="{{ route('dashboard.surat.validasi', $data->id) }}">
                            <i class="bx bxs-report"></i>
                        </a>
                    @endif

                    @if (Auth::user()->hasRole('rw') && $data->status_rt == 'Disetujui')
                        <a class="dropdown-icon" href="{{ route('dashboard.surat.validasi', $data->id) }}">
                            <i class="bx bxs-report"></i>
                        </a>
                    @endif

                    @if (Auth::user()->hasRole('kepala') && $data->status_rt == 'Disetujui' && $data->status_rw == 'Disetujui')
                        <a class="dropdown-icon" href="{{ route('dashboard.surat.validasi', $data->id) }}">
                            <i class="bx bxs-report"></i>
                        </a>
                    @endif

                @endif

                {{-- EDIT + HAPUS --}}
                @if (!Auth::user()->hasRole('warga'))

                    @if (!($data->status_rt == 'Disetujui' && $data->status_rw == 'Disetujui' && $data->status_kepala == 'Disetujui'))

                        <a class="dropdown-icon" href="{{ route('dashboard.surat.ubah', $data->id) }}">
                            <i class="bx bx-edit-alt"></i>
                        </a>

                        <form action="{{ route('dashboard.surat.hapus', $data->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="dropdown-icon text-danger border-0 bg-transparent">
                                <i class="bx bx-trash"></i>
                            </button>
                        </form>

                    @endif
                @endif

                {{-- PDF --}}
                @if ($data->status_rw == 'Disetujui' && $data->status_rt == 'Disetujui' && $data->status_kepala == 'Disetujui')
                    <a target="_blank" class="dropdown-icon" href="{{ route('dashboard.surat.pdf', $data->id) }}">
                        <i class="bx bxs-file"></i>
                    </a>
                @endif

            </div>
        </div>
    </div>
</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse




                            </tbody>
                        </table>
                    </div>
                    <div class=" mt-3">
                        {{ $datas->links() }}
                    </div>
                </div>
            </div>
            <!-- Bootstrap Table with Header - Light -->

        </div>
    </div>
@endsection

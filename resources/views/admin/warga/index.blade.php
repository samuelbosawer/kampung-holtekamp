@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <h5 class="card-header text-capitalize">
                    <i class="menu-icon tf-icons bx bx-user"></i> Data Warga
                </h5>

                <div class="table-responsive text-nowrap p-5">
                    <div class="row g-2 mb-3 align-items-center">
                        <div class="col-md-6 col-12">

                            @if (!Auth::user()->hasRole('kepala|rw|warga'))
                            <a href="{{ route('dashboard.warga.tambah') }}" class="btn btn-primary">
                                Tambah Data Warga <i class="bx bx-plus ms-1"></i>
                            </a>
                            @endif
                        </div>
                        <div class="col-md-6 col-12">
                            @include('admin.layout.search')
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th class="text-white text-center p-3 fw-bolder" width="10px">No</th>
                                <th class="text-white text-center p-3 fw-bolder">NIK</th>
                                <th class="text-white text-center p-3 fw-bolder">Nama</th>
                                <th class="text-white text-center p-3 fw-bolder">RT / RW</th>
                                <th class="text-white text-center p-3 fw-bolder">Email</th>
                                <th class="text-white text-center p-3 fw-bolder"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $i = ($datas->currentPage()-1)*$datas->perPage(); @endphp
                            @forelse ($datas as $data)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td class="fw-bolder">
                                        <a href="{{ route('dashboard.warga.detail',$data->id) }}">
                                            {{ $data->nama_lengkap }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {{ $data->rt->nama_rt ?? '-' }} /
                                        {{ $data->rw->nama_rw ?? '-' }}
                                    </td>
                                    <td>{{ $data->user->email ?? '-' }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.warga.detail',$data->id) }}">
                                                    <i class="bx bx-box me-1"></i> Detail
                                                </a>

                            @if (!Auth::user()->hasRole('kepala|rw|warga'))

                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.warga.ubah',$data->id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Ubah
                                                </a>
                                                <form action="{{ route('dashboard.warga.hapus',$data->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item text-danger">
                                                        <i class="bx bx-trash me-1"></i> Hapus
                                                    </button>
                                                </form>

                                                @endif
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

                <div class="mt-3 px-4">
                    {{ $datas->appends(request()->query())->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

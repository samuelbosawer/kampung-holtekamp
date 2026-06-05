@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header text-capitalize"> <i class="menu-icon tf-icons bx bx-comment"></i> Data Pengaduan</h5>
                    <div class="table-responsive text-nowrap p-5">
                        <div class="row g-2 mb-3 align-items-center">
                            <div class="col-md-6 col-12">
                                <p class="mb-0">Total pengaduan: <strong>{{ $datas->total() }}</strong></p>
                            </div>
                            <div class="col-md-6 col-12">
                                @include('admin.layout.search')
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-white text-center p-3 fw-bolder" width="10">No</th>
                                    <th class="text-white text-center p-3 fw-bolder">Nama</th>
                                    <th class="text-white text-center p-3 fw-bolder">Email</th>
                                    <th class="text-white text-center p-3 fw-bolder">Nomor HP</th>
                                    <th class="text-white text-center p-3 fw-bolder">Pesan</th>
                                    <th class="text-white text-center p-3 fw-bolder">Tanggal</th>
                                    <th class="text-white text-center p-3 fw-bolder"></th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($datas as $data)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->nomor_hp }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($data->pesan, 60) }}</td>
                                        <td>{{ $data->created_at->translatedFormat('d F Y H:i') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('dashboard.pengaduan.detail', $data->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bx bx-show me-1"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data pengaduan tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 px-4 pb-4">
                        {{ $datas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

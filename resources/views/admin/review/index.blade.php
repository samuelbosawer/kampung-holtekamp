@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <h5 class="card-header">
                <i class="menu-icon tf-icons bx bx-star"></i> Data Penilaian Pengguna
            </h5>

            <div class="table-responsive p-4">

              <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-6 col-12">

                        @if (!Auth::user()->hasRole('admin|rt|rw|kepala'))
                            <a href="{{ route('dashboard.review.tambah') }}" class="btn btn-primary  w-md-auto">
                                Tambah Data Review<i class="bx bx-plus ms-1"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 col-12">
                        @include('admin.layout.search')
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-white">No</th>
                            <th class="text-white">Nama</th>
                            <th class="text-white">Kategori</th>
                            <th class="text-white">Nilai</th>
                            <th class="text-white">Tanggal</th>
                            <th class="text-white"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($datas as $i => $data)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $data->user->email }}</td>
                                <td>{{ $data->kategori }}</td>
                                <td>{{ $data->nilai }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">


                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.review.detail', $data->id) }}">
                                                <i class="bx bx-box me-1"></i> Detail</a>
                                            @if (Auth::user()->hasRole('warga') && $data->user_id == Auth::id())
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.review.ubah', $data->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Ubah</a>




                                                <form action="{{ route('dashboard.review.hapus', $data->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="dropdown-item text-danger">
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
                                <td colspan="6" class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection

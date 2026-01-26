@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

      <div class="card">
    <h5 class="card-header">
        <i class="menu-icon tf-icons bx bx-star"></i> Data Penilaian Pengguna
    </h5>

    <div class="table-responsive p-4">

        @if(Auth::user()->hasRole('warga'))
            <a href="{{ route('dashboard.review.create') }}" class="btn btn-primary mb-3">
                Tambah Penilaian
            </a>
        @endif

        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Nilai</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($datas as $i => $data)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $data->user->email }}</td>
                    <td>{{ $data->kategori }}</td>
                    <td>{{ $data->nilai }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('dashboard.review.show',$data->id) }}" class="btn btn-info btn-sm">Detail</a>

                        @if(Auth::user()->hasRole('warga') && $data->user_id == Auth::id())
                            <a href="{{ route('dashboard.review.edit',$data->id) }}" class="btn btn-warning btn-sm">Ubah</a>

                            <form action="{{ route('dashboard.review.destroy',$data->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        @endif
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

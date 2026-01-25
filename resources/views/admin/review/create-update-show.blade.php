@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

<div class="card mb-4">
    <h5 class="card-header fw-bolder">
        <i class="bx bx-comment"></i> {{ $judul }}
    </h5>

    <div class="card-body">

        @if(Request::segment(4)=='ubah')
            <form action="{{ route('dashboard.review.update',$data->id) }}" method="POST">
                @csrf @method('PUT')
        @elseif(Request::segment(3)=='tambah')
            <form action="{{ route('dashboard.review.store') }}" method="POST">
                @csrf
        @else
            <form>
        @endif

        <div class="mb-3">
            <label class="form-label">Review</label>
            <textarea name="review" class="form-control" rows="4"
                @if(!Auth::user()->hasRole('warga') || Request::segment(3)=='detail') disabled @endif>{{ old('review',$data->review ?? '') }}</textarea>
            @error('review') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="" class="form-control" disabled
                value="{{ old('tanggal',$data->tanggal ?? date('Y-m-d') ?? '') }}"
                @if(!Auth::user()->hasRole('warga') || Request::segment(3)=='detail') disabled @endif>
            @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
       <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
        <div>
            @if(Auth::user()->hasRole('warga') && Request::segment(3)!='detail')
                <button class="btn btn-primary">Simpan</button>
            @endif

            <a href="{{ route('dashboard.review') }}" class="btn btn-dark">Kembali</a>
        </div>

        </form>
    </div>
</div>

</div>
@endsection

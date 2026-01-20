@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header fw-bolder text-capitalize">
                <i class="menu-icon tf-icons bx bx-news"></i>
                {{ $judul ?? 'Tambah Data Pengumuman' }}
            </h5>

            <div class="card-body">

                {{-- FORM OPEN --}}
                @if (Request::segment(4) == 'ubah')
                    <form action="{{ route('dashboard.pengumuman.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf @method('PUT')
                    @elseif(Request::segment(3) == 'tambah')
                        <form action="{{ route('dashboard.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @else
                            <form>
                @endif

                <div class="row">

                    {{-- JUDUL --}}
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Judul Pengumuman</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                            value="{{ old('judul') ?? ($data->judul ?? '') }}"
                            @if (Request::segment(3) == 'detail') disabled @endif>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- TANGGAL --}}
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                            value="{{ old('tanggal') ?? ($data->tanggal ?? '') }}"
                            @if (Request::segment(3) == 'detail') disabled @endif>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ISI PENGUMUMAN --}}
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Isi Pengumuman</label>
                        <textarea class="form-control @error('isi_pengumuman') is-invalid @enderror" name="isi_pengumuman" rows="5"
                            @if (Request::segment(3) == 'detail') disabled @endif>{{ old('isi_pengumuman') ?? ($data->isi_pengumuman ?? '') }}</textarea>
                        @error('isi_pengumuman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- COVER --}}
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Cover (Gambar)</label>
                        <input type="file" class="form-control @error('cover') is-invalid @enderror" accept="image/*"
                            onchange="previewGambar(this)" @if (Request::segment(3) == 'detail') disabled @endif>

                        {{-- hidden input untuk base64 --}}
                        <input type="hidden" name="cover_base64" id="gambarBase64">

                        @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-8 mb-3">
                        <img id="preview-gambar"
                            src="{{ isset($data) && $data->cover ? asset($data->cover) : 'https://placehold.co/100x100?text=Preview' }}"
                            width="100" height="100" class="img-thumbnail">
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="col-md-12 mt-3">
                    @if (Request::segment(3) == 'detail')
                        <a href="{{ route('dashboard.pengumuman.ubah', $data->id) }}" class="btn btn-dark">
                            <i class="bx bx-pencil"></i> UBAH DATA
                        </a>
                    @else
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-save"></i> SIMPAN
                        </button>
                    @endif

                    <a href="{{ route('dashboard.pengumuman') }}" class="btn btn-dark">
                        KEMBALI
                    </a>
                </div>

                </form>
            </div>
        </div>
    </div>

 <script>
function previewGambar(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {

                // Canvas resize 100x100 (sesuai kebutuhan cover)
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = 100;
                canvas.height = 100;

                ctx.drawImage(img, 0, 0, 100, 100);

                // Convert ke base64
                const base64Image = canvas.toDataURL('image/jpeg', 0.9);

                // Preview
                document.getElementById('preview-gambar').src = base64Image;

                // Simpan ke hidden input
                document.getElementById('gambarBase64').value = base64Image;
            };
            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
}
</script>

@endsection

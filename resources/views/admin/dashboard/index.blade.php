@extends('admin.layout.tamplate')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> --}}

            <div class="row">

                <div class="col-lg-12 col-md-12 order-1">
                    <div class="row">



                        @if (Auth::user()->hasRole('admindinas'))
                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">
                                            Kriteria </h4>
                                        <h1> {{ $kriteria }}</h1>
                                        <a href="{{ route('dashboard.kriteria') }}">Detail</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">
                                            Alternatif </h4>
                                        <h1>{{ $alternatif }}</h1>
                                        <a href="">Detail</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pengaduan </h4>
                                        <h1> {{ $pengaduan }} </h1>
                                        <a href="{{ route('dashboard.pengaduan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pendampingan </h4>
                                        <h1>{{ $pendampingan }}</h1>
                                        <a href="{{ route('dashboard.pendampingan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Petugas </h4>
                                        <h1>{{ $petugas }}</h1>
                                        <a href="{{ route('dashboard.petugas') }}">Detail</a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pengajuan </h4>
                                        <h1>{{ $pengajuan }}</h1>
                                        <a href="{{ route('dashboard.pengajuan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endif






                        @if (Auth::user()->hasRole('petugas'))
                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pengaduan </h4>
                                        <h1> {{ $pengaduan }} </h1>
                                        <a href="{{ route('dashboard.pengaduan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pendampingan </h4>
                                        <h1>{{ $pendampingan }}</h1>
                                        <a href="{{ route('dashboard.pendampingan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endif



                         @if (Auth::user()->hasRole('masyarakat'))
                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pengaduan </h4>
                                        <h1> {{ $pengaduan }} </h1>
                                        <a href="{{ route('dashboard.pengaduan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pendampingan </h4>
                                        <h1>{{ $pendampingan }}</h1>
                                        <a href="{{ route('dashboard.pendampingan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endif



                         @if (Auth::user()->hasRole('kepaladinas'))
                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pengaduan </h4>
                                        <h1> {{ $pengaduan }} </h1>
                                        <a href="{{ route('dashboard.pengaduan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pendampingan </h4>
                                        <h1>{{ $pendampingan }}</h1>
                                        <a href="{{ route('dashboard.pendampingan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Petugas </h4>
                                        <h1>{{ $petugas }}</h1>
                                        <a href="{{ route('dashboard.petugas') }}">Detail</a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                                <div class="card text-center">
                                    <div class="card-body ">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            {{-- <div class=" flex-shrink-0 mx-auto">
                            </div> --}}
                                        </div>
                                        <h4 class="fw-semibold d-block mb-1 text-dark ">Pengajuan </h4>
                                        <h1>{{ $pengajuan }}</h1>
                                        <a href="{{ route('dashboard.pengajuan') }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endif









                    </div>
                </div>


            </div>

        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    © Copyright IT SI KDRT MIMIKA
                    <script>
                        document.write(new Date().getFullYear());
                    </script>

                </div>

            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection

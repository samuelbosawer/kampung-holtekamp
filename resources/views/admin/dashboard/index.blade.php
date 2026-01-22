@extends('admin.layout.tamplate')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> --}}

            <div class="row">


                @if (Auth::user()->hasAnyRole(['admin|kepala']))
                    <div class="col-lg-12 col-md-12 order-1">
                        <div class="row">




                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bx-box bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">RW </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $rw ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.rw') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bx-box bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">RT </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $rt ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.rt') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bx-user bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">Warga </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $warga ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.warga') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bx-user bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">Pengguna </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $user ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.user') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>




                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bxs-envelope bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">Jenis Surat </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $jenissurat ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.jenis-surat') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bxs-envelope bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">Surat </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $surat ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.surat') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bxs-news bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">Pengumuman </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $pengumuman ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.pengumuman') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>













                        </div>
                    </div>
                @endif





                @if (Auth::user()->hasAnyRole(['rt|rw']))
                   
                    <div class="col-lg-12 col-md-12 order-1">
                        <div class="row">
                             @if (Auth::user()->hasAnyRole(['rw']))
                        <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                            <div class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                <!-- Gradient overlay untuk uniqueness -->
                                <div class="card-gradient"></div>

                                <div class="card-body text-center p-4 position-relative">
                                    <!-- Avatar dengan status online -->
                                    <div class="position-relative d-inline-block mb-3">
                                        <div
                                            class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                            <i class="bx bx-box bx-lg"></i>
                                        </div>
                                        <span
                                            class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                            style="width: 15px; height: 15px;"></span>
                                    </div>

                                    <!-- Nama dan role -->
                                    <h5 class="card-title mb-1 text-dark fw-bold">RT </h5>
                                    <h3 class=" fw-bolder mb-3">{{ $rt ?? '0' }}</h3>



                                </div>

                                <!-- Tombol action di bawah (opsional) -->
                                <div class="card-footer bg-transparent border-0 text-center pt-0">
                                    <a href="{{ route('dashboard.rt') }}"
                                        class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif









                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bx-user bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">Warga </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $warga ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.warga') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>




                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bxs-envelope bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">Surat </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $surat ?? '0' }}</h3>
                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.surat') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                @if (Auth::user()->hasAnyRole(['warga']))
                    <div class="col-lg-12 col-md-12 order-1">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                                <div
                                    class="card border-0 shadow-sm h-100 user-card-hover position-relative overflow-hidden">
                                    <!-- Gradient overlay untuk uniqueness -->
                                    <div class="card-gradient"></div>

                                    <div class="card-body text-center p-4 position-relative">
                                        <!-- Avatar dengan status online -->
                                        <div class="position-relative d-inline-block mb-3">
                                            <div
                                                class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="bx bxs-envelope bx-lg"></i>
                                            </div>
                                            <span
                                                class="position-absolute bottom-0 end-0 translate-middle-x badge rounded-pill bg-success border border-3 border-white"
                                                style="width: 15px; height: 15px;"></span>
                                        </div>

                                        <!-- Nama dan role -->
                                        <h5 class="card-title mb-1 text-dark fw-bold">Surat </h5>
                                        <h3 class=" fw-bolder mb-3">{{ $surat ?? '0' }}</h3>



                                    </div>

                                    <!-- Tombol action di bawah (opsional) -->
                                    <div class="card-footer bg-transparent border-0 text-center pt-0">
                                        <a href="{{ route('dashboard.surat') }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>














                        </div>
                    </div>
                @endif








            </div>

        </div>
    @endsection

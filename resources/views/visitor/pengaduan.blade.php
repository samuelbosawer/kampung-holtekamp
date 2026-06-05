<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPEL DESA | Kampung Holtekamp</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        :root {
            --primary: #918c00;
            --primary-dark: #666436;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Public Sans', sans-serif;
            scroll-behavior: smooth;
            color: #444;
        }

        /* --- NAVBAR --- */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            sticky-top;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-link {
            font-weight: 600;
            color: #555 !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary) !important;
        }

        /* --- HERO --- */
        .carousel-item {
            height: 85vh;
            min-height: 500px;
        }

        .btn-custom {
            background: var(--primary);
            color: white;
            border-radius: 50px;
            padding: 12px 30px;
            border: none;
            font-weight: 600;
        }

        .btn-custom:hover {
            background: var(--primary-dark);
            color: white;
        }

        /* --- SECTIONS --- */
        section {
            padding: 100px 0;
        }

        .section-title h2 {
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            display: block;
            width: 50px;
            height: 3px;
            background: var(--primary);
            bottom: 0;
            left: 0;
        }

        .section-title.text-center h2::after {
            left: 50%;
            transform: translateX(-50%);
        }

        /* --- PENGUMUMAN SLIDER --- */
        .card-announcement {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .card-announcement img {
            height: 220px;
            object-fit: cover;
        }

        /* --- LAYANAN --- */
        .icon-box {
            padding: 30px;
            border-radius: 15px;
            background: #fff;
            border: 1px solid #eee;
            transition: 0.3s;
            height: 100%;
        }

        .icon-box:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .icon-box i {
            font-size: 35px;
            color: var(--primary);
            margin-bottom: 15px;
            display: block;
        }

        /* --- KONTAK (NEW DESIGN) --- */
        .contact-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .info-item i {
            font-size: 24px;
            color: #fff;
            background: var(--primary);
            padding: 12px;
            border-radius: 12px;
            margin-right: 20px;
        }

        .info-item h5 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .map-container {
            min-height: 400px;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        footer {
            background: #1a1a1a;
            color: #ccc;
            padding: 30px 0;
        }


        /* Underline dekoratif di bawah judul section */
        .title-underline {
            width: 50px;
            height: 3px;
            background-color: var(--primary);
        }

        /* Tombol CTA pada setiap kartu */
        .btn-layanan {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 8px 18px;
            border: 1.5px solid var(--primary);
            border-radius: 6px;
            color: var(--primary);
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }

        .btn-layanan:hover {
            background-color: var(--primary);
            color: #fff;
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#mainNav">
    @include('sweetalert::alert')

    <nav id="mainNav" class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="me-2" width="40">
                <span class="fw-bold" style="color: var(--primary);">SIMPEL DESA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#pengumuman">Pengumuman</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('pengaduan') }}">Pengaduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#review">Saran</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#kontak">Kontak</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    @endauth
                    <li class="nav-item ms-lg-3">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-4"
                                    onclick="return confirm('Anda yakin ingin keluar?');">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-custom btn-sm rounded-pill px-4">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="pengaduan" class="bg-white">
        <div class="container">

            {{-- Header Section --}}
            <div class="section-title text-center mb-5">
                <h6 class="text-uppercase fw-bold" style="color: var(--primary);">Suara Warga</h6>
                <h2>Form Pengaduan</h2>
                <p class="text-muted">
                    Sampaikan keluhan, aspirasi, atau laporan Anda kepada pihak kampung.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">

                    {{-- Info Note --}}
                    <div class="alert border-0 mb-4"
                        style="background: #f5f4e0; border-left: 4px solid var(--primary) !important; border-radius: 10px;">
                        <div class="d-flex gap-2 align-items-start">
                            <i class='bx bx-info-circle fs-5 mt-1' style="color: var(--primary);"></i>
                            <div class="small text-muted">
                                <strong style="color: var(--primary);">Perhatian:</strong>
                                Pastikan data yang Anda isi sudah benar. Pengaduan akan ditangani oleh petugas
                                Kampung Holtekamp dalam <strong>1–3 hari kerja</strong>.
                            </div>
                        </div>
                    </div>

                    {{-- Form Card --}}
                    <div class="card border-0 shadow-sm" style="border-radius: 20px; border: 1px solid #f0f0f0 !important;">
                        <div class="card-body p-4 p-md-5">

                            <form action="{{ route('pengaduan.submit') }}" method="POST">
                                @csrf

                                {{-- Nama --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        <i class='bx bx-user me-1' style="color: var(--primary);"></i>
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="nama"
                                        class="form-control form-control-lg rounded-3 @error('nama') is-invalid @enderror"
                                        placeholder="Masukkan nama lengkap Anda"
                                        value="{{ old('nama') }}"
                                        required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        <i class='bx bx-envelope me-1' style="color: var(--primary);"></i>
                                        Alamat Email <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                                        placeholder="contoh@email.com"
                                        value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Nomor HP --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        <i class='bx bx-phone me-1' style="color: var(--primary);"></i>
                                        Nomor HP / WhatsApp <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="tel"
                                        name="nomor_hp"
                                        class="form-control form-control-lg rounded-3 @error('nomor_hp') is-invalid @enderror"
                                        placeholder="08xx-xxxx-xxxx"
                                        value="{{ old('nomor_hp') }}"
                                        required>
                                    @error('nomor_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Pesan / Pengaduan --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        <i class='bx bx-message-dots me-1' style="color: var(--primary);"></i>
                                        Pesan / Pengaduan <span class="text-danger">*</span>
                                    </label>
                                    <textarea
                                        name="pesan"
                                        rows="5"
                                        class="form-control rounded-3 @error('pesan') is-invalid @enderror"
                                        placeholder="Tulis pengaduan atau aspirasi Anda secara jelas dan terperinci..."
                                        required>{{ old('pesan') }}</textarea>
                                    @error('pesan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Submit --}}
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-custom btn-lg rounded-pill shadow-sm">
                                        <i class='bx bx-send me-2'></i> Kirim Pengaduan
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                    {{-- End Form Card --}}

                </div>
            </div>
        </div>
    </section>>

    <footer class="text-center">
        <div class="container">
            <img src="{{ asset('assets/img/logo.png') }}" width="30" class="mb-3 opacity-50">
            <p class="mb-0 small">&copy; 2026 SIMPEL DESA - Kampung Holtekamp. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    </script>
</body>

</html>

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

    {{-- resources/views/prosedur.blade.php --}}
<section id="prosedur" class="bg-white py-5">
  <div class="container">

    <div class="section-title text-center mb-5">
      <h6 class="text-uppercase fw-bold" style="color: var(--primary);">Alur Pelayanan Digital</h6>
      <h2>Prosedur Layanan Surat</h2>
      <p class="text-muted">Pengajuan surat kependudukan secara online, cepat, dan transparan</p>
    </div>

    {{-- 5 Steps --}}
    <div class="row g-0 justify-content-center align-items-start position-relative mb-5" id="steps-row">
      {{-- Garis konektor antar step --}}
      <style>
        .step-card { flex: 1; text-align: center; position: relative; z-index: 1; }
        .step-card:not(:last-child)::after {
          content: '';
          position: absolute;
          top: 36px; right: -16px;
          width: 32px; height: 2px;
          background: var(--primary); z-index: 0;
        }
        .step-card:not(:last-child)::before {
          content: '';
          position: absolute;
          top: 30px; right: -18px;
          border-top: 7px solid transparent;
          border-bottom: 7px solid transparent;
          border-left: 10px solid var(--primary);
          z-index: 2;
        }
        .step-icon {
          width: 72px; height: 72px; border-radius: 50%;
          background: #fff; border: 2px solid var(--primary);
          display: flex; align-items: center; justify-content: center;
          font-size: 28px; color: var(--primary-dark);
          margin: 0 auto 14px; position: relative;
          transition: transform 0.2s;
        }
        .step-icon:hover { transform: translateY(-4px); background: #f5f4e0; }
        .step-num {
          position: absolute; top: -4px; right: -4px;
          width: 20px; height: 20px;
          background: var(--primary); color: #fff;
          border-radius: 50%; font-size: 10px; font-weight: 700;
          display: flex; align-items: center; justify-content: center;
          border: 2px solid #fff;
        }
      </style>

      @php
        $steps = [
          ['icon' => 'bx-laptop',       'num' => 1, 'title' => 'Warga Ajukan Permohonan',       'desc' => 'Login & isi form pengajuan surat secara online'],
          ['icon' => 'bx-home-check',   'num' => 2, 'title' => 'RT/RW Validasi Data Warga',     'desc' => 'Ketua RT & RW memeriksa dan memverifikasi data pemohon'],
          ['icon' => 'bx-user-check',   'num' => 3, 'title' => 'Kepala Kampung Validasi Surat', 'desc' => 'Kepala Kampung meninjau dan menyetujui surat'],
          ['icon' => 'bx-medal',        'num' => 4, 'title' => 'Sistem Menerbitkan Surat',      'desc' => 'Surat digital diterbitkan otomatis oleh sistem'],
          ['icon' => 'bx-printer',      'num' => 5, 'title' => 'Warga Download & Cetak',        'desc' => 'Unduh PDF dan cetak secara mandiri'],
        ];
      @endphp

      @foreach ($steps as $s)
        <div class="step-card col px-2">
          <div class="step-icon">
            <span class="step-num">{{ $s['num'] }}</span>
            <i class="bx {{ $s['icon'] }}"></i>
          </div>
          <p class="fw-bold mb-1" style="font-size: 0.8rem; max-width: 110px; margin: 0 auto;">{{ $s['title'] }}</p>
          <p class="text-muted" style="font-size: 0.72rem; max-width: 110px; margin: 0 auto;">{{ $s['desc'] }}</p>

          @if ($s['num'] === 3)
            <div class="d-flex flex-wrap justify-content-center gap-1 mt-2" style="max-width: 110px; margin: 0 auto;">
              <span class="badge rounded-pill text-bg-warning" style="font-size: 9px;">Menunggu RW</span>
              <span class="badge rounded-pill text-bg-info"    style="font-size: 9px;">Diproses RW</span>
              <span class="badge rounded-pill text-bg-success" style="font-size: 9px;">Validasi Kampung</span>
              <span class="badge rounded-pill text-bg-secondary" style="font-size: 9px;">Selesai</span>
            </div>
          @endif
        </div>
      @endforeach
    </div>

    {{-- Info Bar --}}
    <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 p-4 rounded-4 mb-5"
         style="background: #f5f4e0; border: 1px solid #d9d600;">
      @foreach ([['bx bx-time-five', '15–60 Menit'], ['bx bx-show', 'Transparan'], ['bx bx-bolt-circle', 'Efisien'], ['bx bx-mobile-alt', 'Modern']] as $inf)
        <div class="d-flex align-items-center gap-2 fw-semibold" style="color: var(--primary-dark); font-size: 0.85rem;">
          <i class="{{ $inf[0] }} fs-5" style="color: var(--primary);"></i>
          {{ $inf[1] }}
        </div>
      @endforeach
    </div>

    {{-- Dokumen yang Diperlukan --}}
    <h6 class="text-uppercase fw-bold text-center mb-3" style="color: var(--primary); letter-spacing: 1.5px; font-size: 0.75rem;">
      Dokumen yang Diperlukan
    </h6>
    <div class="row g-2 justify-content-center">
      @foreach ([
        ['bx-id-card','KTP / NIK'],
        ['bx-book','Kartu Keluarga'],
        ['bx-file','Surat Pengantar RT'],
        ['bx-image','Pas Foto 3×4'],
        ['bx-edit','Formulir Permohonan'],
        ['bx-clipboard','Dokumen Pendukung'],
      ] as $d)
        <div class="col-lg-2 col-md-4 col-6">
          <div class="d-flex align-items-center gap-2 p-2 rounded-3 border" style="font-size: 0.78rem; font-weight: 500; transition: 0.2s;"
               onmouseover="this.style.borderColor='var(--primary)';this.style.background='#f5f4e0'"
               onmouseout="this.style.borderColor='';this.style.background=''">
            <i class="bx {{ $d[0] }} fs-5" style="color: var(--primary);"></i>
            {{ $d[1] }}
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

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

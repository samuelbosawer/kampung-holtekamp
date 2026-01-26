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
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#mainNav">

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
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pengumuman">Pengumuman</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#review">Saran</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    @endauth
                    <li class="nav-item ms-lg-3">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit"
                                    class="btn btn-outline-danger btn-sm rounded-pill px-4"  onclick="return confirm('Anda yakin ingin keluar?');">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-custom btn-sm rounded-pill px-4">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="beranda" class="p-0">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/img/bg.png'); background-size: cover; background-position: center;">
                    <div class="container h-100 d-flex align-items-center text-white">
                        <div>
                            <h1 class="display-3 fw-bold mb-3">Kampung Holtekamp</h1>
                            <p class="fs-5 mb-4 opacity-75">Sistem Manajemen Pelayanan Desa yang transparan, efisien,
                                dan modern <br> untuk masyarakat Muara Tami.</p>
                            <a href="#layanan" class="btn btn-custom">Mulai Layanan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/img/profile.jpg') }}" class="img-fluid rounded-4 shadow-lg"
                        alt="Tentang">
                </div>
                <div class="col-lg-6">
                    <div class="section-title">
                        <h6 class="text-uppercase fw-bold" style="color: var(--primary);">Profil Desa</h6>
                        <h2>Mengenal Lebih Dekat <br> Kampung Holtekamp</h2>
                    </div>
                    <p>Terletak di Distrik Muara Tami, Kota Jayapura, Kampung Holtekamp memiliki luas wilayah 18,73 km²
                        dengan jumlah penduduk mencapai 1.668 jiwa. Wilayah ini berkembang pesat sebagai pusat aktivitas
                        kependudukan yang dinamis.</p>
                    <div class="row g-4 mt-2">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-3 border rounded-3">
                                <i class='bx bx-group fs-2 me-3 text-primary'></i>
                                <div>
                                    <h4 class="mb-0 fw-bold">{{ $warga }}</h4><small class="text-muted">Total
                                        Penduduk</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-3 border rounded-3">
                                <i class='bx bx-map-alt fs-2 me-3 text-primary'></i>
                                <div>
                                    <h4 class="mb-0 fw-bold">18,73</h4><small class="text-muted">Luas Wilayah
                                        (km²)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pengumuman" class="bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h6 class="text-uppercase fw-bold" style="color: var(--primary);">Update Terkini</h6>
                <h2>Pengumuman Kampung</h2>
            </div>
            <div class="swiper mySwiper pb-5">
                <div class="swiper-wrapper">
                    @foreach ($pengumuman as $p)
                        <div class="swiper-slide">
                            <div class="card card-announcement">




                                @if ($p->cover && file_exists(public_path($p->cover)))
                                    <img src="{{ asset($p->cover) }}" alt="Cover" class="card-img-top">
                                @else
                                    <img src="https://placehold.co/100x100/EEE/999?text=No+Image" alt="No Image"
                                        class="card-img-top">
                                @endif


                                <div class="card-body p-4">
                                    <h5 class="fw-bold">{{ $p->judul }}</h5>
                                    <p class="text-muted small"> {{ $p->isi_pengumuman }} </p>
                                    <hr>
                                    <small class="text-muted"><i class='bx bx-calendar me-1'></i>
                                        {{ \Carbon\Carbon::parse($p->tanggal)->translatedFormat('d F Y') }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach




                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section id="layanan">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h6 class="text-uppercase fw-bold" style="color: var(--primary);">Fitur Utama</h6>
                <h2>Layanan Masyarakat</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <i class='bx bx-data'></i>
                        <h5>Rekap Data Penduduk</h5>
                        <p class="text-muted small">Penyediaan data kependudukan yang akurat dan terupdate untuk warga.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <i class='bx bx-file-blank'></i>
                        <h5>Surat Kependudukan</h5>
                        <p class="text-muted small">Penanganan surat-surat administrasi dasar yang umum diajukan warga.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <i class='bx bx-check-double'></i>
                        <h5>Validasi Berjenjang</h5>
                        <p class="text-muted small">Validasi langsung dari Kepala Kampung dan Ketua RT setempat.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <i class='bx bx-bolt-circle'></i>
                        <h5>Penyederhanaan Pelayanan</h5>
                        <p class="text-muted small">Memangkas birokrasi lama menjadi sistem digital yang lebih cepat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <i class='bx bx-info-square'></i>
                        <h5>Informasi Publik</h5>
                        <p class="text-muted small">Akses data dan informasi kependudukan secara terbuka dan mandiri.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <i class='bx bx-news'></i>
                        <h5>Pusat Pengumuman</h5>
                        <p class="text-muted small">Penyebaran informasi pelayanan desa secara real-time kepada warga.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <section id="review" class="bg-white">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--primary);">Suara Warga</h6>
            <h2>Kritik & Saran</h2>
            <p class="text-muted">Partisipasi Anda membantu kami meningkatkan kualitas pelayanan kampung.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                @auth
                <div class="card border-0 shadow-sm" style="border-radius: 20px; border: 1px solid #f0f0f0 !important;">
                    <div class="card-body p-4 p-md-5">
                        
                        {{-- FORM OPEN --}}
                        @if (Request::segment(4) == 'ubah')
                            <form action="{{ route('dashboard.review.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                        @elseif (Request::segment(3) == 'tambah' || Request::segment(1) == '')
                            <form action="{{ route('dashboard.review.store') }}" method="POST">
                                @csrf
                        @else
                            <form>
                        @endif

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

                            <p class="fw-bold mb-4"><i class='bx bx-edit-alt me-2 text-primary'></i>Berikan penilaian sesuai pengalaman Anda:</p>

                            {{-- TABEL PERTANYAAN --}}
                            <div class="table-responsive mb-2">
                                <table class="table table-bordered text-center align-middle">
                                    <thead class="table-primary text-white" style="background-color: var(--primary) !important;">
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th class="text-start">Pernyataan</th>
                                            <th style="width: 80px;">STS (1)</th>
                                            <th style="width: 80px;">TS (2)</th>
                                            <th style="width: 80px;">N (3)</th>
                                            <th style="width: 80px;">S (4)</th>
                                            <th style="width: 80px;">SS (5)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- PERTANYAAN 1 --}}
                                        <tr>
                                            <td>1</td>
                                            <td class="text-start small">Sistem ini membantu mempermudah pengurusan surat saya</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td>
                                                    <input type="radio" name="q1" value="{{ $i }}" {{ old('q1', $data->q1 ?? '') == $i ? 'checked' : '' }} @if (Request::segment(3) == 'detail') disabled @endif>
                                                </td>
                                            @endfor
                                        </tr>
                                        @error('q1') <tr><td colspan="7" class="text-danger text-start small border-0 py-1"><i class='bx bx-error-circle'></i> Mohon isi penilaian untuk poin nomor 1</td></tr> @enderror

                                        {{-- PERTANYAAN 2 --}}
                                        <tr>
                                            <td>2</td>
                                            <td class="text-start small">Sistem sesuai dengan kebutuhan pelayanan kampung</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td>
                                                    <input type="radio" name="q2" value="{{ $i }}" {{ old('q2', $data->q2 ?? '') == $i ? 'checked' : '' }} @if (Request::segment(3) == 'detail') disabled @endif>
                                                </td>
                                            @endfor
                                        </tr>
                                        @error('q2') <tr><td colspan="7" class="text-danger text-start small border-0 py-1"><i class='bx bx-error-circle'></i> Mohon isi penilaian untuk poin nomor 2</td></tr> @enderror

                                        {{-- PERTANYAAN 3 --}}
                                        <tr>
                                            <td>3</td>
                                            <td class="text-start small">Bahasa dan istilah mudah dipahami</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td>
                                                    <input type="radio" name="q3" value="{{ $i }}" {{ old('q3', $data->q3 ?? '') == $i ? 'checked' : '' }} @if (Request::segment(3) == 'detail') disabled @endif>
                                                </td>
                                            @endfor
                                        </tr>
                                        @error('q3') <tr><td colspan="7" class="text-danger text-start small border-0 py-1"><i class='bx bx-error-circle'></i> Mohon isi penilaian untuk poin nomor 3</td></tr> @enderror
                                    </tbody>
                                </table>
                            </div>

                            <div class="row g-3">
                                {{-- KATEGORI --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">KATEGORI PENILAIAN</label>
                                    <select name="kategori" class="form-select bg-light border-0 @error('kategori') is-invalid @enderror" @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach (['Sistem', 'Pelayanan', 'Petugas'] as $kat)
                                            <option value="{{ $kat }}" {{ old('kategori', $data->kategori ?? '') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                                </div>

                                {{-- NILAI --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">TINGKAT KEPUASAN</label>
                                    <select name="nilai" class="form-select bg-light border-0 @error('nilai') is-invalid @enderror" @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option value="">-- Pilih Nilai --</option>
                                        @foreach (['Sangat Baik', 'Baik', 'Cukup', 'Kurang'] as $n)
                                            <option value="{{ $n }}" {{ old('nilai', $data->nilai ?? '') == $n ? 'selected' : '' }}>{{ $n }}</option>
                                        @endforeach
                                    </select>
                                    @error('nilai') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                                </div>

                                {{-- KRITIK & SARAN --}}
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-bold small">MASUKAN / KRITIK / SARAN</label>
                                    <textarea name="review" rows="4" class="form-control bg-light border-0 @error('review') is-invalid @enderror" placeholder="Tulis masukan Anda secara mendetail..." @if (Request::segment(3) == 'detail') disabled @endif>{{ old('review', $data->review ?? '') }}</textarea>
                                    @error('review') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                                </div>

                                {{-- BUTTON GROUP --}}
                                <div class="col-md-12 text-end">
                                    @if (Request::segment(3) == 'detail')
                                        <a href="{{ route('dashboard.review.ubah', $data->id) }}" class="btn btn-warning px-4 rounded-pill text-white shadow-sm">
                                            <i class="bx bx-pencil me-1"></i> UBAH DATA
                                        </a>
                                    @else
                                        <button type="submit" class="btn btn-custom px-5 rounded-pill shadow-sm">
                                            SIMPAN PENILAIAN <i class="bx bx-save ms-1"></i>
                                        </button>
                                    @endif

                                    <a href="{{ route('dashboard.review') }}" class="btn btn-light px-4 rounded-pill border ms-2 shadow-sm">KEMBALI</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
</section>

    <section id="kontak" class="bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h6 class="text-uppercase fw-bold" style="color: var(--primary);">Hubungi Kami</h6>
                <h2>Pusat Informasi Desa</h2>
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5">
                    <div class="contact-card p-5 h-100">
                        <div class="info-item">
                            <i class='bx bx-map'></i>
                            <div>
                                <h5>Kantor Kampung</h5>
                                <p class="text-muted mb-0">Jl. Utama Holtekamp, Distrik Muara Tami, Kota Jayapura,
                                    Papua.</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class='bx bx-time-five'></i>
                            <div>
                                <h5>Jam Pelayanan</h5>
                                <p class="text-muted mb-0">Senin - Jumat: 08:00 - 15:00 WIT</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class='bx bx-phone-call'></i>
                            <div>
                                <h5>Telepon / WA</h5>
                                <p class="text-muted mb-0">+62 812-3456-7890</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class='bx bx-envelope'></i>
                            <div>
                                <h5>Email Resmi</h5>
                                <p class="text-muted mb-0">info@holtekamp.go.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="map-container h-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31899.78201552552!2d140.7937905!3d-2.6146194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686cf13774883907%3A0x867499648937966b!2sHoltekamp%2C%20Muara%20Tami%2C%20Kota%20Jayapura%2C%20Papua!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
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

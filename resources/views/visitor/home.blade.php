<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SI KDRT </title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->

    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets-visitor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets-visitor/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets-visitor/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets-visitor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets-visitor/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets-visitor/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets-visitor/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: MediTrust
  * Template URL: https://bootstrapmade.com/meditrust-bootstrap-hospital-website-template/
  * Updated: Jul 04 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">


                <h1 class="sitename">SI KDRT</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="{{ route('dashboard.pengaduan.tambah') }}">Pengaduan</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                    @if (Auth::check() != null)
                        <li><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Keluar
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('daftar') }}">Daftar</a></li>
                    @endif

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            {{-- <a class="btn-getstarted" href="appointment.html">Appointment</a> --}}

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <div class="container-fluid p-0">
                <div class="hero-wrapper">
                    <div class="hero-image">
                        <img src="assets-visitor/img/health/showcase-1.webp" alt="DP3AP2KB Kabupaten Mimika"
                            class="img-fluid">
                    </div>

                    <div class="hero-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-md-10" data-aos="fade-right" data-aos-delay="100">
                                    <div class="content-box">
                                        <span class="badge-accent" data-aos="fade-up" data-aos-delay="150">DP3AP2KB
                                            Kabupaten Mimika</span>
                                        <h1 class="" data-aos="fade-up" data-aos-delay="200">Sistem Pendukung
                                            Keputusan <br>Penanganan Kasus Kekerasan Dalam Rumah Tangga </h1>
                                        {{-- <p data-aos="fade-up" data-aos-delay="250">Penanganan Kasus Kekerasan Dalam Rumah Tangga</p> --}}

                                        <div class="cta-group" data-aos="fade-up" data-aos-delay="300">

                                              @if (Auth::check() != null)
                                                    <a href="{{ route('dashboard.home') }}" class="btn btn-primary">Dashboard</a>
                                              @else
                                                      <a href="{{ route('daftar') }}" class="btn btn-primary">Daftar Akun</a>
                                              @endif
                                          
                                            <a href="{{ route('dashboard.pengaduan.tambah') }}"
                                                class="btn btn-outline">Buat Pengaduan</a>
                                        </div>

                                        <div class="info-badges" data-aos="fade-up" data-aos-delay="350">
                                            <div class="badge-item">
                                                <i class="bi bi-telephone-fill"></i>
                                                <div class="badge-content">
                                                    <span>Nomor Telepon</span>
                                                    <strong>+62 821 9988 9821</strong>
                                                </div>
                                            </div>
                                            <div class="badge-item">
                                                <i class="bi bi-clock-fill"></i>
                                                <div class="badge-content">
                                                    <span>Jam Kerja</span>
                                                    <strong>Senin-Jumat: 08:00-18:00</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="features-wrapper">
                                <div class="row gy-4">

                                    <div class="col-lg-4">
                                        <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                                            <div class="feature-icon">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                            <div class="feature-text">
                                                <h3>Petugas Profesional</h3>
                                                <p>Mendukung kinerja petugas melalui sistem yang terarah dan berbasis
                                                    data</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                                            <div class="feature-icon">
                                                <i class="bi bi-pc-display"></i>
                                            </div>
                                            <div class="feature-text">
                                                <h3>Pendampingan Cepat</h3>
                                                <p>Mempercepat proses penanganan agar korban segera mendapatkan bantuan.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="feature-item" data-aos="fade-up" data-aos-delay="550">
                                            <div class="feature-icon">
                                                <i class="bi bi-file-bar-graph-fill"></i>
                                            </div>
                                            <div class="feature-text">
                                                <h3>Pelayanan Terpadu</h3>
                                                <p>Mengintegrasikan berbagai layanan dalam satu sistem yang saling
                                                    terhubung.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Home About Section -->
        <section id="tentang" class="home-about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="about-image">
                            <img src="assets-visitor/img/health/facilities-1.webp" alt="Modern Healthcare Facility"
                                class="img-fluid rounded-3 mb-2">
                            {{-- <div class="experience-badge">
                <span class="years">25+</span>
                <span class="text">Years of Excellence</span>
              </div> --}}
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-content">
                            <h2>Sistem Pendukung Keputusan
                                Penanganan Kasus Kekerasan Dalam Rumah Tangga</h2>
                            {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p> --}}

                            <p style="text-align: justify">Sistem Pendukung Keputusan Penanganan Kasus Kekerasan Dalam
                                Rumah Tangga adalah sistem berbasis teknologi yang membantu petugas dalam menilai,
                                menganalisis, dan menentukan prioritas penanganan kasus KDRT secara objektif, cepat, dan
                                terstruktur guna meningkatkan perlindungan serta keselamatan korban.</p>

                            <div class="row g-4 mt-4">
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                                    <div class="feature-item text-center">
                                        <div class="icon">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <h4>Petugas Profesional</h4>
                                    </div>
                                </div>

                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
                                    <div class="feature-item text-center">
                                        <div class="icon">
                                            <i class="bi bi-pc-display"></i>
                                        </div>
                                        <h4>Pendampingan Cepat</h4>
                                    </div>
                                </div>


                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
                                    <div class="feature-item text-center">
                                        <div class="icon">
                                            <i class="bi bi-file-bar-graph-fill"></i>
                                        </div>
                                        <h4>Pelayanan Terpadu</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="cta-wrapper mt-4">

                                  @if (Auth::check() != null)
                                        <a href="{{ route('dashboard.home') }}" class="btn btn-primary">Dashboard</a>
                                  @else
                                        <a href="{{ route('daftar') }}" class="btn btn-primary">Daftar Akun</a>
                                  @endif
                                <a href="{{ route('dashboard.pengaduan.tambah') }}" class="btn btn-outline">Laporkan
                                    Pengaduan</a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </section><!-- /Home About Section -->



        <!-- Call To Action Section -->
        <section id="layanan" class="call-to-action section" style="background-color: gray">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="fw-bolder" data-aos="fade-up" data-aos-delay="200">Layanan</h2>
                        <p data-aos="fade-up" data-aos-delay="250">Kami menyediakan layanan pelaporan dan pengaduan
                            kekerasan terhadap perempuan dan anak yang mudah diakses, aman, dan terpercaya untuk
                            mendukung penanganan kasus secara cepat dan tepat.</p>

                    </div>
                </div>

                <div class="row features-row" data-aos="fade-up" data-aos-delay="400">

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card">
                            <div class="icon-wrapper">
                                <i class="bi bi-megaphone"></i>
                            </div>
                            <h5>Layanan Pengaduan</h5>
                            <p>Menyediakan layanan pelaporan dan pengaduan kekerasan terhadap perempuan dan anak secara
                                aman, mudah, dan terpercaya.</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card">
                            <div class="icon-wrapper">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h5>Layanan Pendampingan</h5>
                            <p>Memberikan pendampingan cepat dan berkelanjutan bagi korban melalui dukungan psikologis,
                                hukum, dan sosial.</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card">
                            <div class="icon-wrapper">
                                <i class="bi bi-diagram-3-fill"></i>
                            </div>
                            <h5>Pengambilan Keputusan</h5>
                            <p>Mendukung petugas dalam menentukan prioritas penanganan kasus secara objektif dan
                                berbasis data.</p>

                        </div>
                    </div>
                </div>
                <div class="emergency-alert" data-aos="zoom-in" data-aos-delay="500">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="emergency-content">
                                <div class="emergency-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="emergency-text">
                                    <h4>Butuh Bantuan Segera?</h4>
                                    <p>Hubungi layanan pengaduan KDRT untuk mendapatkan bantuan dan penanganan cepat</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-end">
                            <a href="tel:+6282199889821" class="emergency-btn">
                                <i class="bi bi-telephone-fill"></i>
                                Call +62 821 9988 9821
                            </a>
                        </div>
                    </div>
                </div>


            </div>

        </section><!-- /Call To Action Section -->

        <!-- Emergency Info Section -->
        <section id="kontak" class="emergency-info section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak</h2>
                <p>Jika Anda memerlukan informasi lebih lanjut, bantuan, atau ingin menyampaikan pengaduan, <br> jangan
                    ragu untuk menghubungi kami. Tim kami siap membantu dan memberikan layanan terbaik secara cepat,
                    aman, dan terpercaya.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row mx-auto">
                    <div class="col-lg-12 col-md-12 mx-auto">



                        <!-- Emergency Contact Grid -->
                        <div class="row emergency-contacts" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-md-6 mb-6">
                                <div class="contact-card ">
                                    <div class="card-icon">
                                        <i class="bi bi bi-telephone"></i>
                                    </div>
                                    <div class="card-content">
                                        <h4>Telepon</h4>
                                        <p class="contact-info">
                                            <i class="bi bi-telephone"></i>
                                            <span>+62 821 9988 9821</span>
                                        </p>

                                    </div>

                                </div>
                            </div><!-- End Emergency Room Card -->


                            <div class="col-md-6 mb-6">
                                <div class="contact-card ">
                                    <div class="card-icon">
                                        <i class="bi bi-pin-map"></i>
                                    </div>
                                    <div class="card-content">
                                        <h4>Alamat</h4>
                                        <p class="contact-info">
                                            <i class="bi bi-telephone"></i>
                                            <span>Jl. Yos Sudarso, Utikini Baru, Kuala Kencana, Mimika Papua
                                                Tengah</span>
                                        </p>

                                    </div>

                                </div>
                            </div><!-- End Emergency Room Card -->





                        </div><!-- End Emergency Contacts -->



                    </div>
                </div>

            </div>

        </section><!-- /Emergency Info Section -->

    </main>

    <footer id="footer" class="footer  light-background">

        <div class="container footer-top ">
            <div class="row  d-flex align-items-center">
                <div class="col-lg-4 col-md-4 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">SI KDRT</span>
                    </a>

                    <div class="footer-contact pt-3">
                        <p>Jl. Yos Sudarso, Utikini Baru</p>
                        <p>Kuala Kencana, Mimika Papua Tengah</p>
                    </div>

                    <div class="social-links d-flex mt-4">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 footer-links mt-3">
                    <h4>Kontak</h4>
                    <ul>
                        <p class="mt-3"><strong>No Hp:</strong> <span>+62 821 9988 9821</span></p>
                        <p><strong>Email:</strong> <span>info@sikdrt.com</span></p>
                    </ul>
                </div>


                <div class="col-lg-4 col-md-4 footer-links">
                    <h4>Link Shortcut</h4>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#tentang">Tentang</a></li>

                        @if (Auth::check() != null)
                            <li>
                                <a href="{{ route('dashboard.home') }}">Dashboard</a>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('daftar') }}">Daftar Akun</a></li>
                        @endif
                        <li><a href="#">Pengaduan</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright IT SI KDRT MIMIKA </p>
        </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets-visitor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets-visitor/vendor/php-email-form/validate.js"></script>
    <script src="assets-visitor/vendor/aos/aos.js"></script>
    <script src="assets-visitor/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets-visitor/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets-visitor/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets-visitor/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets-visitor/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="assets-visitor/js/main.js"></script>

</body>

</html>

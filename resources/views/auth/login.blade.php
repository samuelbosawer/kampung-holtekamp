<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SIMPEL DESA | Sistem Manajemen Pelayanan Desa</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/pages/page-auth.css') }}" />

    <style>
        /* --- RESET & GLOBAL --- */
        body {
            background-color: #f5f5f9;
            font-family: 'Public Sans', sans-serif;
            overflow-x: hidden;
        }

        /* Mematikan Animasi sesuai request */
        * {
            animation: none !important;
            transition: none !important;
        }

        /* --- LAYOUT LOGIN MODERN --- */
        .inner {
            max-width: 1000px !important;
            display: flex;
            flex-wrap: wrap;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: 1px solid rgba(0,0,0,0.05);
        }

        /* Kolom Kiri: Pengumuman Statis */
        .auth-announcement {
            flex: 1.2;
            background: linear-gradient(135deg, rgba(145, 140, 0, 0.95) 0%, rgba(102, 100, 54, 0.95) 100%), 
                        url('assets/img/profile.jpg'); /* Ganti dengan asset('assets/img/desa-bg.jpg') */
            background-size: cover;
            background-position: center;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
        }

        .announcement-tag {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 20px;
            width: fit-content;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .announcement-title {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 15px;
        }

        .announcement-desc {
            font-size: 1rem;
            opacity: 0.9;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .announcement-date {
            font-size: 0.85rem;
            opacity: 0.7;
            display: flex;
            align-items: center;
        }

        /* Kolom Kanan: Form Login */
        .auth-form-side {
            flex: 1;
            padding: 50px;
            background: #fff;
        }

        .btn-primary {
            background-color: #918c00 !important;
            border-color: #918c00 !important;
            padding: 12px;
            font-weight: 600;
        }

        .text-primary-custom {
            color: #918c00 !important;
        }

        /* Responsif Mobile */
        @media (max-width: 992px) {
            .auth-announcement {
                display: none; /* Sembunyikan pengumuman di mobile agar ringkas */
            }
            .inner {
                max-width: 450px !important;
            }
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="inner shadow-lg">
                
                <div class="auth-announcement">
                    <div class="announcement-tag">Info Desa</div>
                    <h2 class="text-white">Digitalisasi Pelayanan <br>Kampung Holtekamp</h2>
                    <p class="announcement-desc">
                        Sistem Manajemen Pelayanan Desa (SIMPEL DESA) hadir untuk mempermudah warga dalam mengurus administrasi secara mandiri, transparan, dan efisien.
                    </p>
                    <div class="announcement-date">
                        {{-- <i class="bx bx-calendar me-2"></i> Diperbarui: 21 Januari 2026 --}}
                    </div>
                </div>

                <div class="auth-form-side">
                    <div class="text-center mb-4">
                        <img width="80" src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="mb-3">
                        <h4 class="fw-bold mb-1 text-primary-custom">SIMPEL DESA</h4>
                        <p class="text-muted small">Kampung Holtekamp</p>
                    </div>

                    <p class="mb-4 text-center">Silakan masuk untuk mengakses layanan desa.</p>

                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold text-uppercase">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email" autofocus />
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label small fw-bold text-uppercase" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label small" for="remember-me"> Ingat Saya </label>
                                </div>
                                {{-- <a href="{{ route('daftar') }}" class="small fw-bold text-primary-custom">Daftar Akun</a> --}}
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">MASUK</button>
                        </div>
                    </form>
                </div>
                </div>
        </div>
    </div>

    <script src="{{ asset('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
</body>
</html>
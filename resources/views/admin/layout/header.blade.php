<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('/assets') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title', 'Dashboard - SIMPEL DESA')</title>


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/assets/js/config.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <style>
        @charset "UTF-8";

        /* ==========================================================
   MODERN MINIMALIST GLASS THEME (No Animation)
   Colors: #918c00, #666436
   ========================================================== */

        :root {
            --primary: #918c00;
            --primary-dark: #666436;
            --primary-gradient: linear-gradient(135deg, #918c00 0%, #666436 100%);
            --glass-white: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.5);
            --body-bg: #f5f5f9;
        }

        /* --- 1. LAYOUT & BACKGROUND --- */
        body {
            background-color: var(--body-bg);
            color: #566a7f;
        }

        /* Menghilangkan efek blur background saat loading untuk performa */
        .layout-navbar-fixed .layout-page:before {
            background: rgba(245, 245, 249, 0.7) !important;
            backdrop-filter: blur(10px) !important;
        }

        /* --- 2. MODERNE NAVBAR (FLOATING) --- */
        .layout-navbar {
            background-color: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: saturate(200%) blur(10px) !important;
            -webkit-backdrop-filter: saturate(200%) blur(10px) !important;
            border: 1px solid var(--glass-border) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05) !important;
            border-radius: 12px !important;
            margin: 0.75rem 1.2rem 0 !important;
            width: calc(100% - 2.4rem) !important;
        }

        /* --- 3. SIDEBAR (FLOATING GLASS) --- */
        .bg-menu-theme {
            background-color: var(--glass-white) !important;
            backdrop-filter: blur(15px);
            border-right: 1px solid var(--glass-border) !important;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.02) !important;
        }

        /* Menu Item Active */
        .bg-menu-theme .menu-inner .menu-item.active>.menu-link {
            background: var(--primary-gradient) !important;
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(145, 140, 0, 0.25) !important;
            border-radius: 8px;
        }

        /* Sidebar Toggle Button */
        .app-brand .layout-menu-toggle {
            background-color: var(--primary) !important;
            border: 5px solid var(--body-bg) !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .app-brand .layout-menu-toggle i {
            color: #fff !important;
        }

        /* --- 4. MODERN CARDS --- */
        .card {
            background-color: #ffffff !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            border-radius: 12px !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.03) !important;
        }

        /* --- 5. BUTTONS --- */
        .btn-primary {
            background: var(--primary-gradient) !important;
            border: none !important;
            box-shadow: 0 4px 10px rgba(145, 140, 0, 0.2) !important;
        }

        .btn-primary:hover {
            filter: brightness(1.1);
            box-shadow: 0 5px 15px rgba(145, 140, 0, 0.3) !important;
        }

        /* --- 6. TABLES --- */
        .table thead th {
            background-color: rgba(70, 55, 55, 0.04) !important;
            font-weight: 700;
            border-bottom: 2px solid rgba(145, 140, 0, 0.1) !important;
        }

        .table-primary {
            --bs-table-bg: rgba(145, 140, 0, 0.05);
            color: var(--primary-dark);
        }

        /* --- 7. PAGINATION & BADGES --- */
        .page-item.active .page-link {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }

        .bg-label-primary {
            background-color: rgba(145, 140, 0, 0.1) !important;
            color: var(--primary) !important;
        }

        /* --- 8. REMOVE ALL ANIMATIONS --- */
        * {
            animation: none !important;
            /* Transisi halus tetap ada untuk kenyamanan mata */
            transition: background-color 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease !important;
        }

        /* --- 9. INPUTS (RESET TO DEFAULT) --- */
        /* Kami tidak memodifikasi .form-control agar tetap bawaan Bootstrap 5 */
        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 0.25rem rgba(145, 140, 0, 0.25) !important;
        }

        /* --- 10. SCROLLBAR --- */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #dcdce1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

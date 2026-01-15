<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('home');


       
        // require_once 'admin/dosen.php';
        require_once 'admin/alternatif.php';
        require_once 'admin/pengajuan.php';
        require_once 'admin/konversi.php';
        require_once 'admin/kriteria.php';
        require_once 'admin/pendampingan.php';
        require_once 'admin/pengaduan.php';
        require_once 'admin/petugas.php';
        require_once 'admin/rekomendasi.php';
        require_once 'admin/nilai.php';
      
    });
});

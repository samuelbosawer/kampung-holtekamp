<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('home');


       
        require_once 'admin/jenissurat.php';
        require_once 'admin/pengumuman.php';
        require_once 'admin/rt.php';
        require_once 'admin/rw.php';
        require_once 'admin/surat.php';
        require_once 'admin/warga.php';
        require_once 'admin/user.php';
        require_once 'admin/review.php';

    });
});

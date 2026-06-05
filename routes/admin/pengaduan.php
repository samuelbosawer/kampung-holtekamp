<?php

use App\Http\Controllers\Admin\PengaduanController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role.custom:admin']], function () {
    Route::controller(PengaduanController::class)->group(function () {
        Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
        Route::get('pengaduan/detail/{id}', [PengaduanController::class, 'show'])->name('pengaduan.detail');
    });
});

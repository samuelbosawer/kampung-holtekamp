<?php

use App\Http\Controllers\Admin\RekomendasiController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(RekomendasiController::class)->group(function(){
        Route::get('rekomendasi', [RekomendasiController::class, 'index'])->name('rekomendasi');
        Route::get('rekomendasi/tambah', [RekomendasiController::class, 'create'])->name('rekomendasi.tambah');
        Route::get('rekomendasi/detail/{id}', [RekomendasiController::class, 'show'])->name('rekomendasi.detail');
        Route::delete('rekomendasi/{id}', [RekomendasiController::class, 'destroy'])->name('rekomendasi.hapus');
        Route::post('rekomendasi/store', [RekomendasiController::class, 'store'])->name('rekomendasi.store');
        Route::get('rekomendasi/{id}/ubah', [RekomendasiController::class, 'edit'])->name('rekomendasi.ubah');
        Route::put('rekomendasi/{id}', [RekomendasiController::class, 'update'])->name('rekomendasi.update');
    });
});

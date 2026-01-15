<?php

use App\Http\Controllers\Admin\KonversiController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role.custom:admindinas']], function () {

    Route::controller(KonversiController::class)->group(function(){
        Route::get('konversi', [konversiController::class, 'index'])->name('konversi');
        Route::get('konversi/tambah', [konversiController::class, 'create'])->name('konversi.tambah');
        Route::get('konversi/detail/{id}', [konversiController::class, 'show'])->name('konversi.detail');
        Route::delete('konversi/{id}', [konversiController::class, 'destroy'])->name('konversi.hapus');
        Route::post('konversi/store', [konversiController::class, 'store'])->name('konversi.store');
        Route::get('konversi/{id}/ubah', [konversiController::class, 'edit'])->name('konversi.ubah');
        Route::put('konversi/{id}', [konversiController::class, 'update'])->name('konversi.update');
    });
});

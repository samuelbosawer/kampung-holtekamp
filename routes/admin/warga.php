<?php

use App\Http\Controllers\Admin\WargaController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(WargaController::class)->group(function(){
        Route::get('warga', [WargaController::class, 'index'])->name('warga');
        Route::get('warga/tambah', [WargaController::class, 'create'])->name('warga.tambah')->middleware(['auth','role.custom:rt|kepala']);;
        Route::get('warga/detail/{id}', [WargaController::class, 'show'])->name('warga.detail');
        Route::delete('warga/{id}', [WargaController::class, 'destroy'])->name('warga.hapus')->middleware(['auth','role.custom:rt|kepala']);
        Route::post('warga/store', [WargaController::class, 'store'])->name('warga.store')->middleware(['auth','role.custom:rt|kepala']);
        Route::get('warga/{id}/ubah', [WargaController::class, 'edit'])->name('warga.ubah')->middleware(['auth','role.custom:rt|kepala']);
        Route::put('warga/{id}', [WargaController::class, 'update'])->name('warga.update')->middleware(['auth','role.custom:rt|kepala']);;
    });
});

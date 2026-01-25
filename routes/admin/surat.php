<?php

use App\Http\Controllers\Admin\SuratController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(SuratController::class)->group(function(){
        Route::get('surat', [SuratController::class, 'index'])->name('surat');
        Route::get('surat/tambah', [SuratController::class, 'create'])->name('surat.tambah')->middleware(['auth','role.custom:warga']);
        Route::get('surat/detail/{id}', [SuratController::class, 'show'])->name('surat.detail');
        Route::get('surat/validasi/{id}', [SuratController::class, 'validasi'])->name('surat.validasi')->middleware(['auth','role.custom:rt|rw|kepala']);
        Route::get('surat/pdf/{id}', [SuratController::class, 'pdf'])->name('surat.pdf');
        Route::delete('surat/{id}', [SuratController::class, 'destroy'])->name('surat.hapus')->middleware(['auth','role.custom:warga']);
        Route::post('surat/store', [SuratController::class, 'store'])->name('surat.store')->middleware(['auth','role.custom:warga']);
        Route::get('surat/{id}/ubah', [SuratController::class, 'edit'])->name('surat.ubah')->middleware(['auth','role.custom:rt|rw|kepala|warga']);
        Route::put('surat/{id}', [SuratController::class, 'update'])->name('surat.update')->middleware(['auth','role.custom:rt|rw|kepala|warga']);
    });
});

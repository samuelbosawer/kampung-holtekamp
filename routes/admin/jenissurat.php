<?php

use App\Http\Controllers\Admin\JenisSuratController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(JenisSuratController::class)->group(function(){
        Route::get('jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat');
        Route::get('jenis-surat/tambah', [JenisSuratController::class, 'create'])->name('jenis-surat.tambah');
        Route::get('jenis-surat/detail/{id}', [JenisSuratController::class, 'show'])->name('jenis-surat.detail');
        Route::delete('jenis-surat/{id}', [JenisSuratController::class, 'destroy'])->name('jenis-surat.hapus');
        Route::post('jenis-surat/store', [JenisSuratController::class, 'store'])->name('jenis-surat.store');
        Route::get('jenis-surat/{id}/ubah', [JenisSuratController::class, 'edit'])->name('jenis-surat.ubah');
        Route::put('jenis-surat/{id}', [JenisSuratController::class, 'update'])->name('jenis-surat.update');
    });
});

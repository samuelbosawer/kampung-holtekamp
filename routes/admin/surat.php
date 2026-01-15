<?php

use App\Http\Controllers\Admin\SuratController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(SuratController::class)->group(function(){
        Route::get('surat', [SuratController::class, 'index'])->name('surat');
        Route::get('surat/tambah', [SuratController::class, 'create'])->name('surat.tambah');
        Route::get('surat/detail/{id}', [SuratController::class, 'show'])->name('surat.detail');
        Route::delete('surat/{id}', [SuratController::class, 'destroy'])->name('surat.hapus');
        Route::post('surat/store', [SuratController::class, 'store'])->name('surat.store');
        Route::get('surat/{id}/ubah', [SuratController::class, 'edit'])->name('surat.ubah');
        Route::put('surat/{id}', [SuratController::class, 'update'])->name('surat.update');
    });
});

<?php

use App\Http\Controllers\Admin\NilaiController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role.custom:admindinas|petugas']], function () {

    Route::controller(NilaiController::class)->group(function(){
        Route::get('nilai', [NilaiController::class, 'index'])->name('nilai');
        Route::get('nilai/tambah', [NilaiController::class, 'create'])->name('nilai.tambah');
        Route::get('nilai/detail/{id}', [NilaiController::class, 'show'])->name('nilai.detail');
        Route::delete('nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.hapus');
        Route::post('nilai/store', [NilaiController::class, 'store'])->name('nilai.store');
        Route::get('nilai/{id}/ubah', [NilaiController::class, 'edit'])->name('nilai.ubah');
        Route::put('nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
    });
});

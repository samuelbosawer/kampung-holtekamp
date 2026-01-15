<?php

use App\Http\Controllers\Admin\AlternatifController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role.custom:admindinas']], function () {

    Route::controller(AlternatifController::class)->group(function(){
        Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif');
        Route::get('alternatif/tambah', [AlternatifController::class, 'create'])->name('alternatif.tambah');
        Route::get('alternatif/detail/{id}', [AlternatifController::class, 'show'])->name('alternatif.detail');
        Route::delete('alternatif/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.hapus');
        Route::post('alternatif/store', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::get('alternatif/{id}/ubah', [AlternatifController::class, 'edit'])->name('alternatif.ubah');
        Route::put('alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
    });
});

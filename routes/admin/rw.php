<?php

use App\Http\Controllers\Admin\RwController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(RwController::class)->group(function(){
        Route::get('rw', [RwController::class, 'index'])->name('rw');
        Route::get('rw/tambah', [RwController::class, 'create'])->name('rw.tambah')->middleware(['auth','role.custom:admin']);
        Route::get('rw/detail/{id}', [RwController::class, 'show'])->name('rw.detail');
        Route::delete('rw/{id}', [RwController::class, 'destroy'])->name('rw.hapus')->middleware(['auth','role.custom:admin']);
        Route::post('rw/store', [RwController::class, 'store'])->name('rw.store')->middleware(['auth','role.custom:admin']);
        Route::get('rw/{id}/ubah', [RwController::class, 'edit'])->name('rw.ubah')->middleware(['auth','role.custom:admin']);
        Route::put('rw/{id}', [RwController::class, 'update'])->name('rw.update')->middleware(['auth','role.custom:admin']);
    });
});

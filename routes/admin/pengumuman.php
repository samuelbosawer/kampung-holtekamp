<?php

use App\Http\Controllers\Admin\PengumumanController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(PengumumanController::class)->group(function(){
        Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
        Route::get('pengumuman/tambah', [PengumumanController::class, 'create'])->name('pengumuman.tambah')->middleware(['auth','role.custom:admin|kepala']);
        Route::get('pengumuman/detail/{id}', [PengumumanController::class, 'show'])->name('pengumuman.detail');
        Route::delete('pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.hapus')->middleware(['auth','role.custom:admin|kepala']);
        Route::post('pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store')->middleware(['auth','role.custom:admin|kepala']);
        Route::get('pengumuman/{id}/ubah', [PengumumanController::class, 'edit'])->name('pengumuman.ubah')->middleware(['auth','role.custom:admin|kepala']);
        Route::put('pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update')->middleware(['auth','role.custom:admin|kepala']);
    });
});

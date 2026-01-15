<?php

use App\Http\Controllers\Admin\PetugasController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth',]], function () {

    Route::controller(PetugasController::class)->group(function(){
        Route::get('petugas', [PetugasController::class, 'index'])->name('petugas');
        Route::get('petugas/tambah', [PetugasController::class, 'create'])->name('petugas.tambah')->middleware(['auth','role.custom:admindinas']);
        Route::get('petugas/detail/{id}', [PetugasController::class, 'show'])->name('petugas.detail');
        Route::delete('petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.hapus')->middleware(['auth','role.custom:admindinas']);
        Route::post('petugas/store', [PetugasController::class, 'store'])->name('petugas.store')->middleware(['auth','role.custom:admindinas']);
        Route::get('petugas/{id}/ubah', [PetugasController::class, 'edit'])->name('petugas.ubah')->middleware(['auth','role.custom:admindinas']);
        Route::put('petugas/{id}', [PetugasController::class, 'update'])->name('petugas.update')->middleware(['auth','role.custom:admindinas']);
    });
});

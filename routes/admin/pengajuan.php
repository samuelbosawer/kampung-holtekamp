<?php

use App\Http\Controllers\Admin\PengajuanController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(PengajuanController::class)->group(function(){
        Route::get('pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::get('pengajuan/tambah/kasus/{id}', [PengajuanController::class, 'tambah'])->name('pengajuan.tambah')->middleware(['auth','role.custom:masyarakat,admindinas']);
        Route::get('pengajuan/pdf/{id}', [PengajuanController::class, 'show'])->name('pengajuan.detail');
        Route::delete('pengajuan/{id}', [PengajuanController::class, 'destroy'])->name('pengajuan.hapus')->middleware(['auth','role.custom:masyarakat,admindinas']);
        Route::post('pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store')->middleware(['auth','role.custom:masyarakat,admindinas']);
        Route::get('pengajuan/{id}/ubah', [PengajuanController::class, 'edit'])->name('pengajuan.ubah')->middleware(['auth','role.custom:masyarakat,admindinas']);
        Route::put('pengajuan/{id}', [PengajuanController::class, 'update'])->name('pengajuan.update')->middleware(['auth','role.custom:masyarakat,admindinas']);
    });
});

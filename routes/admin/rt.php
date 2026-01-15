<?php

use App\Http\Controllers\Admin\RtController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(RtController::class)->group(function(){
        Route::get('rt', [RtController::class, 'index'])->name('rt');
        Route::get('rt/tambah', [RtController::class, 'create'])->name('rt.tambah');
        Route::get('rt/detail/{id}', [RtController::class, 'show'])->name('rt.detail');
        Route::delete('rt/{id}', [RtController::class, 'destroy'])->name('rt.hapus');
        Route::post('rt/store', [RtController::class, 'store'])->name('rt.store');
        Route::get('rt/{id}/ubah', [RtController::class, 'edit'])->name('rt.ubah');
        Route::put('rt/{id}', [RtController::class, 'update'])->name('rt.update');
    });
});

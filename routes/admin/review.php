<?php

use App\Http\Controllers\Admin\ReviewController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(ReviewController::class)->group(function(){
        Route::get('review', [ReviewController::class, 'index'])->name('review');
        Route::get('review/tambah', [ReviewController::class, 'create'])->name('review.tambah');
        Route::get('review/detail/{id}', [ReviewController::class, 'show'])->name('review.detail');
        Route::get('review/validasi/{id}', [ReviewController::class, 'validasi'])->name('review.validasi');
        Route::get('review/pdf/{id}', [ReviewController::class, 'pdf'])->name('review.pdf');
        Route::delete('review/{id}', [ReviewController::class, 'destroy'])->name('review.hapus');
        Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');
        Route::get('review/{id}/ubah', [ReviewController::class, 'edit'])->name('review.ubah');
        Route::put('review/{id}', [ReviewController::class, 'update'])->name('review.update');
    });
});

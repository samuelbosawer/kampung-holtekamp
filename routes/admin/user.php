<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(UserController::class)->group(function(){
        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/tambah', [UserController::class, 'create'])->name('user.tambah');
        Route::get('user/detail/{id}', [UserController::class, 'show'])->name('user.detail');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.hapus');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('user/{id}/ubah', [UserController::class, 'edit'])->name('user.ubah');
        Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
    });
});

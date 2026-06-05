<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/daftar', [App\Http\Controllers\HomeController::class, 'daftar'])->name('daftar');
Route::post('/saran', [App\Http\Controllers\HomeController::class, 'saran'])->name('saran');
Route::get('/pengaduan', [App\Http\Controllers\HomeController::class, 'pengaduan'])->name('pengaduan');
Route::get('/prosedur', [App\Http\Controllers\HomeController::class, 'prosedur'])->name('prosedur');
Route::post('/pengaduan-submit', [App\Http\Controllers\HomeController::class, 'pengaduanSubmit'])->name('pengaduan.submit');
require_once 'admin.php';
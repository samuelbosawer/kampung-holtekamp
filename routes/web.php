<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/daftar', [App\Http\Controllers\HomeController::class, 'daftar'])->name('daftar');
Route::post('/saran', [App\Http\Controllers\HomeController::class, 'saran'])->name('saran');
require_once 'admin.php';
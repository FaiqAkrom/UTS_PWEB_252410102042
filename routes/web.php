<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


// Rute Halaman Login (Halaman Awal)
Route::get('/', [PageController::class, 'login'])->name('login');
Route::get('/login', [PageController::class, 'login']);

// Rute Halaman Dashboard (Menerima parameter 'username')
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

// Rute Halaman Pengelolaan Layanan (Menampilkan array data statis)
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');

// Rute Halaman Profile (Menerima parameter 'username')
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

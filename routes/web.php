<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\GaleriController;
use App\Models\Jurusan;
use App\Models\Galeri;
use App\Models\Pengumuman;


// Route untuk Beranda (Dinamis dengan data Jurusan)
Route::get('/', function () {
    $jurusans = Jurusan::all(); // Ambil semua data jurusan dari database admin
    return view('home', compact('jurusans'));
})->name('home');

// Route untuk Tentang Kami
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang.kami');

// TAMBAHKAN ROUTE ARTIKEL INI:
Route::get('/artikel', function () {
    return view('artikel'); // Pastikan nanti kamu punya file resources/views/artikel.blade.php
})->name('artikel');

// Rute lainnya...
Route::get('/jurusan', function () {
    return view('jurusan');
})->name('jurusan');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

// Halaman Kontak
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// Route Admin...
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Rute Admin Galeri (biasanya dibungkus middleware auth, sesuaikan dengan projectmu)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jurusan;
use App\Models\Galeri;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\JurusanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. HALAMAN PUBLIK (FRONTEND)
// ==========================================

// Route Beranda (Home) - Menampilkan Jurusan dan Galeri secara dinamis
Route::get('/', function () {
    $jurusans = Jurusan::all();
    $galeris  = Galeri::latest()->take(6)->get();
    
    return view('home', compact('jurusans', 'galeris'));
})->name('home');

// Route Halaman Galeri Publik
Route::get('/galeri', function () {
    $galeris = Galeri::latest()->get();
    return view('galeri', compact('galeris'));
})->name('galeri');

// Route Halaman Lainnya (Sesuaikan dengan file view yang ada)
Route::get('/jurusan', function () {
    $jurusans = Jurusan::all();
    return view('jurusan', compact('jurusans')); 
})->name('jurusan');

Route::get('/artikel', function () {
    return view('artikel'); 
})->name('artikel');

Route::get('/tentang-kami', function () {
    return view('tentang'); 
})->name('tentang.kami');

Route::get('/kontak', function () {
    return view('kontak'); 
})->name('kontak');


// ==========================================
// 2. HALAMAN AUTH ADMIN (LOGIN)
// ==========================================

// Rute untuk menampilkan halaman login admin yang dipanggil oleh header/frontend
Route::get('/admin/login', function () {
    return view('admin.auth.login'); // Pastikan file view ini ada (resources/views/admin/auth/login.blade.php)
})->name('admin.login');


// ==========================================
// 3. HALAMAN ADMIN (BACKEND / CRUD)
// ==========================================

Route::prefix('admin')->name('admin.')->group(function () {
    
    // Rute Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Rute Logout Admin
    Route::post('/logout', function () {
        auth()->logout();
        return redirect()->route('admin.login');
    })->name('logout');

    // Rute CRUD Galeri & Jurusan
    Route::resource('galeri', GaleriController::class);
    Route::resource('jurusan', JurusanController::class);
});
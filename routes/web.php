<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jurusan;
use App\Models\Galeri;
use App\Models\Berita; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\WebsiteRatingController; // <-- Tambahan Import Controller Feedback
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\BeritaController; 
use App\Http\Controllers\Admin\MessageController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/galeri', function () {
    $galeris = Galeri::latest()->get();
    return view('galeri', compact('galeris'));
})->name('galeri.index');

Route::get('/jurusan', function () {
    $jurusans = Jurusan::all();
    return view('jurusan', compact('jurusans')); 
})->name('jurusan');

Route::get('/berita', function () {
    $beritas = Berita::latest()->get();
    return view('berita', compact('beritas')); 
})->name('berita');

Route::get('/berita/{id}', function ($id) {
    $berita = Berita::findOrFail($id);
    return view('berita-detail', compact('berita'));
})->name('berita.detail');

Route::get('/tentang-kami', function () {
    return view('tentang'); 
})->name('tentang.kami');

Route::get('/kontak', function () {
    return view('kontak'); 
})->name('kontak');

Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');


Route::post('/rating-website', [WebsiteRatingController::class, 'store'])->name('rating.store');



Route::get('/admin/login', function () {
    return view('admin.login'); 
})->name('admin.login');

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');

    if (\Illuminate\Support\Facades\Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password yang Anda masukkan salah.',
    ])->withInput();
})->name('admin.login');



Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::post('/logout', function () {
        auth()->logout();
        return redirect()->route('admin.login');
    })->name('logout');

    Route::resource('galeri', GaleriController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('berita', BeritaController::class);

    
    Route::get('/kontak', [MessageController::class, 'index'])->name('kontak.index');
    Route::post('/kontak/{id}/reply', [MessageController::class, 'reply'])->name('kontak.reply'); 
    Route::delete('/kontak/{id}', [MessageController::class, 'destroy'])->name('kontak.destroy');
    Route::patch('/kontak/{id}/toggle-read', [MessageController::class, 'toggleRead'])->name('kontak.toggleRead');

   
    Route::get('/rating', [WebsiteRatingController::class, 'adminIndex'])->name('rating.index');
});
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Menampilkan halaman form login admin
    public function showLoginForm()
    {
        // Mengecek jika admin sudah login, langsung lempar ke dashboard
        if (Auth::guard('web')->check() || session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    // Memproses data login yang dikirim dari form
    public function login(Request $request)
    {
        // Validasi input email dan password
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Cek proses autentikasi menggunakan Auth bawaan Laravel
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect setelah sukses login ke halaman dashboard admin
            return redirect()->intended(route('admin.dashboard'))
                             ->with('success', 'Berhasil masuk ke Dashboard Admin!');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Proses logout admin
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
                         ->with('success', 'Anda telah berhasil keluar.');
    }
}
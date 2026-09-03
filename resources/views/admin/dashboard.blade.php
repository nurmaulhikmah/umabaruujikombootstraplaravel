@extends('layouts.app')

@section('title', 'Dashboard Admin - SMK Negeri 4 Bogor')

@section('content')
<!-- Hilangkan margin/padding body jika ada dari layout utama dengan override style ini -->
<div class="container-fluid position-fixed top-0 start-0 w-100 h-100 p-0 m-0 overflow-auto bg-light" style="z-index: 1050;">
    <div class="row g-0 h-100">
        
        <!-- Sidebar Kiri (Menempel Penuh ke Atas-Bawah) -->
        <div class="col-12 col-md-3 col-lg-2 text-white p-3 d-flex flex-column flex-shrink-0" style="background-color: #11326d; min-height: 100vh;">
            <!-- Logo & Nama Sekolah -->
            <div class="d-flex align-items-center gap-2 mb-4 px-2 pt-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="35" height="35" class="bg-white rounded p-1">
                <span class="fw-bold fs-6 text-white">SMK NEGERI 4 BOGOR</span>
            </div>

            <!-- Kategori Menu -->
            <div class="text-uppercase text-white-50 small px-2 mb-2 fw-semibold" style="font-size: 0.75rem;">UTAMA</div>

            <!-- Navigasi Sidebar -->
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark bg-white rounded-pill px-3 py-2 fw-semibold d-flex align-items-center gap-3 shadow-sm">
                        <i class="bi bi-house-door-fill"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white px-3 py-2 d-flex align-items-center gap-3">
                        <i class="bi bi-images"></i> Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white px-3 py-2 d-flex align-items-center gap-3">
                        <i class="bi bi-mortarboard-fill"></i> Jurusan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white px-3 py-2 d-flex align-items-center gap-3">
                        <i class="bi bi-megaphone-fill"></i> Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white px-3 py-2 d-flex align-items-center gap-3">
                        <i class="bi bi-chat-dots-fill"></i> Pesan
                    </a>
                </li>
            </ul>

            <!-- Tombol Logout di Bawah Sidebar -->
            <div class="mt-auto px-2 pt-3 border-top border-secondary">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm w-100 rounded-pill py-2">Logout</button>
                </form>
            </div>
        </div>

        <!-- Area Konten Utama Kanan -->
        <div class="col p-4 p-lg-5 overflow-auto" style="height: 100vh;">
            
            <!-- Header Sambutan & Avatar Admin -->
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h1 class="fw-bold text-dark display-6 mb-1">Beranda</h1>
                    <p class="text-muted mb-0">Selamat datang , Admin!</p>
                </div>
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center fw-bold fs-5 shadow-sm" style="width: 50px; height: 50px;">
                    A
                </div>
            </div>

            <!-- 4 Kartu Statistik -->
            <div class="row g-4 mb-5">
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <i class="bi bi-people fs-3 text-secondary mb-3"></i>
                        <h3 class="fw-bold text-dark mb-1">1.160</h3>
                        <span class="text-muted small">Total siswa</span>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <i class="bi bi-person-badge fs-3 text-success mb-3"></i>
                        <h3 class="fw-bold text-dark mb-1">54</h3>
                        <span class="text-muted small">Total guru</span>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <i class="bi bi-images fs-3 text-warning mb-3"></i>
                        <h3 class="fw-bold text-dark mb-1">6</h3>
                        <span class="text-muted small">Galeri</span>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <i class="bi bi-megaphone fs-3 mb-3" style="color: #6f42c1;"></i>
                        <h3 class="fw-bold text-dark mb-1">4</h3>
                        <span class="text-muted small">Artikel</span>
                    </div>
                </div>
            </div>

            
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
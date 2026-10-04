@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-1">Beranda</h2>
        <p class="text-secondary mb-0">Selamat datang, Admin!</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <i class="bi bi-people fs-3 text-primary mb-3"></i>
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
            <h3 class="fw-bold text-dark mb-1">{{ \App\Models\Galeri::count() }}</h3>
            <span class="text-muted small">Galeri</span>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <i class="bi bi-newspaper fs-3 text-info mb-3"></i>
            <h3 class="fw-bold mb-1">{{ \App\Models\Berita::count() }}</h3>
            <span class="text-muted small">Berita</span>
        </div>
    </div>

    
    <div class="col-sm-6 col-xl-3">
        <a href="{{ route('admin.rating.index') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white border-start border-warning border-4">
                <i class="bi bi-star-fill fs-3 text-warning mb-3"></i>
                <h3 class="fw-bold text-dark mb-1">
                    ⭐ {{ number_format(\App\Models\WebsiteRating::avg('rating') ?? 0, 1) }}
                </h3>
                <span class="text-muted small">Rating Website ({{ \App\Models\WebsiteRating::count() }} Ulasan)</span>
            </div>
        </a>
    </div>
</div>
@endsection
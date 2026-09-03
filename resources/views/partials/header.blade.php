<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm sticky-top">
    <div class="container">
        <!-- Logo & Nama Sekolah -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 45px; height: 45px; object-fit: contain;" onerror="this.style.display='none'">
            <div>
                <h6 class="fw-bold mb-0 text-dark">SMK NEGERI 4 BOGOR</h6>
                <small class="text-muted" style="font-size: 11px;">Sekolah Pusat Keunggulan</small>
            </div>
        </a>

        <!-- Tombol Toggle untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-3 fw-semibold">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-primary' : 'text-secondary' }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="#jurusan" class="nav-link text-secondary">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}#artikel" class="nav-link text-secondary">Artikel</a>
                </li>
                <li class="nav-item">
                    <a href="#galeri" class="nav-link text-secondary">Galeri</a>
                </li>
                <li class="nav-item">
                    <a href="#kontak" class="nav-link text-secondary">Kontak</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a href="{{ route('admin.login') }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background-color: #11326d;">
                        LOGIN
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background-color: #001E6B; /* Warna disamakan dengan halaman galeri */
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar d-flex flex-column justify-content-between p-4 shadow-sm">
                <div>
                    <div class="d-flex align-items-center mb-4 text-white">
                        <div>
                            <h6 class="fw-bold mb-0">SMK NEGERI 4</h6>
                            <small class="text-white-50" style="font-size: 11px;">BOGOR</small>
                        </div>
                    </div>

                    <span class="text-white-50 small text-uppercase fw-bold px-3 mb-2 d-block">Utama</span>
                    
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                                <i class="bi bi-house-door me-2"></i> Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.galeri.index') }}" class="nav-link">
                                <i class="bi bi-images me-2"></i> Galeri
                            </a>
                         </li>
                                        <li class="nav-item">
                        <a href="{{ route('admin.jurusan.index') }}" class="nav-link">
                            <i class="bi bi-grid me-2"></i> Jurusan
                        </a>
                    </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-newspaper me-2"></i> Artikel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-chat-dots me-2"></i> Pesan
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Tombol Keluar -->
                <div class="pt-3 border-top border-secondary">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100 rounded-pill py-2 fw-semibold">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Konten Utama Dashboard -->
            <div class="col-md-9 col-lg-10 p-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark">Beranda</h2>
                        <p class="text-secondary mb-0">Selamat datang, Admin!</p>
                    </div>
                    <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 45px; height: 45px;">
                        A
                    </div>
                </div>

                <!-- Card Statistik -->
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
                            <h3 class="fw-bold text-dark mb-1">0</h3>
                            <span class="text-muted small">Artikel</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
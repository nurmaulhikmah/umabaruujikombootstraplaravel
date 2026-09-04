<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #001E6B; }
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
        .galeri-img {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
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
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="bi bi-house-door me-2"></i> Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.galeri.index') }}" class="nav-link active">
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

                <!-- Tombol Keluar / Logout -->
                <div class="pt-3 border-top border-secondary">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100 rounded-pill py-2 fw-semibold">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Konten Utama Galeri -->
            <div class="col-md-9 col-lg-10 p-5">
                
               <div class="col-md-9 col-lg-10 p-5">
    <!-- Header: Judul di Kiri, Profil & Tombol Tambah di Kanan (Bertingkat ke bawah) -->
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h2 class="fw-bold text-dark mb-0">Galeri</h2>
                    </div>
                    
                    <!-- Bagian Kanan: Bungkus dengan flex-column dan align-items-end -->
                    <div class="d-flex flex-column align-items-end gap-3">
                        <!-- Profil Admin (Lingkaran Huruf A) -->
                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 45px; height: 45px;">
                            A
                        </div>
                        
                        <!-- Tombol Tambah (Otomatis turun ke bawah profil) -->
                        <a href="{{ route('admin.galeri.create') }}" class="btn text-white rounded-pill px-4 py-2 shadow-sm fw-semibold" style="background-color: #001E6B;">
                            + Tambah Galeri
                        </a>
                    </div>
                </div>

    <!-- Daftar Card Galeri... -->
                <!-- Notifikasi Berhasil (Jika Ada) -->
                @if(session('success'))
                    <div class="alert alert-success rounded-4 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Daftar Grid Galeri -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse ($galeris as $galeri)
                        <div class="col">
                            <div class="card border-0 shadow-sm rounded-4 h-100 bg-white">
                                <!-- Gambar Galeri -->
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top galeri-img" alt="{{ $galeri->judul }}">
                                
                                <div class="card-body d-flex flex-column justify-content-between p-3">
                                    <div>
                                        <h5 class="fw-bold text-dark mb-1" style="font-size: 16px;">{{ $galeri->judul }}</h5>
                                        <p class="text-muted small mb-3">{{ Str::limit($galeri->deskripsi, 60) }}</p>
                                    </div>

                                    <!-- Tombol Aksi (Edit & Hapus) -->
                                    <div class="d-flex justify-content-end align-items-center gap-2 pt-2 border-top">
                                        <!-- Tombol Edit (Ikon Pensil) -->
                                        <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Edit">
                                            <i class="bi bi-pencil-fill" style="font-size: 13px;"></i>
                                        </a>

                                        <!-- Tombol Hapus (Ikon Tong Sampah) -->
                                        <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Hapus" onclick="return confirm('Yakin ingin menghapus galeri ini?')">
                                                <i class="bi bi-trash-fill" style="font-size: 13px;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Empty State Jika Belum Ada Data -->
                        <div class="col-12 text-center py-5">
                            <div class="text-secondary mb-3" style="font-size: 50px;">
                                <i class="bi bi-images"></i>
                            </div>
                            <h5 class="fw-bold text-dark">Belum ada galeri</h5>
                            <p class="text-muted small">Silakan tambahkan galeri kegiatan baru melalui tombol di atas.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
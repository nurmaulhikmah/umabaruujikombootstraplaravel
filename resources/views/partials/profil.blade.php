<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sekolah - SMK Negeri 4 Bogor</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Header Minimalis (Logo Sekolah & Tombol Kembali ke Beranda) -->
    <nav class="bg-white border-bottom shadow-sm py-3 px-4">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo & Nama Sekolah -->
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="40" height="40">
                <div>
                    <h5 class="fw-bold mb-0" style="color: #11326d;">SMK NEGERI 4 BOGOR</h5>
                    <small class="text-muted" style="font-size: 0.75rem;">Sekolah Pusat Keunggulan</small>
                </div>
            </div>

            <!-- Tombol Kembali ke Beranda -->
            <div>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-semibold text-dark text-decoration-none d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </nav>

    <!-- Konten Utama Profil / Sambutan Kepala Sekolah -->
    <div class="container py-5">
        
        <!-- Judul Halaman -->
        <div class="mb-5">
            <h1 class="fw-bold display-5" style="color: #11326d;">Profil Sekolah</h1>
            <p class="text-muted">Mengenal lebih dekat visi, misi, dan sambutan pimpinan SMK Negeri 4 Bogor.</p>
        </div>

        <!-- Bagian Sambutan Kepala Sekolah -->
        <div class="row align-items-center mb-5 bg-white p-4 p-lg-5 rounded-4 shadow-sm">
            <div class="col-lg-4 mb-4 mb-lg-0 text-center">
                <div class="bg-light rounded-4 d-flex align-items-center justify-content-center border" style="height: 320px;">
                    <span class="text-muted small fw-semibold">[ Foto Kepala Sekolah ]</span>
                </div>
            </div>
            <div class="col-lg-8 ps-lg-5">
                <h3 class="fw-bold mb-3" style="color: #11326d;">Sambutan Kepala Sekolah</h3>
                <p class="text-secondary lh-lg mb-3">
                    Selamat datang di SMK Negeri 4 Bogor. Sebagai Sekolah Pusat Keunggulan, kami terus berinovasi dalam mencetak lulusan yang cerdas, terampil, berkarakter, dan siap menghadapi persaingan dunia kerja global.
                </p>
                <p class="text-secondary lh-lg mb-0">
                    Kami berkomitmen penuh untuk memberikan layanan pendidikan kejuruan terbaik yang selaras dengan perkembangan teknologi dan kebutuhan dunia industri saat ini (IDUKA).
                </p>
            </div>
        </div>

        <!-- Bagian Informasi Tambahan (Profil Singkat & Fasilitas) -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <h4 class="fw-bold mb-3" style="color: #11326d;">Tentang Kami</h4>
                    <p class="text-muted small lh-lg mb-0">
                        SMK Negeri 4 Bogor adalah Sekolah Menengah Kejuruan negeri unggulan di Kota Bogor yang memiliki fasilitas modern, tenaga pendidik profesional, serta lingkungan belajar yang kondusif untuk membentuk generasi kompeten di bidangnya.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <h4 class="fw-bold mb-3" style="color: #11326d;">Fasilitas Unggulan</h4>
                    <p class="text-muted small lh-lg mb-0">
                        Didukung oleh Ruang Praktik Siswa (RPS) yang representatif, laboratorium komputer mutakhir, peralatan praktik berstandar industri, serta berbagai fasilitas penunjang ekstrakurikuler yang aktif.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
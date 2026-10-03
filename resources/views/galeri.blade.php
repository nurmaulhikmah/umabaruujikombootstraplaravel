<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">SMK NEGERI 4 BOGOR</a>
            <div class="ms-auto">
                <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill px-4">Beranda</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Galeri Kegiatan</h2>
            <p class="text-muted">Momen dan aktivitas terkini siswa-siswi SMK Negeri 4 Bogor.</p>
        </div>

        <div class="row g-4">
            @forelse($galeris as $galeri)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="{{ $galeri->judul }}" style="height: 220px; object-fit: cover;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-dark">{{ $galeri->judul }}</h5>
                            <p class="text-muted small mb-0">{{ $galeri->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada galeri kegiatan yang diunggah.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
            <h2 class="fw-bold">Berita & Informasi Terbaru</h2>
            <p class="text-muted">Ikuti perkembangan dan kegiatan terbaru dari SMK Negeri 4 Bogor.</p>
        </div>

        <div class="row g-4">
            @forelse($beritas as $berita)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-newspaper display-4"></i>
                            </div>
                        @endif
                        <div class="card-body p-4 d-flex flex-column">
                            <small class="text-muted mb-2"><i class="bi bi-calendar3 me-1"></i> {{ $berita->created_at->format('d F Y') }}</small>
                            <h5 class="fw-bold text-dark mb-3">{{ $berita->judul }}</h5>
                            <p class="text-secondary small mb-4 flex-grow-1">{{ Str::limit($berita->konten, 90) }}</p>
                            <a href="{{ route('berita.detail', $berita->id) }}" class="btn btn-outline-primary rounded-pill w-100 fw-semibold">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada berita yang diterbitkan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">SMK NEGERI 4 BOGOR</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    
                    <h1 class="fw-bold text-dark mb-3">{{ $berita->judul }}</h1>
                    
                    <p class="text-muted small mb-4">
                        <i class="bi bi-calendar3 me-1"></i> {{ $berita->created_at->format('d M Y') }}
                    </p>

                    @if($berita->gambar)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded-4 w-100 shadow-sm" alt="{{ $berita->judul }}" style="max-height: 400px; object-fit: cover;">
                        </div>
                    @endif

                    <div class="text-secondary lh-lg" style="white-space: pre-line;">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <a href="{{ route('home') }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold border-0 shadow-sm" style="background-color: #001E6B;">
    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
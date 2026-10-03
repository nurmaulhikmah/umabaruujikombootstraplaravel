<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel & Berita - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    @include('partials.header')

    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #11326d;">Artikel & Berita Terbaru</h2>
            <p class="text-secondary">Seputar kegiatan, prestasi, dan informasi terkini SMK Negeri 4 Bogor.</p>
        </div>

        <div class="row g-4">
            @forelse($posts as $post)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                        @if($post->gambar)
                            <img src="{{ asset('storage/' . $post->gambar) }}" class="card-img-top" alt="{{ $post->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-newspaper display-4"></i>
                            </div>
                        @endif
                        
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="text-muted small mb-2"><i class="bi bi-calendar3 me-1"></i> {{ $post->created_at->format('d M Y') }}</span>
                            <h5 class="fw-bold text-dark mb-2">{{ $post->judul }}</h5>
                            <p class="text-secondary small mb-4 flex-grow-1">
                                {{ Str::limit(strip_tags($post->konten), 100) }}
                            </p>
                            <a href="{{ route('artikel.detail', $post->slug) }}" class="btn btn-outline-primary rounded-pill btn-sm fw-semibold w-100 mt-auto">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center rounded-4 p-4">
                        Belum ada artikel yang diterbitkan.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
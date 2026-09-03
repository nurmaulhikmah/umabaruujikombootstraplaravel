<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 4 Bogor - Sekolah Pusat Keunggulan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-white m-0 p-0">

    <!-- 1. Header & Navbar Utama -->
    @include('partials.header')

    <!-- 2. Hero Section dengan Background Foto Sekolah & Efek Biru Transparan -->
    <section class="text-white d-flex align-items-center position-relative" style="background: linear-gradient(rgba(17, 50, 109, 0.85), rgba(17, 50, 109, 0.85)), url('{{ asset('images/sekolah.jpg') }}') center/cover no-repeat; min-height: 85vh;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-9">
                    <h6 class="text-uppercase fw-semibold mb-3" style="letter-spacing: 1px; opacity: 0.9;">SMK NEGERI 4 BOGOR</h6>
                    <h1 class="fw-bold display-4 mb-4" style="line-height: 1.2;">Mengembangkan Potensi, Menciptakan Prestasi</h1>
                    <p class="fs-5 mb-5" style="max-width: 750px; opacity: 0.95;">
                        Membekali siswa dengan keterampilan dan karakter untuk siap kerja maupun melanjutkan pendidikan.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('tentang.kami') }}" class="btn btn-light text-dark px-4 py-3 rounded-pill fw-semibold shadow-sm">
                            Tentang Kami
                        </a>
                        <a href="{{ route('tentang.kami') }}" class="btn btn-outline-light px-4 py-3 rounded-pill fw-semibold">
                            Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Section Sambutan Kepala Sekolah -->
    <section class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <!-- Kolom Foto Kepala Sekolah -->
            <div class="col-lg-4 text-center">
                <div class="position-relative d-inline-block">
                    <img src="{{ asset('images/kepsek.png') }}" alt="Kepala SMK Negeri 4 Bogor" class="img-fluid rounded-4 shadow-sm w-100" style="max-height: 420px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=600'">
                </div>
            </div>

            <!-- Kolom Teks Sambutan -->
            <div class="col-lg-8">
                <h6 class="text-uppercase fw-semibold mb-2" style="color: #11326d; letter-spacing: 1px;">Sambutan Resmi</h6>
                <h2 class="fw-bold mb-4" style="color: #11326d;">Kepala SMK Negeri 4 Bogor</h2>
                <p class="text-secondary lh-lg mb-3">
                    <em>Assalamu'alaikum Warahmatullahi Wabarakatuh,</em><br>
                    Puji syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya, sehingga website resmi SMK Negeri 4 Bogor ini dapat terus hadir sebagai sarana informasi dan komunikasi bagi seluruh warga sekolah maupun masyarakat luas.
                </p>
                <p class="text-secondary lh-lg mb-4">
                    Sebagai Sekolah Menengah Kejuruan Pusat Keunggulan, kami berkomitmen untuk terus mencetak lulusan yang cerdas, terampil, berkarakter mulia, serta siap beradaptasi dengan perkembangan dunia kerja dan industri digital masa kini.
                </p>
                <div>
                    <h5 class="fw-bold text-dark mb-0">Drs. Mulya Murhadi, M.Si.</h5>
                    <p class="text-muted small">Kepala SMK Negeri 4 Bogor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Section Jurusan (Judul Tetap Ada, Isi Menyesuaikan Data Admin) -->
    <section id="jurusan" class="container my-5 py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #11326d;">Program Keahlian (Jurusan)</h2>
            <p class="text-secondary">Pilihan kompetensi keahlian unggulan di SMK Negeri 4 Bogor.</p>
        </div>

        @if(isset($jurusans) && $jurusans->count() > 0)
            <!-- Jika data jurusan ada dari admin -->
            <div class="row g-4">
                @foreach($jurusans as $jurusan)
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-4 text-center">
                        <div class="mb-3 mx-auto text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background-color: #11326d;">
                            <i class="bi {{ $jurusan->ikon ?? 'bi-mortarboard' }} fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">{{ $jurusan->kode_singkat }}</h5>
                        <p class="text-muted small mb-0">{{ $jurusan->nama_jurusan }}</p>
                        <p class="text-secondary small mt-2">{{ $jurusan->deskripsi }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Jika data jurusan kosong/belum di-input admin -->
            <div class="text-center py-4 bg-light rounded-4 border">
                <p class="text-muted mb-0"><i class="bi bi-info-circle me-2"></i>Belum ada data jurusan yang ditambahkan oleh admin.</p>
            </div>
        @endif
    </section>

    <!-- Section Artikel / Berita Terbaru -->
    <section id="artikel" class="container my-5 py-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h2 class="fw-bold" style="color: #11326d;">Artikel & Berita Terbaru</h2>
                <p class="text-secondary">Informasi seputar kegiatan, prestasi, dan perkembangan terkini di SMK Negeri 4 Bogor.</p>
            </div>
            <div class="col-md-4 text-md-end d-flex align-items-center justify-content-md-end">
                <a href="{{ route('artikel') }}" class="btn btn-outline-primary rounded-pill px-4 fw-semibold">Lihat Semua</a>
            </div>
        </div>
    </section>

    <!-- 6. Footer / Kontak -->
    <div id="kontak">
        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
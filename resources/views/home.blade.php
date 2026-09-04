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

    <!-- Section Jurusan (Dinamis dari Database) -->
<section id="jurusan" class="container my-5 py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #11326d;">Program Keahlian (Jurusan)</h2>
        <p class="text-secondary">Pilihan kompetensi keahlian unggulan di SMK Negeri 4 Bogor.</p>
    </div>

    @if(isset($jurusans) && $jurusans->count() > 0)
        <div class="row g-4">
            @foreach($jurusans as $jurusan)
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 text-center bg-white">
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
        <!-- Jika data jurusan kosong -->
        <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-light">
            <div class="py-4">
                <i class="bi bi-info-circle display-4 text-muted mb-3"></i>
                <h5 class="fw-semibold text-secondary">Belum Ada Data Jurusan</h5>
                <p class="text-muted small mb-0">Silakan tambahkan data jurusan melalui dashboard admin.</p>
            </div>
        </div>
    @endif
</section>


    <!-- Section Galeri Sekolah -->
    <section id="galeri" class="container my-5 py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #11326d;">Galeri Kegiatan Sekolah</h2>
            <p class="text-secondary">Dokumentasi aktivitas dan fasilitas di SMK Negeri 4 Bogor.</p>
        </div>

        @if(isset($galeris) && $galeris->count() > 0)
            <div class="row g-4">
                @foreach($galeris as $galeri)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="{{ $galeri->judul }}" style="height: 220px; object-fit: cover;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-dark mb-1">{{ $galeri->judul }}</h5>
                            <p class="text-secondary small mb-0">{{ $galeri->deskripsi }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-light">
                <div class="py-4">
                    <i class="bi bi-images display-4 text-muted mb-3"></i>
                    <h5 class="fw-semibold text-secondary">Belum Ada Foto Galeri</h5>
                    <p class="text-muted small mb-0">Silakan upload foto kegiatan melalui dashboard admin.</p>
                </div>
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

    <!-- Section Hubungi Kami / Kontak -->
    <section id="hubungi-kami" class="container my-5 py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #11326d;">Hubungi Kami</h2>
            <p class="text-secondary">Ada pertanyaan? Silakan hubungi kami melalui informasi di bawah.</p>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
            <div class="row g-4 mb-5">
                <!-- Kolom Informasi Kontak -->
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-geo-alt-fill fs-5 me-3 mt-1" style="color: #001E6B;"></i>
                            <span class="text-secondary">Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muarasari, Kec. Bogor Selatan, Kota Bogor, Jawa Barat 16137.</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-telephone-fill fs-5 me-3" style="color: #001E6B;"></i>
                            <span class="text-secondary">+62 821-226-2442</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-fill fs-5 me-3" style="color: #001E6B;"></i>
                            <span class="text-secondary">smkn4@smkn4bogor.sch.id</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-clock-fill fs-5 me-3" style="color: #001E6B;"></i>
                            <span class="text-secondary">Senin - Jumat, 07.00 - 15.00</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-instagram fs-5 me-3" style="color: #001E6B;"></i>
                            <span class="text-secondary">@smkn4kotabogor</span>
                        </li>
                    </ul>
                </div>

                <!-- Kolom Peta / Google Maps -->
                <div class="col-lg-6">
                    <div class="rounded-4 overflow-hidden shadow-sm h-100" style="min-height: 250px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.296767571879!2d106.8247!3d-6.6403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6bcf1356aeb64f%3A0x2fda78b9b5a0b7f8!2sSMK%20Negeri%204%20Bogor!5e0!3m2!1sid!2sid!4v1650000000000!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            <!-- Bagian Form Kirim Pesan -->
            <div class="border-top pt-4">
                <h4 class="fw-bold mb-4" style="color: #11326d;">Kirim Pesan</h4>
                <form action="#" method="POST">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="nama" class="form-label fw-semibold text-secondary small">Nama</label>
                            <input type="text" class="form-control rounded-3 bg-light border-0 py-2" id="nama" name="nama" placeholder="Masukkan nama...">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold text-secondary small">Email</label>
                            <input type="email" class="form-control rounded-3 bg-light border-0 py-2" id="email" name="email" placeholder="Masukkan email...">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="pesan" class="form-label fw-semibold text-secondary small">Tulis pesan Anda.....</label>
                        <textarea class="form-control rounded-3 bg-light border-0" id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda....."></textarea>
                    </div>
                    <button type="submit" class="btn text-white rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background-color: #001E6B;">
                        Kirim Pesan
                    </button>
                </form>
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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header & Navbar Utama -->
    @include('partials.header')

    <!-- Konten Detail Tentang Kami -->
    <div class="container py-5 flex-grow-1">
        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('home') }}" class="text-decoration-none text-secondary fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
        
        <h1 class="fw-bold mb-4" style="color: #11326d;">Profil & Perkembangan Sekolah</h1>
        
        <!-- 1. Bagian Profil Sekolah (Yang sudah ada) -->
        <div class="card border-0 shadow-sm p-4 p-md-5 mb-4 rounded-4">
            <h3 class="fw-bold mb-4" style="color: #11326d;">Tentang SMK Negeri 4 Bogor</h3>
            <p class="text-secondary lh-lg mb-3">
                SMK Negeri 4 Bogor adalah Sekolah Menengah Kejuruan Pusat Keunggulan yang berfokus pada pengembangan kompetensi siswa agar siap menghadapi dunia kerja modern dan industri kreatif. Sebagai institusi pendidikan terdepan, kami berkomitmen untuk terus membekali peserta didik tidak hanya dengan kemampuan akademis dan teknis yang mumpuni, tetapi juga etos kerja yang profesional.
            </p>
            <p class="text-secondary lh-lg mb-3">
                Dalam perjalanannya, SMK Negeri 4 Bogor terus beradaptasi dengan perkembangan teknologi digital dan kebutuhan dunia usaha serta dunia industri (DU/DI). Kurikulum yang kami terapkan dirancang secara dinamis agar selaras dengan standar kompetensi global, sehingga lulusan kami memiliki daya saing yang tinggi baik di kancah nasional maupun internasional.
            </p>
            <p class="text-secondary lh-lg mb-0">
                Didukung oleh tenaga pendidik yang profesional serta fasilitas praktik yang memadai, kami menciptakan ekosistem belajar yang kondusif, inovatif, dan berkarakter mulia.
            </p>
        </div>

        <!-- 2. Bagian Sejarah Sekolah (Baru Ditambahkan) -->
        <div class="card border-0 shadow-sm p-4 p-md-5 mb-4 rounded-4">
            <h3 class="fw-bold mb-4" style="color: #11326d;">Sejarah Singkat SMK Negeri 4 Bogor</h3>
            <p class="text-secondary lh-lg mb-3">
                SMK Negeri 4 Bogor didirikan atas dasar kebutuhan nyata akan lembaga pendidikan kejuruan yang mampu mencetak tenaga kerja terampil di wilayah Bogor dan sekitarnya. Sejak berdirinya, sekolah ini terus mengalami perkembangan yang pesat, baik dari segi penambahan fasilitas laboratorium praktik, peningkatan mutu tenaga pengajar, maupun perluasan kerja sama dengan berbagai perusahaan berskala nasional.
            </p>
            <p class="text-secondary lh-lg mb-0">
                Dengan statusnya sebagai Sekolah Menengah Kejuruan Pusat Keunggulan, SMK Negeri 4 Bogor terus berkomitmen menjadi pelopor dalam mencetak lulusan yang tidak hanya cerdas secara intelektual, tetapi juga siap terjun langsung menghadapi tantangan dunia industri modern.
            </p>
        </div>

        <!-- 3. Bagian Visi & Misi (Baru Ditambahkan) -->
        <div class="card border-0 shadow-sm p-4 p-md-5 mb-4 rounded-4">
            <h3 class="fw-bold mb-4" style="color: #11326d;">Visi & Misi</h3>
            
            <div class="mb-4">
                <h5 class="fw-bold text-dark">Visi:</h5>
                <p class="text-secondary lh-base mb-0">Menjadi institusi pendidikan kejuruan yang unggul, berkarakter, dan berwawasan global.</p>
            </div>

            <div>
                <h5 class="fw-bold text-dark">Misi:</h5>
                <ul class="text-secondary lh-lg mb-0 ps-3">
                    <li>Menyelenggarakan pembelajaran berbasis kompetensi yang selaras dengan perkembangan dunia usaha dan industri (DU/DI).</li>
                    <li>Membangun karakter peserta didik yang disiplin, jujur, kreatif, dan memiliki integritas tinggi.</li>
                    <li>Meningkatkan kualitas sarana prasarana serta mutu layanan pendidikan secara berkesinambungan.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
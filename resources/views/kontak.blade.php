<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Header & Navbar -->
    @include('partials.header')

    <!-- Konten Kontak -->
    <div class="container py-5">
        <h2 class="fw-bold mb-4" style="color: #11326d;">Hubungi Kami</h2>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-3">SMK Negeri 4 Bogor</h5>
                    <p class="text-secondary mb-2"><i class="bi bi-geo-alt-fill text-primary me-2"></i> Jl. Raya Tajur, Kp. Buntar, RT.02/RW.08, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</p>
                    <p class="text-secondary mb-2"><i class="bi bi-envelope-fill text-primary me-2"></i> info@smkn4bogor.sch.id</p>
                    <p class="text-secondary mb-0"><i class="bi bi-telephone-fill text-primary me-2"></i> (0251) 7547381</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-3">Kirim Pesan</h5>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="nama@email.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" rows="3" placeholder="Tulis pesan Anda..."></textarea>
                        </div>
                        <button type="submit" class="btn text-white px-4" style="background-color: #11326d;">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
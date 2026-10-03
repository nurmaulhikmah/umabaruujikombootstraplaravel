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


    @include('partials.header')

    <div class="container py-5">
        <h2 class="fw-bold mb-4" style="color: #11326d;">Hubungi Kami</h2>
        <p class="text-secondary mb-4">Ada pertanyaan? Silahkan hubungi kami melalui informasi di bawah atau kirimkan pesan.</p>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <h5 class="fw-bold mb-3" style="color: #11326d;">SMK Negeri 4 Bogor</h5>
                    <p class="text-secondary mb-3">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i> 
                        Jl. Raya Tajur, Kp. Buntar, RT.02/RW.08, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137
                    </p>
                    <p class="text-secondary mb-3">
                        <i class="bi bi-telephone-fill text-primary me-2"></i> 
                        +62 821-226-2442
                    </p>
                    <p class="text-secondary mb-3">
                        <i class="bi bi-envelope-fill text-primary me-2"></i> 
                        smkn4@smkn4bogor.sch.id
                    </p>
                    <p class="text-secondary mb-3">
                        <i class="bi bi-clock-fill text-primary me-2"></i> 
                        Senin - Jumat, 07.00 - 15.00
                    </p>
                    <p class="text-secondary mb-0">
                        <i class="bi bi-instagram text-primary me-2"></i> 
                        @smkn4kotabogor
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm p-0 h-100 overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2959807490214!2d106.8344583!3d-6.640733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6bcf1359d91f29%3A0x2ef2df6ff9c0fde6!2sSMK%20Negeri%204%20Bogor!5e0!3m2!1sid!2sid!4v1650000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 320px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-3" style="color: #11326d;">Kirim Pesan</h5>

                    <form action="{{ route('kontak.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama..." required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email..." required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tulis pesan Anda.....</label>
                            <textarea name="pesan" class="form-control" rows="4" placeholder="Tulis pesan Anda....." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">Kirim Pesan</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
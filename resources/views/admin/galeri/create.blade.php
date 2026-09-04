<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Galeri - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #001E6B; }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
        }
        .upload-box {
            border: 2px dashed #ced4da;
            background-color: #fdfdfd;
            border-radius: 12px;
            transition: all 0.3s;
            cursor: pointer;
        }
        .upload-box:hover {
            border-color: #001E6B;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar d-flex flex-column justify-content-between p-4 shadow-sm">
                <div>
                    <div class="d-flex align-items-center mb-4 text-white">
                        <div>
                            <h6 class="fw-bold mb-0">SMK NEGERI 4</h6>
                            <small class="text-white-50" style="font-size: 11px;">BOGOR</small>
                        </div>
                    </div>

                    <span class="text-white-50 small text-uppercase fw-bold px-3 mb-2 d-block">Utama</span>
                    
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="bi bi-house-door me-2"></i> Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.galeri.index') }}" class="nav-link active">
                                <i class="bi bi-images me-2"></i> Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-grid me-2"></i> Jurusan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-newspaper me-2"></i> Artikel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-chat-dots me-2"></i> Pesan
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Tombol Keluar / Logout (Benar) -->
                <div class="pt-3 border-top border-secondary">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100 rounded-pill py-2 fw-semibold">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Konten Utama Form Tambah -->
            <div class="col-md-9 col-lg-10 p-5">
                <!-- Header Judul & Tombol Kembali -->
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.galeri.index') }}" class="text-dark fs-4 text-decoration-none me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h2 class="fw-bold text-dark mb-0">Tambah Galeri</h2>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-4 mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Card Tambah Galeri -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Kotak Unggah Foto -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Unggah Foto</label>
                            <div class="upload-box p-5 text-center position-relative">
                                <input type="file" name="gambar" id="fileInput" class="position-absolute top-0 start-0 w-100 h-100 opacity-0" style="cursor: pointer;" required>
                                <div class="text-secondary mb-2" style="font-size: 40px;" id="uploadIcon">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                </div>
                                <p class="fw-semibold text-dark mb-1" id="uploadText">Klik untuk unggah atau seret foto ke sini</p>
                                <small class="text-muted" id="uploadSubText">Format JPG/PNG, maks 5MB</small>
                            </div>
                        </div>

                        <!-- Input Judul -->
                        <div class="mb-4">
                            <label for="judul" class="form-label fw-bold text-dark">Judul</label>
                            <input type="text" class="form-control rounded-3 py-2 bg-light border-0" id="judul" name="judul" placeholder="Masukkan judul galeri..." required>
                        </div>

                        <!-- Input Deskripsi -->
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-bold text-dark">Deskripsi</label>
                            <textarea class="form-control rounded-3 bg-light border-0" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi kegiatan..."></textarea>
                        </div>

                        <!-- Tombol Aksi (Batal & Simpan) -->
                        <div class="d-flex justify-content-end align-items-center gap-3">
                            <a href="{{ route('admin.galeri.index') }}" class="text-secondary text-decoration-none fw-semibold">Batal</a>
                            <button type="submit" class="btn text-white rounded-pill px-4 py-2" style="background-color: #001E6B;">
                                Simpan Galeri
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script buat ganti teks box kalau file sudah dipilih
        document.getElementById('fileInput').addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const fileName = e.target.files[0].name;
                document.getElementById('uploadText').textContent = "File dipilih: " + fileName;
                document.getElementById('uploadSubText').textContent = "Klik untuk mengganti foto";
                document.getElementById('uploadIcon').innerHTML = '<i class="bi bi-check-circle-fill text-success"></i>';
            }
        });
    </script>
</body>
</html>
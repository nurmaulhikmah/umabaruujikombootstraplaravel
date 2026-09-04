<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurusan - Admin SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background-color: #001E6B;
        }
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
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            background-color: #f8f9fa;
            transition: all 0.3s;
            cursor: pointer;
        }
        .upload-box:hover {
            border-color: #001E6B;
            background-color: #f1f5f9;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Admin -->
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
                            <a href="{{ route('admin.galeri.index') }}" class="nav-link">
                                <i class="bi bi-images me-2"></i> Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.jurusan.index') }}" class="nav-link active">
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

                <!-- Tombol Keluar -->
                <div class="pt-3 border-top border-secondary">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100 rounded-pill py-2 fw-semibold">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Konten Utama Tambah Jurusan -->
            <div class="col-md-9 col-lg-10 p-5">
                <!-- Header Atas: Tombol Kembali & Judul -->
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.jurusan.index') }}" class="text-dark fs-4 me-3 text-decoration-none">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h2 class="fw-bold text-dark mb-0">Tambah Jurusan</h2>
                </div>

                <!-- Card Form -->
                <div class="card border-0 shadow-sm rounded-4 p-5 bg-white">
                    <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Unggah Logo (Desain kotak interaktif persis seperti Galeri) -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary">Unggah Logo</label>
                            
                            <label for="logo" class="upload-box w-100 p-5 text-center d-flex flex-column align-items-center justify-content-center">
                                <div id="upload-content" class="d-flex flex-column align-items-center">
                                    <i class="bi bi-cloud-arrow-up display-5 text-secondary mb-2" id="upload-icon"></i>
                                    <span class="fw-semibold text-dark" id="upload-text">Klik untuk unggah atau seret logo ke sini</span>
                                    <small class="text-muted" id="upload-subtext">Format JPG/PNG, maks 5MB</small>
                                </div>
                                <!-- Input file tersembunyi yang dipicu oleh label -->
                                <input type="file" id="logo" name="logo" class="d-none" accept="image/*" required>
                            </label>
                        </div>

                        <!-- Nama Jurusan -->
                        <div class="mb-4">
                            <label for="nama_jurusan" class="form-label fw-semibold text-secondary">Nama Jurusan</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan nama jurusan..." required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-5">
                            <label for="deskripsi" class="form-label fw-semibold text-secondary">Deskripsi</label>
                            <textarea class="form-control bg-light border-0" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan deskripsi jurusan..."></textarea>
                        </div>

                        <!-- Tombol Aksi (Batal & Simpan) -->
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('admin.jurusan.index') }}" class="btn btn-light px-4 py-2 rounded-pill fw-semibold text-secondary">Batal</a>
                            <button type="submit" class="btn text-white px-5 py-2 rounded-pill fw-semibold shadow-sm" style="background-color: #001E6B;">Simpan Jurusan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script Interaktif untuk mengubah tampilan kotak saat file dipilih -->
    <script>
        const inputLogo = document.getElementById('logo');
        const uploadContent = document.getElementById('upload-content');

        inputLogo.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const fileName = e.target.files[0].name;
                uploadContent.innerHTML = `
                    <i class="bi bi-check-circle-fill display-5 text-success mb-2"></i>
                    <span class="fw-semibold text-success">File dipilih: ${fileName}</span>
                    <small class="text-muted">Klik untuk mengganti logo</small>
                `;
            }
        });
    </script>
</body>
</html>
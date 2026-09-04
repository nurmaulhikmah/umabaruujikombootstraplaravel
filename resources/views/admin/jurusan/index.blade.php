<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Jurusan - Admin SMK Negeri 4 Bogor</title>
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

            <!-- Konten Utama -->
            <div class="col-md-9 col-lg-10 p-5">
                <!-- Header Atas -->
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <h2 class="fw-bold text-dark mb-0">Manajemen Data Jurusan</h2>
                    
                    <div class="d-flex flex-column align-items-end gap-3">
                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 45px; height: 45px;">
                            A
                        </div>
                        <a href="{{ route('admin.jurusan.create') }}" class="btn text-white rounded-pill px-4 py-2 shadow-sm fw-semibold" style="background-color: #001E6B;">
                            + Tambah Jurusan
                        </a>
                    </div>
                </div>

                <!-- Tabel Data Jurusan dengan Kolom Logo -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light text-secondary">
                                <tr>
                                    <th class="py-3 px-3 rounded-start">No</th>
                                    <th class="py-3">Logo</th>
                                    <th class="py-3">Nama Jurusan</th>
                                    <th class="py-3 text-end rounded-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jurusans as $index => $jurusan)
                                <tr>
                                    <td class="px-3 fw-semibold text-secondary">{{ $index + 1 }}</td>
                                    <td>
                                        @if($jurusan->logo)
                                            <img src="{{ asset('storage/' . $jurusan->logo) }}" alt="Logo Jurusan" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary px-2 py-1">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="fw-bold text-dark">{{ $jurusan->nama_jurusan }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}" class="btn btn-warning btn-sm text-white px-3 rounded-pill fw-semibold">Edit</a>
                                            <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm px-3 rounded-pill fw-semibold">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                        Belum ada data jurusan. Silakan tambahkan melalui tombol di atas.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 m-0" style="background: linear-gradient(rgba(17, 50, 109, 0.85), rgba(17, 50, 109, 0.85)), url('{{ asset('images/sekolah.jpg') }}') center/cover no-repeat;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white">
                    
                    <div class="text-center mb-4">
                        <div class="mb-3 mx-auto text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 65px; height: 65px; background-color: #ffffff;">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 4 Bogor" style="width: 48px; height: 48px; object-fit: contain;">
                        </div>
                        <h4 class="fw-bold text-dark mb-1">Admin Login</h4>
                        <p class="text-secondary small">SMK Negeri 4 Bogor</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show small rounded-3 py-2" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill fw-semibold py-2 shadow-sm" style="background-color: #11326d; border: none;">
                            Masuk ke Dashboard <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('home') }}" class="text-decoration-none small text-muted">
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
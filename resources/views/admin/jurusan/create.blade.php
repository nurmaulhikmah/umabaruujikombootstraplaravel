@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    
    <div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-light border shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px;" title="Kembali">
        <i class="bi bi-arrow-left fs-5 text-dark"></i>
    </a>
    <h3 class="fw-bold mb-0">Tambah Jurusan</h3>
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

    <div class="card border-0 shadow-sm rounded-4 p-5 bg-white">
        <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

             <div class="mb-3">
                <label class="form-label fw-semibold">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" value="{{ old('nama_jurusan') }}" placeholder="Masukkan nama jurusan..." required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi (Opsi)</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" placeholder="Tulis deskripsi singkat...">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Logo</label>
                <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" required>
                <div class="form-text text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</div>
            </div>
            
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-light px-4 py-2 rounded-pill fw-semibold text-secondary border">Batal</a>
                <button type="submit" class="btn text-white px-5 py-2 rounded-pill fw-semibold shadow-sm" style="background-color: #001E6B;">Simpan Jurusan</button>
            </div>
        </form>
    </div>

</div>

<script>
    const inputLogo = document.getElementById('logo');
    const uploadContent = document.getElementById('upload-content');

    if (inputLogo) {
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
    }
</script>
@endsection
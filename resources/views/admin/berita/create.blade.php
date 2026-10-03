@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.berita.index') }}" class="btn btn-light border shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px;" title="Kembali">
        <i class="bi bi-arrow-left fs-5 text-dark"></i>
    </a>
    <h3 class="fw-bold mb-0">Tambah Berita Baru</h3>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Berita</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Masukkan judul berita..." required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Isi Berita</label>
                <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="4" placeholder="Tulis isi berita...">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Foto Berita</label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" required>
                <div class="form-text text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Terbitkan Berita</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-light rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
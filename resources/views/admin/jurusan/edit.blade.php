@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-light rounded-circle shadow-sm d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px;">
            <i class="bi bi-arrow-left fs-5 text-dark"></i>
        </a>
        <h2 class="fw-bold text-dark mb-0">Edit Jurusan</h2>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_jurusan" class="form-label fw-semibold">Nama Jurusan</label>
                <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" name="nama_jurusan" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" placeholder="Masukkan nama jurusan..." required>
                @error('nama_jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-semibold">Deskripsi Jurusan</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Tulis deskripsi jurusan...">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold d-block">Gambar/Logo Saat Ini</label>
                @if($jurusan->gambar)
                    <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="Preview" class="rounded shadow-sm mb-2" style="max-width: 150px; height: auto; object-fit: cover;">
                @else
                    <p class="text-muted small mb-0">Tidak ada gambar.</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="gambar" class="form-label fw-semibold">Ganti Gambar/Logo (Opsional)</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                <small class="text-muted d-block mt-1">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">
                    Perbarui Jurusan
                </button>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-light rounded-pill px-4 fw-semibold text-dark">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
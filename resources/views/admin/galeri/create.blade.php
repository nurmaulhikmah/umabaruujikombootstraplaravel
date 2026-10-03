@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">

    <div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px;" title="Kembali">
        <i class="bi bi-arrow-left fs-5 text-dark"></i>
    </a>
    <h3 class="fw-bold mb-0">Tambah Galeri Baru</h3>
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

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Kegiatan</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Masukkan judul kegiatan..." required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi (Opsi)</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" placeholder="Tulis deskripsi singkat...">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Foto Galeri</label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" required>
                <div class="form-text text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-light px-4 py-2 rounded-pill fw-semibold border">
                    Batal
                </a>
                <button type="submit" class="btn text-white px-4 py-2 rounded-pill fw-semibold shadow-sm" style="background-color: #11326d;">
                    Simpan Galeri
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
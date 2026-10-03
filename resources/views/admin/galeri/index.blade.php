@extends('layouts.admin')

@section('content')
   
    <div class="d-flex justify-content-between align-items-start mb-4">
        <h2 class="fw-bold text-dark mb-0">Kelola Galeri</h2>
        
        <div class="d-flex flex-column align-items-end gap-3">
            <a href="{{ route('admin.galeri.create') }}" class="btn text-white rounded-pill px-4 py-2 shadow-sm fw-semibold" style="background-color: #001E6B;">
                + Tambah Galeri
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        @if(isset($galeris) && $galeris->count() > 0)
            <div class="row g-4">
                @foreach($galeris as $galeri)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-light d-flex flex-column justify-content-between">
                        <div>
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="{{ $galeri->judul }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body p-3">
                                <h5 class="fw-bold text-dark mb-1">{{ $galeri->judul }}</h5>
                                <p class="text-secondary small mb-0">{{ $galeri->deskripsi }}</p>
                            </div>
                        </div>
     
                        <div class="card-footer bg-transparent border-0 p-3 pt-0 d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm text-white px-3 rounded-pill fw-semibold">Edit</a>
                            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm px-3 rounded-pill fw-semibold">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <i class="bi bi-images display-4 d-block mb-2"></i>
                <h5>Belum ada galeri</h5>
                <p class="small text-muted mb-0">Silahkan tambahkan galeri kegiatan baru melalui tombol di atas.</p>
            </div>
        @endif
    </div>
@endsection
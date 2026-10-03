@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-start mb-4">
        <h2 class="fw-bold text-dark mb-0">Manajemen Data Berita</h2>
        
        <div class="d-flex flex-column align-items-end gap-3">
            <a href="{{ route('admin.berita.create') }}" class="btn text-white rounded-pill px-4 py-2 shadow-sm fw-semibold" style="background-color: #001E6B;">
                + Tambah Berita
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
        @if(isset($beritas) && count($beritas) > 0)
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-secondary">
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Gambar</th>
                            <th style="width: 25%;">Judul Berita</th>
                            <th style="width: 37%;">Ringkasan</th>
                            <th style="width: 18%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($beritas as $index => $berita)
                        <tr>
                            <td class="fw-semibold">{{ $index + 1 }}</td>
                            <td>
                                @if(!empty($berita->gambar))
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="rounded shadow-sm" style="width: 60px; height: 45px; object-fit: cover;">
                                @else
                                    <span class="text-muted small">Tidak ada</span>
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ $berita->judul }}</td>
                            <td class="text-secondary small">{{ Str::limit(strip_tags($berita->konten), 70) }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm text-white px-3 rounded-pill fw-semibold d-inline-flex align-items-center gap-1">Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3 rounded-pill fw-semibold d-inline-flex align-items-center gap-1">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <i class="bi bi-newspaper display-4 d-block mb-2"></i>
                <h5>Belum ada data berita</h5>
                <p class="small text-muted mb-0">Silahkan tambahkan berita melalui tombol di atas.</p>
            </div>
        @endif
    </div>
@endsection
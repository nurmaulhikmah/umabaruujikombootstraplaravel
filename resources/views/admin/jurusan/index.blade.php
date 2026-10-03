@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-start mb-4">
        <h2 class="fw-bold text-dark mb-0">Manajemen Data Jurusan</h2>
        
        <div class="d-flex flex-column align-items-end gap-3">
            <a href="{{ route('admin.jurusan.create') }}" class="btn text-white rounded-pill px-4 py-2 shadow-sm fw-semibold" style="background-color: #001E6B;">
                + Tambah Jurusan
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
        @if(isset($jurusans) && $jurusans->count() > 0)
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-secondary">
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Logo</th>
                            <th style="width: 25%;">Nama Jurusan</th>
                            <th style="width: 40%;">Deskripsi</th>
                            <th style="width: 15%;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jurusans as $index => $jurusan)
                        <tr>
                            <td class="fw-semibold">{{ $index + 1 }}</td>
                            <td>
                                @if($jurusan->logo)
                                    <img src="{{ asset('storage/' . $jurusan->logo) }}" alt="Logo" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <span class="text-muted small">Tidak ada</span>
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ $jurusan->nama_jurusan }}</td>
                            <td class="text-secondary small">{{ Str::limit($jurusan->deskripsi, 80) }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}" class="btn btn-warning btn-sm text-white px-3 rounded-pill fw-semibold">Edit</a>
                                    <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3 rounded-pill fw-semibold">Hapus</button>
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
                <i class="bi bi-grid display-4 d-block mb-2"></i>
                <h5>Belum ada data jurusan</h5>
                <p class="small text-muted mb-0">Silahkan tambahkan melalui tombol di atas.</p>
            </div>
        @endif
    </div>
@endsection
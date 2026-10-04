@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-light border rounded-circle shadow-sm d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
        <i class="bi bi-arrow-left fs-5 text-dark"></i>
    </a>
    <div>
        <h2 class="fw-bold text-dark mb-1">Kritik & Saran Website</h2>
        <p class="text-secondary mb-0">Daftar ulasan dan rating dari pengunjung website SMKN 4 Bogor.</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white text-center">
            <h6 class="text-muted mb-1">Rata-rata Rating Website</h6>
            <h2 class="fw-bold text-warning my-2">⭐ {{ number_format($avgRating ?? 0, 1) }} / 5.0</h2>
            <span class="small text-muted">Dari total {{ $ratings->count() }} responden</span>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 px-4">No</th>
                        <th class="py-3">Nama Pengunjung</th>
                        <th class="py-3">Rating</th>
                        <th class="py-3">Kritik & Saran</th>
                        <th class="py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ratings as $index => $item)
                        <tr>
                            <td class="px-4 text-secondary">{{ $index + 1 }}</td>
                            <td class="fw-semibold text-dark">{{ $item->nama }}</td>
                            <td>
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                    ⭐ {{ $item->rating }} Bintang
                                </span>
                            </td>
                            <td class="text-secondary">{{ $item->saran ?? 'Tidak ada catatan/saran.' }}</td>
                            <td class="text-muted small">{{ $item->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-chat-square-dots fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                Belum ada kritik atau saran yang masuk dari pengunjung.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
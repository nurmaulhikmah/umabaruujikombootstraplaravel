<section class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #11326d;">Artikel Terbaru</h2>
        <p class="text-secondary">Informasi penting seputar kegiatan sekolah</p>
    </div>

    @if(isset($artikels) && $artikels->count() > 0)
        <div class="row g-4">
            @foreach($artikels as $item)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-150">
                    <span class="badge bg-primary mb-2 align-self-start">{{ $item->created_at->format('d M Y') }}</span>
                    <h5 class="fw-bold text-dark">{{ $item->judul }}</h5>
                    <p class="small text-muted mb-0">{{ Str::limit($item->isi, 100) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-3">
            <p class="text-muted fst-italic">Belum ada pengumuman terbaru dari admin.</p>
        </div>
    @endif
</section>
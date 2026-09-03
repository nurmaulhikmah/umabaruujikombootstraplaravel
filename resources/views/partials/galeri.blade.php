<section id="galeri" class="container py-5 border-top">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #11326d;">Galeri Kegiatan Sekolah</h2>
        <p class="text-secondary">Dokumentasi aktivitas belajar dan kegiatan siswa</p>
    </div>

    <!-- Cek apakah data galeri ada di database -->
    @if(isset($galeris) && $galeris->count() > 0)
        <div class="row g-4">
            @foreach($galeris as $galeri)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <!-- Menampilkan foto yang di-upload admin dari folder storage -->
                    <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul_foto }}" class="w-100" style="height: 200px; object-fit: cover;">
                    <div class="card-body bg-white text-center">
                        <p class="card-text text-secondary fw-semibold mb-0 small">{{ $galeri->judul_foto }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <!-- Tampilan jika admin belum mengunggah foto apa pun -->
        <div class="text-center py-4">
            <p class="text-muted fst-italic">Belum ada foto galeri yang diunggah oleh admin.</p>
        </div>
    @endif
</section>
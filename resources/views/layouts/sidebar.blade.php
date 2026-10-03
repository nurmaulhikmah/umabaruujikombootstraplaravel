<div class="col-md-3 col-lg-2 p-4 shadow-sm d-flex flex-column sticky-top h-100" style="background-color: #001E6B; overflow-y: auto;">
    
    <div class="mb-4">
    
        <div class="mb-4 text-white">
            <h6 class="fw-bold mb-0" style="font-size: 18px; letter-spacing: 0.5px;">SMK NEGERI 4</h6>
            <small class="text-white-50 opacity-75" style="font-size: 12px; letter-spacing: 1px;">BOGOR</small>
        </div>

        <span class="text-white-50 small text-uppercase fw-bold mb-3 d-block" style="font-size: 12px; letter-spacing: 1px;">UTAMA</span>
        
        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link py-3 px-3 rounded-3 text-white d-flex align-items-center {{ request()->routeIs('admin.dashboard*') ? 'bg-white bg-opacity-25 fw-semibold' : 'bg-transparent text-opacity-75' }}">
                    <i class="bi bi-house-door me-3 fs-5"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.galeri.index') }}" 
                   class="nav-link py-3 px-3 rounded-3 text-white d-flex align-items-center {{ request()->routeIs('admin.galeri*') ? 'bg-white bg-opacity-25 fw-semibold' : 'bg-transparent text-opacity-75' }}">
                    <i class="bi bi-image me-3 fs-5"></i> Galeri
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.jurusan.index') }}" 
                   class="nav-link py-3 px-3 rounded-3 text-white d-flex align-items-center {{ request()->routeIs('admin.jurusan*') ? 'bg-white bg-opacity-25 fw-semibold' : 'bg-transparent text-opacity-75' }}">
                    <i class="bi bi-grid-1x2 me-3 fs-5"></i> Jurusan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.berita.index') }}" 
                   class="nav-link py-3 px-3 rounded-3 text-white d-flex align-items-center {{ request()->routeIs('admin.berita*') ? 'bg-white bg-opacity-25 fw-semibold' : 'bg-transparent text-opacity-75' }}">
                    <i class="bi bi-newspaper me-3 fs-5"></i> Berita
                </a>
            </li>
            <li class="nav-item">
                @php
                    $unreadPesan = \App\Models\Message::where('is_read', false)->count();
                @endphp
                <a href="{{ route('admin.kontak.index') }}" 
                   class="nav-link py-3 px-3 rounded-3 text-white d-flex align-items-center justify-content-between {{ request()->routeIs('admin.kontak*') ? 'bg-white bg-opacity-25 fw-semibold' : 'bg-transparent text-opacity-75' }}">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-envelope me-3 fs-5"></i> Kontak
                    </div>
                    @if($unreadPesan > 0)
                        <span class="badge rounded-circle bg-danger p-2 fs-6 d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                            {{ $unreadPesan }}
                        </span>
                    @endif
                </a>
            </li>
        </ul>
    </div>

    <div class="mt-auto">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link w-100 text-white text-opacity-75 py-3 px-3 rounded-3 border-0 bg-transparent d-flex align-items-center text-start" style="transition: all 0.3s;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.15)'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.75)';">
                <i class="bi bi-box-arrow-right me-3 fs-5"></i> Keluar
            </button>
        </form>
    </div>

</div>
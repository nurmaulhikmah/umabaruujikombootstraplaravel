<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 45px; height: 45px; object-fit: contain;" onerror="this.style.display='none'">
            <div>
                <h6 class="fw-bold mb-0 text-dark">SMK NEGERI 4 BOGOR</h6>
                <small class="text-muted" style="font-size: 11px;">Sekolah Pusat Keunggulan</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-3 fw-semibold">
                <li class="nav-item">
                    <a href="{{ route('home') }}#beranda" class="nav-link nav-link-item text-secondary" data-target="beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}#jurusan" class="nav-link nav-link-item text-secondary" data-target="jurusan">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}#galeri" class="nav-link nav-link-item text-secondary" data-target="galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}#berita" class="nav-link nav-link-item text-secondary" data-target="berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}#kontak" class="nav-link nav-link-item text-secondary" data-target="kontak">Kontak</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a href="{{ route('admin.login') }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background-color: #11326d;">
                        LOGIN
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
 
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sections = document.querySelectorAll("section[id], div[id]");
        const navLinks = document.querySelectorAll(".nav-link-item");

        function updateActiveNav() {
            let current = "beranda";
            const scrollPos = window.scrollY;

            if (scrollPos < 150) {
                current = "beranda";
            } else {
                sections.forEach((section) => {
                    const sectionTop = section.offsetTop - 180;
                    const sectionHeight = section.clientHeight;
                    if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                        current = section.getAttribute("id");
                    }
                });
            }

            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
                current = "kontak";
            }

            navLinks.forEach((link) => {
                link.classList.remove("text-primary");
                link.classList.add("text-secondary");
                
                if (link.getAttribute("data-target") === current) {
                    link.classList.remove("text-secondary");
                    link.classList.add("text-primary");
                }
            });
        }

        window.addEventListener("scroll", updateActiveNav);
        updateActiveNav();
    });
</script>
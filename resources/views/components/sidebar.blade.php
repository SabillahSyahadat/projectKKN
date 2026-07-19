<div class="sidebar shadow" id="adminSidebar">
    <div class="text-center mb-4">
        <div class="mb-2">
            <i class="bi bi-shield-shaded text-danger fs-1"></i>
        </div>
        <h3 class="fw-bold text-white letter-spacing-1">KEPUDIBENER</h3>
        <p class="text-muted small">Administrator</p>
    </div>
    
    <nav class="nav flex-column gap-1"> {{-- Tambahkan sedikit gap antar menu --}}
        {{-- Dashboard: Ikon kotak-kotak merepresentasikan ringkasan panel --}}
        <x-nav-link href="dashboard" :active="request()->is('admin/dashboard')" icon="bi-speedometer2">Dashboard</x-nav-link>
        
        {{-- Data Warga: Ikon identitas/kartu penduduk --}}
        <x-nav-link href="/admin/daftarWarga" :active="request()->is('admin/warga')" icon="bi-card-list">Data Warga</x-nav-link>

        <x-nav-link href="/admin/galeri" :active="request()->is('admin/galeri')" icon="bi bi-camera">Galeri Desa</x-nav-link>

        <x-nav-link href="/admin/perangkat" :active="request()->is('admin/perangkat')" icon="bi bi-people">Perangkat Desa</x-nav-link>
        
        {{-- Daftar Berita: Ikon koran/surat kabar --}}
        <x-nav-link href="berita" :active="request()->is('admin/berita')" icon="bi-newspaper">Daftar Berita</x-nav-link>
        
        {{-- Kritik & Saran: Ikon kotak pesan masuk --}}
        <x-nav-link href="/admin/kritik-saran" :active="request()->is('admin/kritik-saran')" icon="bi-chat-left-dots-fill">
    Kritik & Saran
</x-nav-link>
        {{-- Layanan Surat: Ikon dokumen dengan tanda tangan/stempel --}}
        <x-nav-link href="/admin/surat" :active="request()->is('admin/surat')" icon="bi-file-earmark-text-fill">Layanan Surat</x-nav-link>
        
        {{-- Laporan Warga: Ikon peringatan/isu yang perlu ditangani --}}
        <x-nav-link href="laporan" :active="request()->is('admin/laporan')" icon="bi-exclamation-octagon-fill">Laporan Warga</x-nav-link>
        <a href="#" class="nav-link text-danger d-flex align-items-center gap-2 px-4 py-3" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-power fs-5"></i> 
        <span class="fw-bold">Logout</span>
    </a>
        
        <div style="margin-top: 100px;">
    <hr class="text-secondary opacity-25 mx-3">
    
    <a href="#" class="nav-link text-danger d-flex align-items-center gap-2 px-4 py-3" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-power fs-5"></i> 
        <span class="fw-bold">Logout</span>
    </a>

    <form id="logout-form" action="{{ route('logoutAdmin') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
    </nav>
</div>
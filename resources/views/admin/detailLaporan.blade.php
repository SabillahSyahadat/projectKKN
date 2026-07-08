<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container py-4">
        <div class="row mb-4 align-items-center" data-aos="fade-right">
            <div class="col-auto">
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark rounded-circle p-2" style="width: 45px; height: 45px;">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            <div class="col">
                <h2 class="fw-bold mb-0">Detail Laporan #{{ $laporan->id }}</h2>
                <p class="text-muted mb-0">Informasi lengkap mengenai aspirasi/laporan warga</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-7" data-aos="fade-up">
                <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                    <h5 class="fw-bold mb-4">Informasi Laporan</h5>
                    
                    <div class="mb-4">
                        <label class="text-muted small text-uppercase fw-bold mb-2 d-block">Nama Pelapor</label>
                        <div class="d-flex align-items-center">
                            <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; font-weight: bold;">
                                {{ substr($laporan->nama_pelapor, 0, 1) }}
                            </div>
                            <span class="fs-5 fw-medium">{{ $laporan->nama_pelapor }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small text-uppercase fw-bold mb-2 d-block">NIK</label>
                        <p class="fs-5 font-monospace text-dark">{{ $laporan->nik }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small text-uppercase fw-bold mb-2 d-block">Waktu Laporan</label>
                        <p class="mb-0 text-dark">{{ $laporan->created_at->format('d F Y') }}</p>
                        <small class="text-muted">{{ $laporan->created_at->format('H:i') }} WIB ({{ $laporan->created_at->diffForHumans() }})</small>
                    </div>

                    <div class="mb-0">
                        <label class="text-muted small text-uppercase fw-bold mb-2 d-block">Isi Laporan / Aspirasi</label>
                        <div class="p-3 bg-light rounded-4" style="line-height: 1.6; white-space: pre-line;">
                            {{ $laporan->isi_laporan }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 24px;">
                    <h5 class="fw-bold mb-4">Lampiran Foto</h5>
                    
                    @if($laporan->foto_laporan)
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $laporan->foto_laporan) }}" 
                                 class="img-fluid rounded-4 shadow-sm w-100" 
                                 alt="Lampiran Laporan"
                                 style="max-height: 400px; object-fit: cover;">
                            
                            <a href="{{ asset('storage/' . $laporan->foto_laporan) }}" target="_blank" 
                               class="btn btn-light btn-sm position-absolute bottom-0 end-0 m-3 rounded-pill px-3 shadow">
                                <i class="bi bi-fullscreen me-1"></i> Perbesar Gambar
                            </a>
                        </div>
                    @else
                        <div class="d-flex flex-column align-items-center justify-content-center h-75 text-muted">
                            <i class="bi bi-image mb-2" style="font-size: 3rem;"></i>
                            <p>Tidak ada lampiran foto untuk laporan ini.</p>
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</x-layout>
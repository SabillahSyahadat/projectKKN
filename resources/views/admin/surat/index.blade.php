<x-layout>
    <x-slot:title>Manajemen Surat</x-slot:title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <div class="container-fluid py-5 page-content" style="font-family: 'Plus Jakarta Sans', sans-serif;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5" data-aos="fade-down">
            <div>
                <h2 class="fw-800 text-dark mb-1 tracking-tight">Pengajuan <span class="text-indigo">Surat</span></h2>
                <p class="text-muted mb-0">Kelola dan proses permintaan dokumen administrasi warga.</p>
            </div>
        </div>

        <ul class="nav nav-pills mb-4 p-2 bg-white rounded-4 shadow-sm border" id="pills-tab" role="tablist" data-aos="fade-up" data-aos-delay="100">
            <li class="nav-item">
                <button class="nav-link active rounded-3 fw-bold px-4 py-2" id="pills-pengantar-tab" data-bs-toggle="pill" data-bs-target="#pills-pengantar" type="button">
                    <i class="bi bi-file-earmark-text me-2"></i>Surat Pengantar
                </button>
            </li>
            <li class="nav-item ms-2">
                <button class="nav-link rounded-3 fw-bold px-4 py-2" id="pills-domisili-tab" data-bs-toggle="pill" data-bs-target="#pills-domisili" type="button">
                    <i class="bi bi-geo-alt me-2"></i>Surat Domisili
                </button>
            </li>
            <li class="nav-item ms-2">
                <button class="nav-link rounded-3 fw-bold px-4 py-2" id="pills-sktm-tab" data-bs-toggle="pill" data-bs-target="#pills-sktm" type="button">
                    <i class="bi bi-shield-check me-2"></i>SKTM
                </button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-pengantar" role="tabpanel">
                @include('admin.surat._table', ['surats' => $suratPengantar])
            </div>
            <div class="tab-pane fade" id="pills-domisili" role="tabpanel">
                @include('admin.surat._table', ['surats' => $suratDomisili])
            </div>
            <div class="tab-pane fade" id="pills-sktm" role="tabpanel">
                @include('admin.surat._table', ['surats' => $suratSKTM])
            </div>
        </div>
    </div>

    <style>
        .text-indigo { color: #4f46e5; }
        .fw-800 { font-weight: 800; }
        .nav-pills .nav-link {
            color: #64748b;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-pills .nav-link:hover {
            color: #4f46e5;
            background-color: #f1f5f9;
        }
        .nav-pills .nav-link.active {
            background-color: #4f46e5 !important;
            color: #ffffff !important;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }
    </style>
</x-layout>
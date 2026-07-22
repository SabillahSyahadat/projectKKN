<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5" data-aos="fade-down">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item x-small text-uppercase fw-700 letter-spacing-1"><a href="{{ route('admin.daftarWarga') }}" class="text-decoration-none text-muted">Data Warga</a></li>
                    <li class="breadcrumb-item active x-small text-uppercase fw-700 letter-spacing-1 text-danger" aria-current="page">Profil Detail</li>
                </ol>
            </nav>
            <a href="{{ route('admin.daftarWarga') }}" class="btn btn-outline-dark btn-sm rounded-pill px-4 shadow-sm border-0 bg-white transition-all">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card border-0 shadow-lg rounded-5 overflow-hidden bg-white" data-aos="zoom-in" data-aos-duration="1000">
            <div class="row g-0 h-100">
                
                <div class="col-md-5 position-relative d-flex align-items-center justify-content-center p-5 min-h-card" 
                     style="background: linear-gradient(135deg, #2b2b2b 0%, #dc3545 100%);">
                    
                    <div class="text-center z-2">
                        <div class="mb-4 d-inline-block p-1 px-3 rounded-pill bg-white bg-opacity-10 border border-white border-opacity-10 shadow-inner">
                            <span class="x-small text-white opacity-75 letter-spacing-2 fw-500">ID WARGA</span>
                            <span class="fw-900 text-white ms-2 fs-5">#{{ $warga->id }}</span>
                        </div>

                        <div class="position-relative mb-4">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($warga->nama_warga) }}&background=ffffff&color=dc3545&size=200" 
                                 class="rounded-circle shadow-lg border border-5 border-white border-opacity-10 img-fluid profile-glow" 
                                 style="width: 170px; height: 170px; object-fit: cover;" alt="Avatar">
                        </div>
                        <h2 class="text-white fw-900 mb-1 text-capitalize text-shadow-sm">{{ $warga->nama_warga }}</h2>
                        
                        <div class="d-inline-flex align-items-center gap-2 mt-2 px-3 py-1 rounded-pill bg-white text-danger shadow-sm">
                            <i class="bi bi-circle-fill small opacity-50 pulse-animation-red"></i>
                            <span class="x-small fw-bold text-uppercase letter-spacing-1">{{ $warga->status }}</span>
                        </div>
                    </div>

                    <div class="position-absolute start-0 bottom-0 ms-n4 mb-n3 text-white fw-900 sidomulyo-watermark" style="font-size: 8rem; line-height: 1;">
                        S<span class="opacity-10">KEPUDIBENER</span>
                    </div>
                </div>

                <div class="col-md-7 p-lg-5 p-4 bg-white">
                    <div class="mb-5 p-4 rounded-4 bg-light shadow-inner transition-all hover-subtle-border">
                        <label class="text-muted small fw-bold text-uppercase letter-spacing-2 mb-1 d-block">Nomor Induk Kependudukan (NIK)</label>
                        <h3 class="fw-900 text-dark mb-0 ls-wide fs-2 text-shadow-xs">{{ $warga->nik }}</h3>
                    </div>

                    <div class="row g-4 mb-4">
                        @php
                            $items = [
                                ['label' => 'Tempat, Tgl Lahir', 'val' => \Carbon\Carbon::parse($warga->tgl_lahir)->translatedFormat('d F Y'), 'icon' => 'calendar3'],
                                ['label' => 'Jenis Kelamin', 'val' => $warga->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan', 'icon' => 'gender-ambiguous'],
                                ['label' => 'Pekerjaan', 'val' => $warga->pekerjaan, 'icon' => 'briefcase'],
                                ['label' => 'Alamat Email', 'val' => $warga->email_warga ?? 'Tidak Ada Email', 'icon' => 'envelope-at'],
                            ];
                        @endphp

                        @foreach($items as $item)
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-2 rounded-3 hover-bg-light transition-all">
                                <div class="icon-box bg-danger-subtle text-danger rounded-circle p-2 shadow-sm border border-danger border-opacity-25">
                                    <i class="bi bi-{{ $item['icon'] }} fs-5 lh-1"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block fw-bold text-shadow-xs">{{ $item['label'] }}</small>
                                    <span class="text-dark fw-700 fs-6">{{ $item['val'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-12 mt-4 pt-2">
                        <div class="p-4 rounded-4 bg-white border shadow-sm position-relative alamat-box overflow-hidden">
                            <i class="bi bi-geo-alt-fill position-absolute end-0 bottom-0 mb-n3 me-n2 fs-1 text-danger opacity-10"></i>
                            <label class="text-muted small fw-bold text-uppercase mb-2 d-block text-danger letter-spacing-1">Alamat Lengkap Sesuai KTP</label>
                            <p class="text-dark fw-600 mb-0 fs-5 lh-base italic-address position-relative z-1 text-shadow-xs">
                                "{{ $warga->alamat }}"
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 d-flex justify-content-end align-items-center gap-2" data-aos="fade-left" data-aos-delay="200">
                        <span class="x-small fw-600 text-secondary text-uppercase letter-spacing-1 opacity-75">STATUS DATA:</span>
                        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2 fw-bold shadow-sm d-flex align-items-center gap-1">
                            <i class="bi bi-patch-check-fill lh-1"></i> Terverifikasi Sistem
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;800;900&display=swap');

        /* Gunakan font Urbanist untuk kesan lebih clean & premium */
        body {
            background-color: #f6f8f9;
            font-family: 'Urbanist', sans-serif !important;
            letter-spacing: -0.2px;
        }

        .fw-900 { font-weight: 900; }
        .fw-800 { font-weight: 800; }
        .fw-700 { font-weight: 700; }
        .fw-600 { font-weight: 600; }
        .fw-500 { font-weight: 500; }
        
        .ls-wide { letter-spacing: 6px; }
        .letter-spacing-1 { letter-spacing: 1px; }
        .letter-spacing-2 { letter-spacing: 2px; }
        .x-small { font-size: 0.72rem; }
        .shadow-inner { box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.03); }
        .text-shadow-sm { text-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .text-shadow-xs { text-shadow: 0 1px 2px rgba(0,0,0,0.03); }

        /* Custom Animations & Transitions */
        .transition-all { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        
        .btn-white:hover { 
            background: #fff;
            transform: translateY(-2px); 
            box-shadow: 0 8px 25px rgba(0,0,0,0.08) !important; 
            color: #dc3545;
        }

        .profile-glow {
            box-shadow: 0 0 40px rgba(255, 255, 255, 0.25);
            transition: all 0.6s ease;
        }
        .profile-glow:hover {
            transform: scale(1.03) rotate(2deg);
            box-shadow: 0 0 60px rgba(255, 255, 255, 0.45);
        }

        .hover-subtle-border:hover {
            background-color: #fff !important;
            border-color: #dc3545 !important;
            box-shadow: 0 10px 30px rgba(220,53,69,0.04) !important;
        }
        
        .hover-bg-light:hover { background-color: #fbfcfc; }

        .icon-box {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .italic-address { font-style: italic; color: #333; letter-spacing: 0; }
        .bg-danger-subtle { background-color: #fff2f3 !important; }
        .bg-success-subtle { background-color: #d1f7e6 !important; }
        .bg-success-subtle.text-success { color: #15803d !important; }

        /* Pulse for Active Status */
        @keyframes pulse-red {
            0% { transform: scale(0.95); opacity: 0.7; }
            50% { transform: scale(1); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.7; }
        }
        .pulse-animation-red { animation: pulse-red 2s infinite; }

        .min-h-card { min-height: 600px; }
        .z-2 { z-index: 2; position: relative; }

        .sidomulyo-watermark {
            opacity: 0.04;
            letter-spacing: -5px;
            user-select: none;
            pointer-events: none;
        }
        
        .alamat-box {
            border: 1px solid #e2e8f0;
        }

        @media (max-width: 768px) {
            .min-h-card { min-height: auto; }
            .sidomulyo-watermark { display: none; }
        }
    </style>
</x-layout>
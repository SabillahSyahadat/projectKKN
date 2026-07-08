<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Aparatur - {{ $perangkat->nama }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #e84545;
            --primary-hover: #c63232;
            --bg-soft: #f8fafc;
            --dark: #1e293b;
        }

        body {
            background-color: var(--bg-soft);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--dark);
            overflow-x: hidden;
        }

        .fw-800 { font-weight: 800; }
        .fw-700 { font-weight: 700; }
        .fw-600 { font-weight: 600; }

        /* Profile Sidebar */
        .profile-card {
            border: none;
            border-radius: 30px;
            background: white;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .profile-header-gradient {
            height: 120px;
            background: linear-gradient(135deg, var(--primary), #fb7185);
            border-radius: 30px 30px 0 0;
        }

        .avatar-wrapper {
            width: 160px;
            height: 200px;
            margin: -70px auto 15px;
            padding: 8px;
            background: white;
            border-radius: 25px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .avatar-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 18px;
        }

        /* Detail Section */
        .info-card {
            border: none;
            border-radius: 30px;
            background: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        .icon-shape {
            width: 48px;
            height: 48px;
            background: #fff1f2;
            color: var(--primary);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .data-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .data-value {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0;
        }

        /* Buttons */
        .btn-whatsapp {
            background-color: #25D366;
            color: white;
            border-radius: 15px;
            padding: 12px;
            font-weight: 700;
            transition: all 0.3s;
        }

        .btn-whatsapp:hover {
            background-color: #1eb956;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2);
        }

        .btn-action {
            border-radius: 12px;
            font-weight: 600;
            padding: 10px 20px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .sticky-top { position: static !important; }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="d-flex align-items-center mb-5" data-aos="fade-right">
            <a href="{{ url()->previous() }}" class="btn btn-white shadow-sm rounded-circle p-3 me-3">
                <i class="bi bi-arrow-left d-flex"></i>
            </a>
            <div>
                <h4 class="fw-800 mb-0">Profil Aparatur</h4>
                <p class="text-muted small mb-0">Pemerintah Desa Sidomulyo</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            
            <div class="col-lg-4" data-aos="zoom-in" data-aos-duration="800">
                <div class="profile-card sticky-top" style="top: 30px;">
                    <div class="profile-header-gradient"></div>
                    <div class="card-body text-center p-4">
                        <div class="avatar-wrapper">
                            <img src="{{ $perangkat->foto_url }}" alt="{{ $perangkat->nama }}">
                        </div>
                        
                        <h4 class="fw-800 mb-1">{{ $perangkat->nama }}</h4>
                        <div class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2 mb-4 fw-700">
                            {{ $perangkat->jabatan }}
                        </div>

                        <div class="d-grid gap-2">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $perangkat->whatsapp) }}" 
                               target="_blank" class="btn btn-whatsapp border-0 shadow-sm">
                                <i class="bi bi-whatsapp me-2"></i>Hubungi WhatsApp
                            </a>
                            <button class="btn btn-light text-muted fw-600 rounded-4" onclick="window.print()">
                                <i class="bi bi-printer me-2"></i>Cetak Profil
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                
                <div class="info-card p-4 p-md-5 mb-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-shape me-3">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5 class="fw-800 mb-0 text-dark">Informasi Kedinasan</h5>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-4">
                                <p class="data-label">Nomor Induk Perangkat</p>
                                <p class="data-value fs-5">{{ $perangkat->nip ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-4">
                                <p class="data-label">Status Kepegawaian</p>
                                <p class="data-value fs-5 text-success">
                                    <i class="bi bi-patch-check-fill me-1"></i>{{ ucfirst($perangkat->status) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-card p-4 p-md-5">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-shape me-3">
                            <i class="bi bi-envelope-paper"></i>
                        </div>
                        <h5 class="fw-800 mb-0 text-dark">Kontak & Tugas Pokok</h5>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="data-label">Email Kerja</label>
                            <p class="data-value fw-600">{{ $perangkat->email ?? '-' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="data-label">Nomor HP/WA</label>
                            <p class="data-value fw-600">{{ $perangkat->whatsapp ?? '-' }}</p>
                        </div>
                    </div>

                    <hr class="my-4 opacity-25">

                    <label class="data-label mb-3">Tugas Pokok & Deskripsi Fungsi</label>
                    <div class="bg-light p-4 rounded-4">
                        <p class="text-secondary lh-lg mb-0" style="text-align: justify;">
                            {{ $perangkat->keterangan ?? 'Deskripsi tugas belum diisi oleh admin.' }}
                        </p>
                    </div>

                    <div class="mt-5 d-flex gap-2">
                        <a href="{{ url('/admin/perangkat/edit/'.$perangkat->id) }}" class="btn btn-dark btn-action px-4">
                            <i class="bi bi-pencil-square me-2"></i>Edit Data
                        </a>
                        <form action="{{ route('admin.perangkat.delete', $perangkat->id) }}" method="POST" class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-action px-4 border-2">
                            <i class="bi bi-trash3 me-2"></i>Hapus
                        </button>
                                    </form>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-in-out'
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita - Panel Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }
        .fw-extrabold { font-weight: 800; }
        .news-content {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.8;
        }
        .btn-white:hover {
            background: #f8f9fa;
        }
        .card {
            border-radius: 20px;
        }
        .breadcrumb-item a {
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Pratinjau Berita</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminBerita') }}">Daftar Berita</a></li>
                        <li class="breadcrumb-item active">Detail Berita</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('adminBerita') }}" class="btn btn-light border">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="fw-extrabold mb-4 text-dark" style="letter-spacing: -1px; line-height: 1.2;">
                            {{ $berita->nama_berita }}
                        </h1>

                        <div class="mb-4 overflow-hidden rounded-4" style="max-height: 450px;">
                            @if($berita->gambar_berita)
                                <img src="{{ asset('storage/' . $berita->gambar_berita) }}" class="img-fluid w-100 object-fit-cover" alt="Cover">
                            @else
                                <img src="{{ asset('storage/uploads/berita/template.png') }}" class="img-fluid w-100 object-fit-cover" alt="Default">
                            @endif
                        </div>

                        <div class="news-content text-muted fs-5">
                            {!! nl2br(e($berita->isi_berita)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0">Informasi Publikasi</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between px-0 py-3">
                                <span class="text-muted">Status</span>
                                <span class="badge bg-success rounded-pill">Aktif</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between px-0 py-3">
                                <span class="text-muted">Slug URL</span>
                                <small class="text-primary fw-bold">{{ $berita->slug }}</small>
                            </li>
                            <li class="list-group-item d-flex justify-content-between px-0 py-3">
                                <span class="text-muted">Dibuat Pada</span>
                                <span class="fw-medium text-dark">{{ $berita->created_at->translatedFormat('d F Y') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between px-0 py-3">
                                <span class="text-muted">Pukul</span>
                                <span class="fw-medium text-dark">{{ $berita->created_at->format('H:i') }} WIB</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body p-4">
                        <h6 class="fw-bold opacity-75">Tampilan Publik</h6>
                        <p class="small mb-3">Lihat bagaimana warga melihat berita ini di halaman utama.</p>
                        <a href="{{ route('berita.detail', $berita->slug) }}" target="_blank" class="btn btn-white w-100 fw-bold shadow-sm" style="background: white; color: var(--bs-primary);">
                            <i class="bi bi-eye me-2"></i>Buka Halaman Warga
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
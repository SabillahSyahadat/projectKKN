{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->nama_berita }} - Desa Sidomulyo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-red: #dc3545;
            --dark-bg: #1a1a1a;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .navbar-desa {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .article-container {
            margin-top: 100px;
            margin-bottom: 60px;
        }

        .article-card {
            background: white;
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .category-badge {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--primary-red);
            font-weight: 700;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
        }

        .post-meta {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .entry-title {
            font-weight: 800;
            color: #212529;
            line-height: 1.2;
            margin-top: 15px;
        }

        .featured-img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 15px;
        }

        .article-content {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #444;
            text-align: justify;
        }

        .btn-back {
            border: 2px solid var(--primary-red);
            color: var(--primary-red);
            font-weight: 700;
            border-radius: 50px;
            transition: all 0.3s ease;
            padding: 10px 25px;
        }

        .btn-back:hover {
            background-color: var(--primary-red);
            color: white;
            transform: translateX(-5px);
        }

        .share-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f1f1f1;
            color: #555;
            margin-left: 10px;
            transition: 0.3s;
        }

        .share-icon:hover {
            background: var(--primary-red);
            color: white;
        }

        footer {
            background: var(--dark-bg);
            color: white;
            padding: 40px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-desa fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/">
                Desa <span class="text-danger">Sidomulyo</span>
            </a>
            <a href="/" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="bi bi-house-door me-1"></i> Beranda
            </a>
        </div>
    </nav>

    <main class="container article-container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-danger text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                    </ol>
                </nav>

                <article class="article-card shadow-sm p-4 p-md-5">
                    
                    <div class="mb-4 text-center text-md-start">
                        <span class="category-badge">#BERITA_DESA</span>
                        <div class="post-meta mt-3 d-flex align-items-center justify-content-center justify-content-md-start">
                            <i class="bi bi-calendar3 me-2 text-danger"></i>
                            <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
                            <span class="mx-3 text-muted">|</span>
                            <i class="bi bi-person me-2 text-danger"></i>
                            <span>Admin Desa</span>
                        </div>
                        <h1 class="entry-title display-5">{{ $berita->nama_berita }}</h1>
                    </div>

                    <div class="mb-5">
                        @if($berita->gambar_berita)
                            <img src="{{ asset('storage/' . $berita->gambar_berita) }}" class="featured-img shadow-sm" alt="{{ $berita->nama_berita }}">
                        @else
                            <img src="https://via.placeholder.com/1200x600?text=Berita+Desa+Sidomulyo" class="featured-img shadow-sm" alt="Default Image">
                        @endif
                    </div>

                    <div class="article-content mb-5">
                        {!! nl2br(e($berita->isi_berita)) !!}
                    </div>

                    <hr class="my-5">

                    <div class="row align-items-center">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <a href="/" class="btn btn-back">
                                <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
                            </a>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <span class="fw-bold me-2 small text-uppercase text-muted">Bagikan:</span>
                            <a href="#" class="share-icon text-decoration-none"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" class="share-icon text-decoration-none"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="share-icon text-decoration-none"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </main>

    <footer>
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Pemerintah Desa Sidomulyo. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.min.js"></script>
</body>
</html> --}}
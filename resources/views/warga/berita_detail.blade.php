<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->nama_berita }} - Desa Sidomulyo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Lora:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #dc3545;
            --dark-text: #1d2124;
            --body-text: #4a4a4a;
            --bg-light: #fdfdfd;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--body-text);
            line-height: 1.8;
        }

        /* Navbar Simple */
        .navbar-minimal {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        /* Hero Image Section */
        .news-hero-wrapper {
            margin-top: 80px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            position: relative;
            background: #eee;
        }

        .news-hero-img {
            width: 100%;
            height: auto;
            max-height: 550px;
            object-fit: cover;
            display: block;
        }

        /* Content Styling */
        .news-header {
            max-width: 800px;
            margin: 40px auto 30px;
            text-align: center;
        }

        .category-tag {
            display: inline-block;
            background: rgba(220, 53, 69, 0.1);
            color: var(--primary-color);
            padding: 6px 16px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .news-title {
            font-weight: 800;
            color: var(--dark-text);
            font-size: 2.8rem;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .news-meta {
            font-size: 0.95rem;
            color: #888;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .news-body {
            max-width: 800px;
            margin: 0 auto;
            font-family: 'Lora', serif; /* Font serif untuk bacaan panjang agar elegan */
            font-size: 1.2rem;
            color: #333;
            text-align: justify;
        }

        /* Back Button Floating */
        .btn-back-floating {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background: white;
            color: var(--dark-text);
            padding: 12px 24px;
            border-radius: 50px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            text-decoration: none;
            font-weight: 600;
            z-index: 1000;
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }

        .btn-back-floating:hover {
            transform: translateY(-5px);
            background: var(--primary-color);
            color: white;
        }

        /* Share Section */
        .share-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border-top: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        @media (max-width: 768px) {
            .news-title { font-size: 2rem; }
            .news-body { font-size: 1.1rem; }
            .btn-back-floating { display: none; } /* Sembunyikan tombol melayang di HP */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-minimal fixed-top">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand fw-bold text-dark" href="/">
                <i class="bi bi-geo-alt-fill text-danger me-2"></i>Desa Sidomulyo
            </a>
            
    </nav>

    <main class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <header class="news-header">
                    <span class="category-tag">Berita Terkini</span>
                    <h1 class="news-title">{{ $berita->nama_berita }}</h1>
                    <div class="news-meta">
                        <span><i class="bi bi-calendar3 me-2"></i>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
                        <span><i class="bi bi-person-circle me-2"></i>Admin Desa</span>
                    </div>
                </header>

                <div class="news-hero-wrapper mb-5">
                    @if($berita->gambar_berita)
                        <img src="{{ asset('storage/' . $berita->gambar_berita) }}" class="news-hero-img" alt="{{ $berita->nama_berita }}">
                    @else
                        <img src="{{ asset('storage/uploads/berita/template.png') }}" class="news-hero-img" alt="Default image">
                    @endif
                </div>

                <article class="news-body">
                    {!! nl2br(e($berita->isi_berita)) !!}
                </article>

                <div class="share-container">
                    <div class="fw-bold">Bagikan Berita:</div>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light rounded-circle shadow-sm text-success"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="btn btn-light rounded-circle shadow-sm text-primary"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-light rounded-circle shadow-sm text-dark"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @auth('warga')   
    <a href="{{ route('index') }}#recent-posts" class="btn-back-floating">
        <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
    </a>
    @endauth

    @auth('admin')
        <a href="{{ route('berita.detailAdmin', $berita->slug) }}" class="btn-back-floating">
        <i class="bi bi-arrow-left me-2"></i> Kembali ke menu admin
    </a>
    @endauth

    <footer class="py-5 bg-white border-top">
        <div class="container text-center">
            <p class="text-muted small mb-0">&copy; {{ date('Y') }} Pemerintah Desa Sidomulyo. Dikelola oleh Tim Digital Desa.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
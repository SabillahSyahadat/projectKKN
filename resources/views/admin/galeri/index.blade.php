<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <div class="container py-5 page-wrapper">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 animate-header">
            <div class="header-text">
                <h2 class="fw-800 text-dark mb-1 tracking-tight">Galeri Dokumentasi</h2>
                <p class="text-secondary mb-0">Arsip visual kegiatan Desa Sidomulyo</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('admin.galeri.create') }}" class="btn btn-dark rounded-pill px-4 py-2 btn-add-custom shadow-sm">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Foto
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-custom slide-in-top mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check2-circle fs-4 me-3 text-success"></i>
                    <div>{{ session('success') }}</div>
                </div>
            </div>
        @endif

        <div class="row g-4 pt-2">
            @forelse($galeries as $index => $item)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card-entrance" style="animation-delay: {{ ($index + 1) * 0.1 }}s">
                        <div class="card h-100 gallery-card-premium">
                            
                            <div class="category-tag">
                                {{ $item->kategori }}
                            </div>

                            <div class="img-wrapper">
                                <img src="{{ asset('storage/galeri/' . $item->gambar) }}" 
                                     class="img-main" alt="{{ $item->judul }}">
                                <div class="img-overlay"></div>
                            </div>

                            <div class="card-body p-4">
                                <h6 class="fw-bold text-dark mb-2 text-limit-1">{{ $item->judul }}</h6>
                                <p class="text-muted small mb-4 text-limit-2">
                                    {{ $item->keterangan ?? 'Tidak ada deskripsi tambahan.' }}
                                </p>

                                <div class="d-flex align-items-center justify-content-between pt-2 border-top-dashed">
                                    <a href="#" class="btn-action-edit" title="Edit">
                                        <i class="bi bi-pencil-square"></i> <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action-delete" onclick="return confirm('Hapus foto ini?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 empty-state">
                    <img src="https://illustrations.popsy.co/gray/fogg-uploading-1.png" alt="Empty" style="width: 200px;" class="mb-4">
                    <h5 class="text-muted">Belum ada koleksi foto</h5>
                </div>
            @endforelse
        </div>
        
        <div class="mt-5 d-flex justify-content-center">
            {{ $galeries->links() }}
        </div>
    </div>

    <style>
        /* BASE & TYPOGRAPHY */
        .page-wrapper { font-family: 'Inter', sans-serif; }
        .fw-800 { font-weight: 800; letter-spacing: -0.02em; }
        .tracking-tight { letter-spacing: -0.03em; }

        /* ANIMATIONS */
        @keyframes revealUp {
            0% { opacity: 0; transform: translateY(40px) scale(0.98); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes slideInTop {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-header { animation: revealUp 0.8s cubic-bezier(0.2, 1, 0.3, 1); }
        .card-entrance { 
            opacity: 0; 
            animation: revealUp 0.7s cubic-bezier(0.2, 1, 0.3, 1) forwards; 
        }
        .slide-in-top { animation: slideInTop 0.5s ease-out; }

        /* CARD STYLE */
        .gallery-card-premium {
            border: 1px solid #f1f3f5;
            background: #ffffff;
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }

        .gallery-card-premium:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            border-color: #e9ecef;
        }

        /* IMAGE HANDLING */
        .img-wrapper {
            position: relative;
            height: 190px;
            margin: 10px;
            overflow: hidden;
            border-radius: 14px;
        }

        .img-main {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .gallery-card-premium:hover .img-main {
            transform: scale(1.1);
        }

        /* OVERLAYS & TAGS */
        .category-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 5;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(4px);
            padding: 5px 14px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        /* ACTIONS */
        .border-top-dashed {
            border-top: 1px dashed #edf2f7;
        }

        .btn-action-edit {
            text-decoration: none;
            color: #4f46e5;
            font-size: 0.85rem;
            font-weight: 600;
            transition: color 0.2s;
        }

        .btn-action-edit:hover { color: #3730a3; }

        .btn-action-delete {
            border: none;
            background: #fff5f5;
            color: #f87171;
            padding: 8px 10px;
            border-radius: 10px;
            transition: all 0.2s;
        }

        .btn-action-delete:hover {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-add-custom {
            background: #111827;
            border: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-add-custom:hover {
            background: #374151;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.2);
        }

        /* TEXT LIMITER */
        .text-limit-1 { overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; }
        .text-limit-2 { overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; min-height: 40px; }

        .alert-custom {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 14px;
        }
    </style>
</x-layout>
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <div class="container py-5 page-wrapper">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 animate-header">
            <div class="header-text">
                <h2 class="fw-800 text-dark mb-1 tracking-tight">Struktur Organisasi</h2>
                <p class="text-secondary mb-0">Kelola data pejabat dan staf Pemerintah Desa Sidomulyo</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('admin.tambah.perangkat') }}" class="btn btn-dark rounded-pill px-4 py-2 shadow-sm hover-lift">
                    <i class="bi bi-person-plus-fill me-2"></i>Tambah Perangkat
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-custom-success slide-in-top mb-4">
                <i class="bi bi-check2-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            @forelse($perangkat as $index => $staff)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card-entrance" style="animation-delay: {{ ($index + 1) * 0.1 }}s">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden profile-card">
                            
                            <div class="profile-img-container position-relative">
                                <img src="{{ $staff->foto ? asset('storage/' . $staff->foto) : 'https://ui-avatars.com/api/?name='.urlencode($staff->nama).'&background=f3f4f6&color=111827&size=512' }}" 
                                     class="card-img-top profile-img" 
                                     alt="{{ $staff->nama }}">
                                
                                <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-gradient-dark">
                                    <span class="badge bg-primary rounded-pill px-3">{{ $staff->jabatan }}</span>
                                </div>
                            </div>

                            <div class="card-body p-4 text-center">
                                <h6 class="fw-800 text-dark mb-1">{{ $staff->nama }}</h6>
                                <p class="text-muted small mb-3">NIP: {{ $staff->nip ?? '-' }}</p>
                                
                                <div class="d-flex justify-content-center gap-2 pt-3 border-top">
                                    <a href="{{ route('showPerangkat', $staff->id) }}" class="btn btn-sm btn-light rounded-pill px-3 border" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-light rounded-pill px-3 border text-primary" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state">
                        <i class="bi bi-people display-1 text-light"></i>
                        <p class="text-muted mt-3">Belum ada data perangkat desa.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        .page-wrapper { font-family: 'Inter', sans-serif; }
        .fw-800 { font-weight: 800; }
        
        /* Animasi */
        @keyframes revealUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-header { animation: revealUp 0.6s ease-out; }
        .card-entrance { opacity: 0; animation: revealUp 0.6s ease-out forwards; }

        /* Profile Card Styling */
        .profile-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #f1f3f5 !important;
        }
        .profile-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1) !important;
        }

        .profile-img-container {
            height: 300px;
            overflow: hidden;
            background-color: #f8f9fa;
        }
        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .profile-card:hover .profile-img {
            transform: scale(1.05);
        }

        /* Gradient overlay di foto agar teks badge terbaca */
        .bg-gradient-dark {
            background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
        }

        .alert-custom-success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 1rem;
            border-radius: 12px;
        }

        .hover-lift {
            transition: transform 0.2s;
        }
        .hover-lift:hover { transform: translateY(-2px); }
    </style>
</x-layout>
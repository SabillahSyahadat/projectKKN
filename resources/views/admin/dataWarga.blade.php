<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <div class="container py-5 page-wrapper animate-reveal">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
            <div class="header-text">
                <h2 class="fw-800 text-dark mb-1 tracking-tight">Data Warga</h2>
                <p class="text-secondary mb-0">Manajemen database warga Desa Kepudibener</p>
            </div>
            <div class="mt-3 mt-md-0 d-flex gap-2">
                <a href="{{ route('admin.tambahWarga') }}" class="btn btn-dark rounded-pill px-4 shadow-sm fw-semibold">
                    <i class="bi bi-person-plus-fill me-2"></i>Tambah Warga
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4 animate-reveal" role="alert" style="border-radius: 16px; background-color: #ecfdf5; color: #065f46;">
                <div class="d-flex align-items-center py-1">
                    <i class="bi bi-check-circle-fill me-3 fs-4" style="color: #10b981;"></i>
                    <div>
                        <h6 class="fw-bold mb-1" style="color: #065f46;">Berhasil!</h6>
                        <span class="small">{{ session('success') }}</span>
                    </div>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close" style="top: 15px;"></button>
            </div>
        @endif

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                    <small class="text-muted d-block mb-1">Total Warga</small>
                    <h4 class="fw-bold mb-0">{{ $wargas->count() }}</h4>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-lg-soft rounded-4 overflow-hidden">
            <div class="card-header bg-white border-0 py-3 px-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="fw-bold mb-0">Daftar Warga</h5>
                    </div>
                    <div class="col-md-4">
                        <form action="" method="GET">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-search"></i></span>
                                <input type="text" name="search" class="form-control bg-light border-0 shadow-none" placeholder="Cari NIK atau Nama...">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 border-0 text-secondary small text-uppercase fw-bold">Warga</th>
                            <th class="border-0 text-secondary small text-uppercase fw-bold">NIK</th>
                            <th class="border-0 text-secondary small text-uppercase fw-bold text-center">L/P</th>
                            <th class="border-0 text-secondary small text-uppercase fw-bold">Pekerjaan</th>
                            <th class="border-0 text-secondary small text-uppercase fw-bold">Alamat</th>
                            <th class="border-0 text-secondary small text-uppercase fw-bold text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($wargas as $warga)
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        {{ substr($warga->nama_warga, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $warga->nama_warga }}</div>
                                        <div class="text-muted small">{{ $warga->alamat }}, {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border fw-normal">{{ $warga->nik }}</span></td>
                            <td class="text-center">
                                <span class="badge {{ $warga->jenis_kelamin == 'L' ? 'bg-info-subtle text-info' : 'bg-danger-subtle text-danger' }} rounded-pill px-3">
                                    {{ $warga->jenis_kelamin == 'L' ? 'L' : 'Belum Di Update' }}
                                </span>
                            </td>
                            <td class="small text-secondary">{{ $warga->pekerjaan }}</td>
                            <td class="small text-muted" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $warga->alamat }}
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm rounded-3 overflow-hidden">
                                    <a href="{{ route('admin.showWarga', $warga->id) }}" class="btn btn-white btn-sm px-3" title="Detail"><i class="bi bi-eye text-primary"></i></a>
                                    <!-- KODE BENAR -->
                                <form action="{{ route('admin.deleteWarga', $warga->id) }}" method="POST" class="d-inline">
                                    {{-- Wajib ada CSRF token untuk keamanan --}}
                                    @csrf 
                                    
                                    {{-- Ini trik Laravel agar form mengirimkan request DELETE --}}
                                    @method('DELETE') 
                                    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data warga ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">Data warga tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer bg-white border-0 py-3 px-4">
                <div class="d-flex justify-content-center">
                    {{ $wargas->links() }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .page-wrapper { font-family: 'Inter', sans-serif; }
        .fw-800 { font-weight: 800; letter-spacing: -0.02em; }
        .shadow-lg-soft { box-shadow: 0 10px 30px rgba(0,0,0,0.04); }
        
        .animate-reveal { animation: revealUp 0.6s ease-out; }
        @keyframes revealUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table thead th { font-size: 0.75rem; padding: 15px 10px; }
        .table tbody td { font-size: 0.9rem; border-color: #f8f9fa; }
        
        .btn-white { background: white; border: 1px solid #eee; }
        .btn-white:hover { background: #f8f9fa; }

        .bg-primary-subtle { background-color: #e0e7ff !important; }
        .bg-info-subtle { background-color: #e0f2fe !important; }
        .bg-danger-subtle { background-color: #fee2e2 !important; }
    </style>
</x-layout>
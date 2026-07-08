<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <div class="container-fluid py-5 page-content">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5" data-aos="fade-down">
            <div>
                <h2 class="fw-800 text-dark mb-1 tracking-tight">Aspirasi <span class="text-danger">Warga</span></h2>
                <p class="text-muted mb-0">Dengarkan kritik dan saran untuk kemajuan Desa Sidomulyo.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <div class="stats-badge d-flex align-items-center gap-3">
                    <div class="icon-circle">
                        <i class="bi bi-chat-left-heart-fill"></i>
                    </div>
                    <div>
                        <span class="d-block fw-800 fs-4 leading-none">{{ $pesans->count() }}</span>
                        <span class="text-muted small text-uppercase fw-bold tracking-wider">Total Aspirasi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card main-card border-0 shadow-soft" data-aos="fade-up" data-aos-delay="200">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4 py-4 text-uppercase tracking-widest text-muted fw-bold small">Pengirim</th>
                                <th class="py-4 text-uppercase tracking-widest text-muted fw-bold small">Kontak</th>
                                <th class="py-4 text-uppercase tracking-widest text-muted fw-bold small">Isi Aspirasi</th>
                                <th class="py-4 text-uppercase tracking-widest text-muted fw-bold small">Waktu</th>
                                <th class="py-4 text-uppercase tracking-widest text-muted fw-bold small text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesans as $index => $pesan)
                                <tr class="table-row" data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 50) }}">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-box me-3">
                                                {{ strtoupper(substr($pesan->nama, 0, 1)) }}
                                            </div>
                                            <div>
                                                <span class="fw-700 text-dark d-block">{{ $pesan->nama }}</span>
                                                <span class="text-muted small">Warga Desa</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contact-pill">
                                            <i class="bi bi-envelope-fill me-2 text-danger"></i>
                                            {{ $pesan->email }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="message-bubble">
                                            {{ $pesan->pesan }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="time-box">
                                            <span class="d-block text-dark fw-600 mb-1">{{ $pesan->created_at->diffForHumans() }}</span>
                                            <span class="text-muted x-small uppercase tracking-tighter">{{ $pesan->created_at->translatedFormat('d M Y, H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center pe-4">
                                        <form action="{{ route('admin.kritik.destroy', $pesan->id) }}" method="POST" onsubmit="return confirm('Hapus aspirasi ini secara permanen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete shadow-sm">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="py-5 animate-pulse">
                                            <i class="bi bi-chat-dots display-3 text-light-gray mb-3 d-block"></i>
                                            <p class="text-muted fw-medium">Belum ada aspirasi yang masuk saat ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --jakarta: 'Plus Jakarta Sans', sans-serif;
        }

        .page-content { font-family: var(--jakarta); }
        .fw-800 { font-weight: 800; }
        .fw-700 { font-weight: 700; }
        .fw-600 { font-weight: 600; }
        .tracking-tight { letter-spacing: -0.03em; }
        .tracking-wider { letter-spacing: 0.05em; }

        /* Stats Badge */
        .stats-badge {
            background: white;
            padding: 12px 24px;
            border-radius: 20px;
            border: 1px solid #f1f5f9;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.02);
        }
        .icon-circle {
            width: 48px;
            height: 48px;
            background: #fff1f2;
            color: #e11d48;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Card & Table */
        .main-card { border-radius: 24px; background: white; overflow: hidden; }
        .shadow-soft { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.04); }
        
        .table thead th { 
            background: #fafafa;
            border: none;
            padding: 20px 10px;
        }
        
        .table-row { transition: all 0.3s ease; }
        .table-row:hover { background-color: #fdfdfd; transform: scale(1.002); }

        /* Custom Elements */
        .avatar-box {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #ef4444, #b91c1c);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.2);
        }

        .contact-pill {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            background: #f8fafc;
            border-radius: 10px;
            font-size: 0.85rem;
            color: #475569;
            font-weight: 500;
        }

        .message-bubble {
            font-size: 0.9rem;
            line-height: 1.6;
            color: #64748b;
            max-width: 450px;
            padding: 10px;
        }

        .btn-delete {
            width: 38px;
            height: 38px;
            background: #fef2f2;
            color: #ef4444;
            border: none;
            border-radius: 10px;
            transition: all 0.2s;
        }
        .btn-delete:hover {
            background: #ef4444;
            color: white;
            transform: rotate(8deg);
        }

        .text-light-gray { color: #e2e8f0; }
        .animate-pulse { animation: pulse 2s infinite; }
        @keyframes pulse {
            0% { opacity: 0.6; }
            50% { opacity: 1; }
            100% { opacity: 0.6; }
        }
    </style>
</x-layout>
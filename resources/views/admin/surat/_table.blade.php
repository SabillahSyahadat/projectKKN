<div class="card border-0 shadow-soft rounded-4 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="bg-light">
                    <th class="ps-4 py-4 text-uppercase tracking-wider text-muted fw-bold small">Pemohon</th>
                    <th class="py-4 text-uppercase tracking-wider text-muted fw-bold small">Identitas</th>
                    <th class="py-4 text-uppercase tracking-wider text-muted fw-bold small">Keperluan</th>
                    <th class="py-4 text-uppercase tracking-wider text-muted fw-bold small text-center">Status</th>
                    <th class="py-4 text-uppercase tracking-wider text-muted fw-bold small text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($surats as $index => $item)
                <tr data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 50) }}">
                    <td class="ps-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-3 d-flex align-items-center justify-content-center fw-bold bg-indigo-subtle text-indigo rounded-circle" style="width: 40px; height: 40px;">
                                {{ strtoupper(substr($item->warga->nama_warga, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-bold text-dark">{{ $item->warga->nama_warga }}</div>
                                <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $item->created_at->translatedFormat('d M, H:i') }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border font-monospace px-2 py-1">{{ $item->warga->nik }}</span>
                    </td>
                    <td>
                        <div class="text-dark small text-truncate" style="max-width: 250px;" title="{{ $item->keperluan }}">
                            {{ $item->keperluan }}
                        </div>
                    </td>
                    <td class="text-center">
                        @if($item->status == 'pending')
                            <span class="status-badge warning">Menunggu</span>
                        @elseif($item->status == 'disetujui')
                            <span class="status-badge success">Disetujui</span>
                        @else
                            <span class="status-badge danger">Ditolak</span>
                        @endif
                    </td>
                    <td class="text-center pe-4">
                        @if($item->status == 'pending')
                        <div class="d-flex justify-content-center gap-2">
                            <form action="{{ route('admin.surat.setujui', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-action btn-acc shadow-sm" onclick="return confirm('Setujui pengajuan ini?')">
                                    <i class="bi bi-check-circle-fill me-1"></i> Terima
                                </button>
                            </form>
                            <form action="{{ route('admin.surat.tolak', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-action btn-reject shadow-sm" onclick="return confirm('Tolak pengajuan ini?')">
                                    <i class="bi bi-x-circle-fill me-1"></i> Tolak
                                </button>
                            </form>
                        </div>
                        @else
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <form action="{{ route('surat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus riwayat ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete-soft">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            <span class="text-muted small">Selesai direspon</span>
                        </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <div class="py-5">
                            <i class="bi bi-file-earmark-x display-1 text-light"></i>
                            <p class="mt-3 text-muted">Belum ada antrean pengajuan surat.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .shadow-soft { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.04); }
    .bg-indigo-subtle { background-color: #e0e7ff; }
    
    /* Status Badges */
    .status-badge {
        padding: 6px 16px;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    .status-badge.warning { background: #fffbeb; color: #92400e; }
    .status-badge.success { background: #f0fdf4; color: #166534; }
    .status-badge.danger { background: #fef2f2; color: #991b1b; }

    /* Action Buttons */
    .btn-action {
        border-radius: 10px;
        padding: 6px 14px;
        font-size: 0.85rem;
        font-weight: 600;
        border: none;
        transition: 0.3s;
    }
    .btn-acc { background: #4f46e5; color: white; }
    .btn-acc:hover { background: #4338ca; transform: translateY(-2px); }
    
    .btn-reject { background: #f8fafc; color: #ef4444; border: 1px solid #fee2e2; }
    .btn-reject:hover { background: #ef4444; color: white; transform: translateY(-2px); }

    .btn-delete-soft {
        background: transparent;
        color: #cbd5e1;
        border: none;
        font-size: 1.1rem;
        transition: 0.2s;
    }
    .btn-delete-soft:hover { color: #ef4444; }
</style>
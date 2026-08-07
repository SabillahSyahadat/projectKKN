@extends('warga.layout')

@section('title', 'Riwayat Pengajuan Surat - Desa Sidomulyo')

@section('custom-css')
    /* --- Stats Cards --- */
    .card-stats { border: none; border-radius: 20px; background: #fff; box-shadow: var(--soft-shadow); transition: transform 0.3s ease; border-bottom: 4px solid transparent; }
    .card-stats:hover { transform: translateY(-5px); }
    .stats-total { border-bottom-color: #3b82f6; }
    .stats-success { border-bottom-color: #22c55e; }
    .stats-pending { border-bottom-color: #f59e0b; }

    .icon-shape { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }

    /* --- Validation Alert --- */
    .alert-validasi {
      background: #ffffff;
      border: none;
      border-left: 5px solid #22c55e;
      border-radius: 15px;
      box-shadow: var(--soft-shadow);
      color: var(--text-main);
      padding: 20px;
    }

    /* --- Table Styling --- */
    .main-card { border: none; border-radius: 24px; box-shadow: var(--soft-shadow); background: #fff; overflow: hidden; }
    .table thead th { background: #f8fafc; padding: 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #94a3b8; border: none; }
    .table tbody td { padding: 20px; vertical-align: middle; border-bottom: 1px solid #f1f5f9; }

    /* --- Status Pills --- */
    .status-pill { padding: 6px 12px; border-radius: 10px; font-weight: 700; font-size: 0.75rem; display: inline-flex; align-items: center; gap: 6px; }
    .pill-pending { background: #fff7ed; color: #ea580c; }
    .pill-success { background: #f0fdf4; color: #16a34a; }
    .pill-danger { background: #fef2f2; color: #dc2626; }

    .btn-unduh { background: var(--primary-gradient); border: none; font-weight: 600; border-radius: 10px; padding: 8px 16px; font-size: 0.85rem; color: white; }
@endsection

@section('content')
      @if(session('validasi'))
      <div class="alert alert-dismissible fade show alert-validasi mb-4" role="alert" data-aos="zoom-in">
        <div class="d-flex align-items-center">
          <div class="icon-shape bg-success bg-opacity-10 text-success me-3">
            <i class="bi bi-check-circle-fill"></i>
          </div>
          <div>
            <h6 class="fw-800 mb-0">Berhasil!</h6>
            <span class="small text-muted">{{ session('validasi') }}</span>
          </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="top: 20px; right: 20px;"></button>
      </div>
      @endif

      <div class="row mb-4 align-items-center" data-aos="fade-down">
        <div class="col-md-7">
          <h2 class="fw-bold mb-1">Riwayat Pengajuan Surat</h2>
          <p class="text-muted">Kelola dan pantau status administrasi Anda.</p>
        </div>
        <div class="col-md-5 text-md-end">
          <a href="{{ route('pilihSurat') }}" class="btn px-4 py-2 fw-bold rounded-pill shadow-sm" style="background: var(--primary-gradient); color: white; border:none;">
            <i class="bi bi-plus-lg me-2"></i> Buat Pengajuan
          </a>
        </div>
      </div>

      <div class="row g-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="col-md-4">
          <div class="card card-stats stats-total p-4">
            <div class="d-flex align-items-center">
              <div class="icon-shape bg-primary bg-opacity-10 text-primary me-3">
                <i class="bi bi-file-earmark-text"></i>
              </div>
              <div>
                <p class="text-muted small fw-bold mb-0">TOTAL PENGAJUAN</p>
                <h3 class="fw-bold mb-0">{{ $surats->count() }}</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-stats stats-success p-4">
            <div class="d-flex align-items-center">
              <div class="icon-shape bg-success bg-opacity-10 text-success me-3">
                <i class="bi bi-check2-circle"></i>
              </div>
              <div>
                <p class="text-muted small fw-bold mb-0">SURAT SELESAI</p>
                <h3 class="fw-bold mb-0">{{ $surats->where('status', 'disetujui')->count() }}</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-stats stats-pending p-4">
            <div class="d-flex align-items-center">
              <div class="icon-shape bg-warning bg-opacity-10 text-warning me-3">
                <i class="bi bi-hourglass-split"></i>
              </div>
              <div>
                <p class="text-muted small fw-bold mb-0">SEDANG DIPROSES</p>
                <h3 class="fw-bold mb-0">{{ $surats->where('status', 'pending')->count() }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card main-card" data-aos="fade-up" data-aos-delay="200">
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead>
              <tr>
                <th class="ps-4">Jenis Surat & Keperluan</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($surats as $surat)
              <tr>
                <td class="ps-4">
                  <div class="d-flex align-items-center">
                    <div class="bg-light rounded-3 p-2 me-3 text-secondary">
                      <i class="bi bi-file-earmark-richtext fs-5"></i>
                    </div>
                    <div>
                      <div class="fw-bold text-dark">{{ $surat->jenis_surat }}</div>
                      <div class="text-muted small" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $surat->keperluan }}
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="fw-bold">{{ $surat->created_at->translatedFormat('d M Y') }}</div>
                  <div class="text-muted small">{{ $surat->created_at->diffForHumans() }}</div>
                </td>
                <td>
                  @if($surat->status == 'pending')
                    <span class="status-pill pill-pending">
                      <span class="spinner-border spinner-border-sm" role="status"></span> Menunggu
                    </span>
                  @elseif($surat->status == 'disetujui')
                    <span class="status-pill pill-success">
                      <i class="bi bi-check-circle-fill"></i> Selesai
                    </span>
                  @else
                    <span class="status-pill pill-danger" data-bs-toggle="tooltip" title="{{ $surat->keterangan_admin }}">
                      <i class="bi bi-x-circle-fill"></i> Ditolak
                    </span>
                  @endif
                </td>
                <td class="text-center">
                  @if($surat->status == 'disetujui')
                    <a href="{{ route('cetak.surat', $surat->id) }}" target="_blank" class="btn btn-unduh">
                      <i class="bi bi-download me-1"></i> PDF
                    </a>
                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-link text-danger text-decoration-none fw-bold small" onclick="return confirm('Hapus pengajuan ini?')">
                        Hapus
                      </button>
                    </form>
                    
                  @elseif($surat->status == 'pending')
                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-link text-danger text-decoration-none fw-bold small" onclick="return confirm('Batalkan pengajuan ini?')">
                        Batal
                      </button>
                    </form>
                  @else
                    <span class="text-muted small">Tidak ada aksi</span>
                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-link text-danger text-decoration-none fw-bold small" onclick="return confirm('Hapus pengajuan ini?')">
                        Hapus
                      </button>
                    </form>
                  @endif
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center py-5">
                  <i class="bi bi-inbox text-light-emphasis d-block mb-3" style="font-size: 3rem;"></i>
                  <p class="text-muted fw-medium">Belum ada riwayat pengajuan surat.</p>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
@endsection

@section('custom-js')
  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (el) { return new bootstrap.Tooltip(el) });
  </script>
@endsection
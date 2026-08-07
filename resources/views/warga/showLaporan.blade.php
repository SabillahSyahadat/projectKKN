@extends('warga.layout')

@section('title', 'Riwayat Laporan - Desa Sidomulyo')

@section('custom-css')
    .main-card {
      border: none;
      border-radius: 24px;
      box-shadow: var(--soft-shadow);
      background: #fff;
      overflow: hidden;
    }

    .table thead th {
      background: #f8fafc;
      padding: 20px;
      font-size: 0.75rem;
      text-transform: uppercase;
      color: #94a3b8;
      border: none;
    }

    .table tbody td { padding: 20px; vertical-align: middle; border-bottom: 1px solid #f1f5f9; }

    .status-pill {
      padding: 6px 12px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 0.75rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .pill-pending { background: #fff7ed; color: #ea580c; }
    .pill-proses { background: #eff6ff; color: #2563eb; }
    .pill-selesai { background: #f0fdf4; color: #16a34a; }
@endsection

@section('content')
      <div class="row mb-4 align-items-center" data-aos="fade-down">
        <div class="col-md-7">
          <h2 class="fw-bold mb-1">Riwayat Laporan</h2>
          <p class="text-muted">Daftar laporan pengaduan yang Anda kirimkan berdasarkan NIK.</p>
        </div>
        <div class="col-md-5 text-md-end">
          <a href="{{route('laporan')}}" class="btn px-4 py-2 fw-bold rounded-pill shadow-sm" style="background: var(--primary-gradient); color: white; border:none;">
            <i class="bi bi-megaphone me-2"></i> Buat Laporan
          </a>
        </div>
      </div>

      <div class="card main-card" data-aos="fade-up">
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead>
              <tr>
                <th class="ps-4">Isi Laporan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($laporans as $laporan)
              <tr>
                <td class="ps-4">
                  <div class="fw-bold text-dark mb-1">ID #{{ $laporan->id }}</div>
                  <div class="text-muted small" style="max-width: 400px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                    {{ $laporan->isi_laporan }}
                  </div>
                </td>
                <td>
                  <div class="fw-bold">{{ $laporan->created_at->translatedFormat('d M Y') }}</div>
                  <div class="text-muted small">{{ $laporan->created_at->diffForHumans() }}</div>
                </td>
                <td>
                  @if($laporan->status == '0')
                    <span class="status-pill pill-pending">Menunggu</span>
                  @elseif($laporan->status == 'proses')
                    <span class="status-pill pill-proses">Diproses</span>
                  @else
                    <span class="status-pill pill-selesai">Selesai</span>
                  @endif
                </td>
                <td class="text-center">
                  <button class="btn btn-light btn-sm rounded-pill px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $laporan->id }}">
                    Detail
                  </button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center py-5">
                  <i class="bi bi-inbox text-muted d-block mb-3" style="font-size: 3rem;"></i>
                  <p class="text-muted fw-medium">Belum ada laporan yang dibuat.</p>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
@endsection
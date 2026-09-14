{{-- Sesuaikan 'warga' dengan path/nama file layout Anda. Misalnya: 'layouts.warga' --}}
@extends('warga.layout')

@section('title', 'Buat Laporan - Desa Sidomulyo')

@section('custom-css')
<!-- Animate.css khusus untuk halaman ini -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
  :root {
    --primary-red: #dc3545;
    --primary-gradient: linear-gradient(135deg, #dc3545, #b22727);
    --dark-slate: #1e293b;
    --accent-indigo: #6366f1;
  }

  /* --- REPORT CARD STYLES --- */
  .card-report {
    border: none;
    border-radius: 25px;
    background: #ffffff;
    box-shadow: 0 20px 40px rgba(0,0,0,0.05);
    overflow: hidden;
    max-width: 800px;
    margin: 0 auto;
  }

  .card-header-report {
    background: var(--dark-slate);
    padding: 30px;
    text-align: center;
    color: white;
  }

  .alert-pelapor {
    background-color: #f1f5f9;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
    padding: 15px 20px;
  }

  .badge-nik {
    background: var(--accent-indigo);
    color: white;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 700;
  }

  .form-label {
    font-size: 0.8rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-muted);
    margin-bottom: 8px;
  }

  .form-control {
    border-radius: 15px;
    padding: 12px 18px;
    border: 2px solid #f1f5f9;
    background-color: #f8fafc;
    transition: all 0.3s;
  }

  .form-control:focus {
    border-color: var(--primary-red);
    background-color: #fff;
    box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1);
  }

  /* --- STYLING BUTTON (Mencegah tulisan/icon hilang) --- */
  .btn-submit-report {
    display: flex !important;
    justify-content: center;
    align-items: center;
    background: var(--primary-gradient) !important;
    color: #ffffff !important;
    border-radius: 15px;
    padding: 15px;
    font-weight: 700;
    border: none;
    transition: all 0.3s ease;
    width: 100%;
  }

  .btn-submit-report i {
    color: #ffffff !important;
  }

  .btn-submit-report:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(220, 53, 69, 0.2);
    color: #ffffff !important;
  }
</style>
@endsection

@section('content')
<div class="container py-4" data-aos="fade-up">
  
  <!-- Notifikasi Sukses -->
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4 animate__animated animate__fadeInDown" role="alert" style="border-radius: 15px;">
      <i class="bi bi-check2-all me-2"></i> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <!-- Header Section -->
  <div class="text-center mb-5">
    <h2 class="fw-800" style="color: var(--dark-slate);">Pusat Aduan Warga</h2>
    <div class="mx-auto mt-2" style="width: 50px; height: 4px; background: var(--primary-red); border-radius: 2px;"></div>
    <p class="text-muted mt-3 small text-uppercase fw-bold" style="letter-spacing: 2px;">Transparansi & Solusi Untuk Sidomulyo</p>
  </div>

  <!-- Form Pengaduan -->
  <div class="card card-report animate__animated animate__zoomIn">
    <div class="card-header-report">
      <span class="fw-bold"><i class="bi bi-shield-lock me-2"></i> FORMULIR PENGADUAN DIGITAL</span>
    </div>
    
    <div class="card-body p-4 p-md-5">
      
      <!-- Info Pelapor -->
      <div class="alert-pelapor d-flex align-items-center mb-4">
        <div class="bg-white rounded-circle p-2 me-3 shadow-sm">
          <i class="bi bi-person-vcard fs-3 text-danger"></i>
        </div>
        <div class="flex-grow-1">
          <span class="d-block small text-muted fw-bold">NAMA PELAPOR</span>
          <span class="fw-800">{{ Auth::guard('warga')->user()->nama_warga }}</span>
        </div>
        <span class="badge-nik shadow-sm">{{ Auth::guard('warga')->user()->nik }}</span>
      </div>

      <!-- Form Input -->
      <form action="{{ route('submit.laporan') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
          <label class="form-label">Detail Pengaduan / Masalah</label>
          <textarea name="isi_laporan" class="form-control @error('isi_laporan') is-invalid @enderror" 
            rows="6" placeholder="Jelaskan kronologi atau detail aduan Anda secara lengkap...">{{ old('isi_laporan') }}</textarea>
          @error('isi_laporan')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label class="form-label">Bukti Foto (Opsional)</label>
          <div class="input-group">
            <span class="input-group-text bg-white border-end-0" style="border-radius: 15px 0 0 15px;"><i class="bi bi-camera text-muted"></i></span>
            <input type="file" name="foto_laporan" class="form-control border-start-0 @error('foto_laporan') is-invalid @enderror" style="border-radius: 0 15px 15px 0;">
          </div>
          <small class="text-muted mt-2 d-block px-1" style="font-size: 0.75rem;">Format: JPG, PNG. Ukuran maksimal 2MB.</small>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-grid gap-3 mt-5">
          <button type="submit" class="btn btn-submit-report">
            <i class="bi bi-send-check me-2"></i> KIRIM LAPORAN SEKARANG
          </button>
          <a href="{{ route('showLaporan')}}" class="btn btn-link text-decoration-none text-muted fw-bold small text-center">
            <i class="bi bi-arrow-left me-1"></i> Kembali
          </a>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer Info -->
  <p class="text-center mt-5 text-muted small">
    &copy; 2026 Pemerintah Desa Sidomulyo. <br>
    <span class="fw-bold">Privasi Terjamin:</span> Seluruh laporan Anda akan dijaga kerahasiaannya.
  </p>

</div>
@endsection
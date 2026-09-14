{{-- Sesuaikan 'warga' dengan path/nama file layout Anda. Misalnya: 'layouts.warga' --}}
@extends('warga.layout')

@section('title', 'Konfirmasi Pengajuan - Desa Sidomulyo')

@section('custom-css')
<style>
  :root {
    --primary-red: #dc3545;
    --primary-gradient: linear-gradient(135deg, #dc3545, #b22727);
    --dark-slate: #1e293b;
  }

  /* --- CONFIRMATION CARD STYLES --- */
  .card-confirm {
    border: none;
    border-radius: 35px;
    background: #ffffff;
    box-shadow: 0 20px 40px rgba(0,0,0,0.04);
    overflow: hidden;
    max-width: 600px;
    margin: 0 auto;
  }

  .card-header-confirm {
    background: var(--primary-gradient);
    padding: 30px;
    text-align: center;
    color: white;
  }

  .info-label { 
    font-size: 0.75rem; 
    color: #94a3b8; 
    text-transform: uppercase; 
    letter-spacing: 1.5px; 
    font-weight: 800; 
    margin-bottom: 4px; 
  }
  
  .info-value { 
    font-size: 1.05rem; 
    font-weight: 700; 
    color: var(--dark-slate); 
  }

  .badge-type {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(5px);
    color: white;
    padding: 10px 20px;
    border-radius: 15px;
    font-weight: 800;
    display: inline-block;
    border: 1px solid rgba(255,255,255,0.3);
  }

  .form-control {
    border-radius: 18px;
    padding: 15px;
    border: 2px solid #f1f5f9;
    background-color: #f8fafc;
    transition: all 0.3s;
  }

  .form-control:focus {
    border-color: var(--primary-red);
    background-color: #fff;
    box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1);
  }

  .btn-confirm {
    display: flex !important;
    justify-content: center;
    align-items: center;
    background: var(--primary-red) !important;
    color: #000000 !important; /* Memaksa warna teks menjadi putih */
    font-size: 1.05rem; /* Memberikan ukuran font yang pasti */
    border-radius: 20px;
    padding: 16px;
    font-weight: 800;
    border: none;
    transition: all 0.4s ease;
    box-shadow: 0 10px 20px rgba(220, 53, 69, 0.2);
    width: 100%;
    text-decoration: none;
  }


  .btn-confirm:hover {
    background: #b02a37;
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(220, 53, 69, 0.3);
    color: white;
  }

  .data-item {
    padding: 15px;
    border-radius: 20px;
    background: #fff;
    border: 1px solid #f1f5f9;
    margin-bottom: 12px;
  }

  .alert-custom {
    background-color: #fff8f8;
    border: 1px solid #fee2e2;
    border-radius: 20px;
    color: #991b1b;
    font-size: 0.8rem;
  }

  .fw-800 { font-weight: 800; }
</style>
@endsection

@section('content')
<div class="container py-4" data-aos="fade-up">
  
  <div class="card card-confirm">
    <!-- Header Kartu -->
    <div class="card-header-confirm">
      <div class="mb-2 small fw-bold text-uppercase" style="letter-spacing: 2px; opacity: 0.8;">Final Check</div>
      <h3 class="fw-800 mb-3">Konfirmasi Pengajuan</h3>
      <div class="badge-type">
        <i class="bi bi-file-earmark-text me-2"></i>{{ $jenis_surat }}
      </div>
    </div>

    <!-- Body Kartu (Formulir) -->
    <div class="card-body p-4 p-md-5">
      <form action="{{ route('simpan.pengajuan') }}" method="POST">
        @csrf
        <input type="hidden" name="jenis_surat" value="{{ $jenis_surat }}">

        <!-- Data Identitas -->
        <div class="mb-4">
          <h6 class="fw-800 mb-3 text-muted" style="font-size: 0.8rem; letter-spacing: 1px;">IDENTITAS PENGAJU</h6>
          
          <div class="data-item d-flex align-items-center">
            <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3">
              <i class="bi bi-person-fill text-danger"></i>
            </div>
            <div>
              <div class="info-label">Nama Lengkap</div>
              <div class="info-value">{{ Auth::guard('warga')->user()->nama_warga }}</div>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-md-6">
              <div class="data-item d-flex align-items-center">
                <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3">
                  <i class="bi bi-card-heading text-danger"></i>
                </div>
                <div>
                  <div class="info-label">NIK</div>
                  <div class="info-value">{{ Auth::guard('warga')->user()->nik }}</div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="data-item d-flex align-items-center">
                <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3">
                  <i class="bi bi-info-circle text-danger"></i>
                </div>
                <div>
                  <div class="info-label">Status</div>
                  <div class="info-value">{{ Auth::guard('warga')->user()->status ?? 'Aktif' }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Input Keperluan -->
        <div class="mb-4">
          <h6 class="fw-800 mb-3 text-muted" style="font-size: 0.8rem; letter-spacing: 1px;">DETAIL KEPERLUAN</h6>
          <textarea name="keperluan" class="form-control" rows="4" 
            placeholder="Contoh: Digunakan sebagai syarat administrasi pendaftaran beasiswa pendidikan." required></textarea>
          <div class="d-flex align-items-start mt-2 px-2">
            <i class="bi bi-info-circle text-danger me-2 small"></i>
            <small class="text-muted" style="font-size: 0.75rem;">Jelaskan keperluan Anda secara spesifik untuk mempercepat verifikasi.</small>
          </div>
        </div>

        <!-- Persetujuan -->
        <div class="alert alert-custom p-3 mb-4 d-flex align-items-center">
          <i class="bi bi-shield-check fs-4 me-3"></i>
          <div style="line-height: 1.5;">
            Dengan mengirimkan pengajuan ini, saya menyatakan bahwa data yang diberikan adalah benar dan sah.
          </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-grid gap-3">
          <button type="submit" class="btn btn-confirm">
            Kirim Pengajuan Sekarang <i class="bi bi-arrow-right-short fs-5 ms-1"></i>
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-link text-decoration-none text-muted fw-bold small">
            <i class="bi bi-x-circle me-1"></i> Batalkan & Kembali
          </a>
        </div>
      </form>
    </div>
  </div>

  <div class="text-center mt-4">
    <p class="text-muted small">Butuh bantuan? <a href="#" class="text-danger fw-bold">Hubungi Admin Desa</a></p>
  </div>

</div>
@endsection
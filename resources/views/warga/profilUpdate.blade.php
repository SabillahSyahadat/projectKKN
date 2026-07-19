<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Edit Profil - Desa Sidomulyo</title>

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    body { background-color: #f4f7f6; font-family: 'Poppins', sans-serif; }
    
    .profile-card { 
        border-radius: 20px; 
        border: none; 
        background: #ffffff;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(232, 69, 69, 0.15);
        border-color: #e84545;
        background-color: #fff;
    }

    .btn-save { 
        background: linear-gradient(45deg, #e84545, #c63232);
        border: none; 
        padding: 12px 35px; 
        border-radius: 50px; 
        color: #fff; 
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(232, 69, 69, 0.3);
    }

    .btn-save:hover { 
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 20px rgba(232, 69, 69, 0.4);
        color: #fff;
    }

    .btn-cancel {
        border-radius: 50px;
        padding: 12px 30px;
        transition: all 0.3s ease;
    }

    .form-label i {
        color: #e84545;
        font-size: 1.1rem;
    }

    .alert-animation {
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top shadow-sm" style="background: rgba(255,255,255,0.95);">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename" style="color: #333; font-weight: 700;">DESA KEPUDIBENER</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('/') }}#services">Layanan</a></li>
          <li><a href="{{ route('profil.show') }}" class="active">Profil Saya</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main" style="margin-top: 100px; padding-bottom: 50px;">

    <div class="container section-title" data-aos="fade-up">
      <h2 style="font-weight: 700; color: #333;">Perbarui Data Diri</h2>
      <p>Pastikan data Anda tetap akurat untuk mempermudah proses administrasi desa.</p>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          {{-- Notifikasi Sukses --}}
          @if (session('validasi'))
          <div class="alert alert-success alert-dismissible fade show alert-animation mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('validasi') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          {{-- Notifikasi Error Validasi Global --}}
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show alert-animation mb-4 shadow-sm" role="alert" style="border-radius: 12px;">
            <div class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i> Periksa kembali isian Anda:</div>
            <ul class="mb-0 small ps-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <div class="card profile-card shadow-lg" data-aos="zoom-in" data-aos-duration="800">
            <div class="card-body p-4 p-md-5">
              
              <form action="{{ route('profil.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row gy-4">
                  {{-- NIK (Read Only) --}}
                  <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                    <label class="form-label fw-bold"><i class="bi bi-card-heading me-2"></i>NIK</label>
                    <input type="text" class="form-control bg-light" value="{{ $warga->nik }}" readonly style="cursor: not-allowed;">
                    <div class="form-text text-muted small">NIK tidak dapat diubah secara mandiri.</div>
                  </div>

                  {{-- Nama --}}
                  <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                    <label class="form-label fw-bold"><i class="bi bi-person me-2"></i>Nama Lengkap</label>
                    <input type="text" name="nama_warga" class="form-control @error('nama_warga') is-invalid @enderror" value="{{ old('nama_warga', $warga->nama_warga) }}" required>
                    @error('nama_warga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Email --}}
                  `

                  {{-- Tanggal Lahir --}}
                  <div class="col-md-6" data-aos="fade-left" data-aos-delay="400">
                    <label class="form-label fw-bold"><i class="bi bi-calendar-event me-2"></i>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir', $warga->tgl_lahir) }}" required>
                    @error('tgl_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Jenis Kelamin --}}
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
                    <label class="form-label fw-bold"><i class="bi bi-gender-ambiguous me-2"></i>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                      <option value="L" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                      <option value="P" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Status Hubungan --}}
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
                    <label class="form-label fw-bold"><i class="bi bi-people me-2"></i>Status Hubungan</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="" disabled>-- Pilih Status --</option>
                        <option value="Kepala Keluarga" {{ old('status', $warga->status) == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                        <option value="Anggota Keluarga" {{ old('status', $warga->status) == 'Anggota Keluarga' ? 'selected' : '' }}>Anggota Keluarga</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Pekerjaan --}}
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="700">
                    <label class="form-label fw-bold"><i class="bi bi-briefcase me-2"></i>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan', $warga->pekerjaan) }}" required>
                    @error('pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Alamat --}}
                  <div class="col-md-12" data-aos="fade-up" data-aos-delay="800">
                    <label class="form-label fw-bold"><i class="bi bi-geo-alt me-2"></i>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat', $warga->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Ganti Password --}}
                  <div class="col-md-12 mt-4" data-aos="flip-up" data-aos-delay="900">
                    <div class="p-4 bg-light border-start border-danger border-5 rounded-3 shadow-sm">
                      <label class="form-label fw-bold text-danger"><i class="bi bi-shield-lock me-2"></i>Ganti Password</label>
                      <p class="small text-muted mb-3">Biarkan kosong jika Anda tidak ingin mengubah password akun.</p>
                      <input type="password" name="password_warga" class="form-control @error('password_warga') is-invalid @enderror" placeholder="Masukkan password baru jika perlu">
                      @error('password_warga')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  {{-- Tombol Aksi --}}
                  <div class="col-md-12 text-end mt-5" data-aos="fade-up" data-aos-offset="0">
                    <hr class="mb-4">
                    <a href="{{ route('profil.show') }}" class="btn btn-light btn-cancel px-4 me-2 shadow-sm">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-save shadow">
                        <i class="bi bi-cloud-arrow-up me-2"></i> Simpan Perubahan
                    </button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer id="footer" class="footer dark-background mt-auto">
    <div class="container text-center py-4">
      <p class="mb-0">&copy; 2026 <strong>Desa Sidomulyo</strong>. Keamanan data Anda prioritas kami.</p>
    </div>
  </footer>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    });
  </script>

</body>
</html>
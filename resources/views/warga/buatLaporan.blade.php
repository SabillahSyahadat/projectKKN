<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Buat Laporan - Desa Sidomulyo</title>

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    :root {
      --primary-red: #dc3545;
      --primary-gradient: linear-gradient(135deg, #dc3545, #b22727);
      --sidebar-width: 280px;
      --soft-bg: #f8fafc;
      --dark-slate: #1e293b;
      --text-muted: #64748b;
      --accent-indigo: #6366f1;
    }

    body {
      background-color: var(--soft-bg);
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--dark-slate);
      min-height: 100vh;
    }

    /* --- SIDEBAR STYLES --- */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: var(--sidebar-width);
      height: 100vh;
      background: #ffffff;
      border-right: 1px solid #f1f5f9;
      z-index: 1000;
      display: flex;
      flex-direction: column;
      transition: all 0.3s ease;
    }

    .sidebar-header { padding: 30px 20px; text-align: center; border-bottom: 1px solid #f1f5f9; }
    .sitename { color: var(--primary-red); font-weight: 800; font-size: 1.5rem; letter-spacing: -0.5px; margin: 0; }
    
    .sdm-nav { padding: 20px 15px; overflow-y: auto; flex-grow: 1; }
    .sdm-menu-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
    .sdm-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; color: var(--text-muted); font-weight: 600; font-size: 0.95rem; border-radius: 12px; text-decoration: none; transition: 0.3s; }
    .sdm-link:hover, .sdm-link.active { background: rgba(220, 53, 69, 0.1); color: var(--primary-red); }

    .sdm-dropdown .sdm-submenu { list-style: none; padding-left: 15px; margin-top: 5px; display: none; flex-direction: column; gap: 5px; }
    .sdm-dropdown.open .sdm-submenu { display: flex; }
    .sdm-dropdown.open .bi-chevron-down { transform: rotate(180deg); }
    .sdm-submenu a { display: block; padding: 10px 16px; color: var(--text-muted); text-decoration: none; font-size: 0.9rem; font-weight: 500; border-radius: 10px; }
    .sdm-submenu a:hover { color: var(--primary-red); background: #f8fafc; }
    
    .sdm-logout-btn { background: none; border: none; padding: 10px 16px; color: #ef4444; width: 100%; text-align: left; font-weight: 600; font-size: 0.9rem; }

    /* --- MAIN CONTENT AREA --- */
    .main-content {
      margin-left: var(--sidebar-width);
      padding: 40px;
      transition: all 0.3s ease;
    }

    .mobile-toggle {
      display: none;
      position: fixed;
      top: 15px;
      right: 15px;
      z-index: 1001;
      background: var(--primary-gradient);
      color: white;
      border: none;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    @media (max-width: 991px) {
      .sidebar { transform: translateX(-100%); }
      .sidebar.active { transform: translateX(0); }
      .main-content { margin-left: 0; padding: 80px 20px 40px; }
      .mobile-toggle { display: block; }
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

    .btn-submit-report {
      background: var(--primary-gradient);
      color: white;
      border-radius: 15px;
      padding: 15px;
      font-weight: 700;
      border: none;
      transition: 0.3s;
    }

    .btn-submit-report:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(220, 53, 69, 0.2);
      color: white;
    }

  </style>
</head>

<body>

  <button class="mobile-toggle" id="mobileToggle"><i class="bi bi-list"></i></button>

  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <a href="{{ url('/') }}" class="text-decoration-none">
        <h1 class="sitename">SIDOMULYO</h1>
      </a>
    </div>

    <nav id="sdm-nav" class="sdm-nav">
      <ul class="sdm-menu-list">
        <li><a href="{{ url('/') }}" class="sdm-link">Beranda</a></li>
        
        
        @auth('warga')
          <li class="sdm-dropdown open">
            <a href="javascript:void(0)" class="sdm-link sdm-drop-toggle active">
              <span><i class=""></i>Profil</span> 
              <i class="bi bi-chevron-down ms-1" style="font-size: 0.8rem;"></i>
            </a>
            <ul class="sdm-submenu">
              <li><a href="{{ route('profil.show') }}">Akun Saya</a></li>
              <li><a href="{{ route('showSurat') }}">Riwayat Surat</a></li>
              <li><a href="{{ route('showLaporan') }}">Riwayat Laporan</a></li>
              <li>
                <form action="{{ route('logout') }}" method="GET" class="m-0">
                  <button type="submit" class="sdm-logout-btn"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth
      </ul>
    </nav>
  </aside>

  <main class="main-content">
    <div class="container" data-aos="fade-up">
      
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4 animate__animated animate__fadeInDown" role="alert" style="border-radius: 15px;">
          <i class="bi bi-check2-all me-2"></i> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="text-center mb-5">
        <h2 class="fw-800" style="color: var(--dark-slate);">Pusat Aduan Warga</h2>
        <div class="mx-auto mt-2" style="width: 50px; height: 4px; background: var(--primary-red); border-radius: 2px;"></div>
        <p class="text-muted mt-3 small text-uppercase fw-bold" style="letter-spacing: 2px;">Transparansi & Solusi Untuk Sidomulyo</p>
      </div>

      <div class="card card-report animate__animated animate__zoomIn">
        <div class="card-header-report">
          <span class="fw-bold"><i class="bi bi-shield-lock me-2"></i> FORMULIR PENGADUAN DIGITAL</span>
        </div>
        
        <div class="card-body p-4 p-md-5">
          
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

            <div class="d-grid gap-3 mt-5">
              <button type="submit" class="btn btn-submit-report">
                <i class="bi bi-send-check me-2"></i> KIRIM LAPORAN SEKARANG
              </button>
              <a href="{{url()->previous() }}" class="btn btn-link text-decoration-none text-muted fw-bold small text-center">
                <i class="bi bi-arrow-left me-1"></i> Kembali
              </a>
            </div>
          </form>
        </div>
      </div>

      <p class="text-center mt-5 text-muted small">
        &copy; 2026 Pemerintah Desa Sidomulyo. <br>
        <span class="fw-bold">Privasi Terjamin:</span> Seluruh laporan Anda akan dijaga kerahasiaannya.
      </p>

    </div>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script>
    AOS.init({ duration: 800, once: true });

    // Sidebar Mobile Logic
    const mobileToggle = document.getElementById('mobileToggle');
    const sidebar = document.getElementById('sidebar');
    
    mobileToggle.addEventListener('click', () => {
      sidebar.classList.toggle('active');
    });

    // Dropdown Logic
    document.querySelectorAll('.sdm-drop-toggle').forEach(toggle => {
      toggle.addEventListener('click', function() {
        this.parentElement.classList.toggle('open');
      });
    });
  </script>
</body>
</html>
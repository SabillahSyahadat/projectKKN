<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Konfirmasi Pengajuan - Desa Sidomulyo</title>

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <style>
    :root {
      --primary-red: #dc3545;
      --primary-gradient: linear-gradient(135deg, #dc3545, #b22727);
      --sidebar-width: 280px;
      --soft-bg: #f8fafc;
      --dark-slate: #1e293b;
      --text-muted: #64748b;
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

    .info-label { font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 800; margin-bottom: 4px; }
    .info-value { font-size: 1.05rem; font-weight: 700; color: var(--dark-slate); }

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
      background: var(--primary-red);
      color: white;
      border-radius: 20px;
      padding: 18px;
      font-weight: 800;
      border: none;
      transition: all 0.4s;
      box-shadow: 0 10px 20px rgba(220, 53, 69, 0.2);
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
            <a href="javascript:void(0)" class="sdm-link sdm-drop-toggle">
              <span><i class="bi bi-person-circle me-2"></i> Profil</span> 
              <i class="bi bi-chevron-down ms-1" style="font-size: 0.8rem;"></i>
            </a>
            <ul class="sdm-submenu">
             <li><a href="{{ route('profil.show') }}">Akun Saya</a></li>
              <li><a href="{{ route('showLaporan') }}">Laporan</a></li>
              <li><a href="{{ route('showSurat') }}">Riwayat Surat</a></li>
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
      
      <div class="card card-confirm">
        <div class="card-header-confirm">
          <div class="mb-2 small fw-bold text-uppercase" style="letter-spacing: 2px; opacity: 0.8;">Final Check</div>
          <h3 class="fw-800 mb-3">Konfirmasi Pengajuan</h3>
          <div class="badge-type">
            <i class="bi bi-file-earmark-text me-2"></i>{{ $jenis_surat }}
          </div>
        </div>

        <div class="card-body p-4 p-md-5">
          <form action="{{ route('simpan.pengajuan') }}" method="POST">
            @csrf
            <input type="hidden" name="jenis_surat" value="{{ $jenis_surat }}">

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

            <div class="mb-4">
              <h6 class="fw-800 mb-3 text-muted" style="font-size: 0.8rem; letter-spacing: 1px;">DETAIL KEPERLUAN</h6>
              <textarea name="keperluan" class="form-control" rows="4" 
                placeholder="Contoh: Digunakan sebagai syarat administrasi pendaftaran beasiswa pendidikan." required></textarea>
              <div class="d-flex align-items-start mt-2 px-2">
                <i class="bi bi-info-circle text-danger me-2 small"></i>
                <small class="text-muted" style="font-size: 0.75rem;">Jelaskan keperluan Anda secara spesifik untuk mempercepat verifikasi.</small>
              </div>
            </div>

            <div class="alert alert-custom p-3 mb-4 d-flex align-items-center">
              <i class="bi bi-shield-check fs-4 me-3"></i>
              <div style="line-height: 1.5;">
                Dengan mengirimkan pengajuan ini, saya menyatakan bahwa data yang diberikan adalah benar dan sah.
              </div>
            </div>

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
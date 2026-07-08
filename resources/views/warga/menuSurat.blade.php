<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Layanan Surat Digital - Desa Sidomulyo</title>

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <style>
    :root {
      --primary-color: #dc3545;
      --primary-gradient: linear-gradient(135deg, #dc3545, #b22727);
      --soft-bg: #f8fafc;
      --sidebar-width: 280px;
      --text-main: #1e293b;
      --text-muted: #64748b;
    }

    body {
      background-color: var(--soft-bg);
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--text-main);
      min-height: 100vh;
    }

    /* --- Sidebar Styles (Consistent) --- */
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
    .sitename { color: var(--primary-color); font-weight: 800; font-size: 1.5rem; letter-spacing: -0.5px; margin: 0; }
    
    .sdm-nav { padding: 20px 15px; overflow-y: auto; flex-grow: 1; }
    .sdm-menu-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
    .sdm-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; color: var(--text-muted); font-weight: 600; font-size: 0.95rem; border-radius: 12px; text-decoration: none; transition: 0.3s; }
    .sdm-link:hover, .sdm-link.active { background: rgba(220, 53, 69, 0.1); color: var(--primary-color); }

    .sdm-dropdown .sdm-submenu { list-style: none; padding-left: 15px; margin-top: 5px; display: none; flex-direction: column; gap: 5px; }
    .sdm-dropdown.open .sdm-submenu { display: flex; }
    .sdm-dropdown.open .bi-chevron-down { transform: rotate(180deg); }
    .sdm-submenu a { display: block; padding: 10px 16px; color: var(--text-muted); text-decoration: none; font-size: 0.9rem; font-weight: 500; border-radius: 10px; }
    .sdm-submenu a:hover { color: var(--primary-color); background: #f8fafc; }
    
    .sdm-logout-btn { background: none; border: none; padding: 10px 16px; color: #ef4444; width: 100%; text-align: left; font-weight: 600; font-size: 0.9rem; }

    /* --- Main Content --- */
    .main-content { margin-left: var(--sidebar-width); padding: 40px; transition: all 0.3s ease; }

    /* --- Service Card Styles --- */
    .service-card {
        border: none;
        border-radius: 30px;
        transition: all 0.4s ease;
        background: #fff;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.05);
    }

    .icon-box {
        width: 80px;
        height: 80px;
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        font-size: 2.5rem;
        background: #fff5f5;
        color: var(--primary-color);
        transition: 0.3s;
    }

    .service-card:hover .icon-box {
        background: var(--primary-gradient);
        color: white;
    }

    .btn-select {
        border-radius: 15px;
        font-weight: 700;
        padding: 10px 20px;
        border: 2px solid #f1f5f9;
        background: #fff;
        color: var(--text-main);
        transition: 0.3s;
    }

    .service-card:hover .btn-select {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
    }

    .mobile-toggle { display: none; position: fixed; top: 15px; left: 15px; z-index: 1001; background: #fff; border: none; padding: 8px 12px; border-radius: 8px; color: var(--primary-color); box-shadow: 0 2px 10px rgba(0,0,0,0.1); }

    @media (max-width: 991px) {
      .sidebar { transform: translateX(-100%); }
      .sidebar.active { transform: translateX(0); }
      .main-content { margin-left: 0; padding: 80px 20px 40px; }
      .mobile-toggle { display: block; }
    }
  </style>
</head>

<body>

  <button class="mobile-toggle" id="mobileToggle"><i class="bi bi-list"></i></button>

  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <a href="{{ url('/') }}" class="text-decoration-none"><h1 class="sitename">SIDOMULYO</h1></a>
    </div>

    <nav id="sdm-nav" class="sdm-nav">
      <ul class="sdm-menu-list">
        <li><a href="{{ url('/') }}" class="sdm-link">Beranda</a></li>
        <li><a href="" class="sdm-link active">Layanan Surat</a></li>
        
        @auth('warga')
          <li class="sdm-dropdown open">
            <a href="javascript:void(0)" class="sdm-link sdm-drop-toggle">
              <span>Profil & Administrasi</span> <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <ul class="sdm-submenu">
              <li><a href="{{ route('profil.show') }}">Akun Saya</a></li>
              <li><a href="{{ route('showLaporan') }}">Laporan</a></li>
              <li><a href="{{ route('showSurat') }}">Riwayat Surat</a></li>
              <li>
                <form action="{{ route('logout') }}" method="GET" class="m-0">
                    <button type="submit" class="sdm-logout-btn"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth
      </ul>
    </nav>
  </aside>

  <main class="main-content">
    <div class="container">
        
        <div class="text-center mb-5" data-aos="fade-down">
            <div class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" style="font-size: 0.75rem; letter-spacing: 1px;">
                SISTEM LAYANAN MANDIRI
            </div>
            <h1 class="fw-800 display-6 mb-3">Pilih Jenis <span class="text-danger">Layanan Surat</span></h1>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Silakan pilih kategori surat yang ingin Anda ajukan secara digital.
            </p>
        </div>

        <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            
            <div class="col-md-4">
                <div class="card service-card p-4 text-center">
                    <div class="icon-box">
                        <i class="bi bi-file-earmark-richtext"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Surat Pengantar</h5>
                    <p class="small text-muted mb-4">Pengurusan dokumen administrasi umum tingkat RT/RW.</p>
                    
                    <form action="{{ route('konfirmasi') }}" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="jenis_surat" value="Surat Pengantar">
                        <button type="submit" class="btn btn-select w-100">Pilih Layanan</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card p-4 text-center">
                    <div class="icon-box">
                        <i class="bi bi-house-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Surat Domisili</h5>
                    <p class="small text-muted mb-4">Keterangan tempat tinggal resmi untuk berbagai keperluan.</p>
                    
                    <form action="{{ route('konfirmasi') }}" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="jenis_surat" value="Surat Domisili">
                        <button type="submit" class="btn btn-select w-100">Pilih Layanan</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card p-4 text-center">
                    <div class="icon-box">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Surat SKTM</h5>
                    <p class="small text-muted mb-4">Keterangan kurang mampu untuk jaminan kesehatan/pendidikan.</p>
                    
                    <form action="{{ route('konfirmasi') }}" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="jenis_surat" value="SKTM">
                        <button type="submit" class="btn btn-select w-100">Pilih Layanan</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="{{ route('index') }}" class="text-secondary text-decoration-none fw-bold small">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>

    </div>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script>
    AOS.init({ duration: 800, once: true });

    // Sidebar Logic
    document.getElementById('mobileToggle').addEventListener('click', () => {
      document.getElementById('sidebar').classList.toggle('active');
    });

    document.querySelectorAll('.sdm-drop-toggle').forEach(toggle => {
      toggle.addEventListener('click', function() {
        this.parentElement.classList.toggle('open');
      });
    });
  </script>
</body>
</html>
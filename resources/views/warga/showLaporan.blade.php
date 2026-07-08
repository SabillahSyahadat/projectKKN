<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Riwayat Laporan - Desa Sidomulyo</title>

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <style>
    :root {
      --primary-color: #e84545;
      --primary-gradient: linear-gradient(135deg, #e84545, #b22727);
      --soft-bg: #f4f7f6;
      --text-main: #1e293b;
      --text-muted: #64748b;
      --sidebar-width: 280px;
      --soft-shadow: rgba(149, 157, 165, 0.1) 0px 8px 24px;
    }

    body {
      background-color: var(--soft-bg);
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--text-main);
    }

    /* --- Sidebar Styles --- */
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
    .sdm-link:hover, .sdm-link.active { background: rgba(232, 69, 69, 0.1); color: var(--primary-color); }

    .sdm-dropdown .sdm-submenu { list-style: none; padding-left: 15px; margin-top: 5px; display: none; flex-direction: column; gap: 5px; }
    .sdm-dropdown.open .sdm-submenu { display: flex; }
    .sdm-dropdown.open .bi-chevron-down { transform: rotate(180deg); }
    .sdm-submenu a { display: block; padding: 10px 16px; color: var(--text-muted); text-decoration: none; font-size: 0.9rem; font-weight: 500; border-radius: 10px; }
    .sdm-submenu a:hover { color: var(--primary-color); background: #f8fafc; }
    
    .sdm-logout-btn { background: none; border: none; padding: 10px 16px; color: #ef4444; width: 100%; text-align: left; font-weight: 600; font-size: 0.9rem; }

    /* --- Main Content --- */
    .main-content { margin-left: var(--sidebar-width); padding: 40px; min-height: 100vh; }

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
              <span>Profil</span> <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <ul class="sdm-submenu">
              <li><a href="{{route('profil.show')}}">Akun Saya</a></li>
              <li><a href="{{ route('showSurat') }}">Riwayat Surat</a></li>
              <li><a href="{{ route('showLaporan') }}" style="color: var(--primary-color); font-weight: 700;">Riwayat Laporan</a></li>
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
    <div class="container-fluid">
      
      <div class="row mb-4 align-items-center" data-aos="fade-down">
        <div class="col-md-7">
          <h2 class="fw-800 mb-1">Riwayat Laporan</h2>
          <p class="text-muted">Daftar laporan pengaduan yang Anda kirimkan berdasarkan NIK.</p>
        </div>
        <div class="col-md-5 text-md-end">
          <a href="{{route('laporan')}}" class="btn btn-danger px-4 py-2 fw-bold rounded-pill shadow-sm" style="background: var(--primary-gradient); border:none;">
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
                  <div class="fw-600">{{ $laporan->created_at->translatedFormat('d M Y') }}</div>
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

    </div>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script>
    AOS.init({ duration: 800, once: true });

    // Sidebar Toggle
    document.getElementById('mobileToggle').addEventListener('click', () => {
      document.getElementById('sidebar').classList.toggle('active');
    });

    // Dropdown Submenu
    document.querySelectorAll('.sdm-drop-toggle').forEach(toggle => {
      toggle.addEventListener('click', function() {
        this.parentElement.classList.toggle('open');
      });
    });
  </script>
</body>
</html>
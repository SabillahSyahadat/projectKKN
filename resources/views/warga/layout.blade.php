<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Profil Saya - Desa Sidomulyo')</title>

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <style>
    :root {
      --primary-color: #4f46e5;
      --primary-dark: #3730a3;
      --primary-light: rgba(79, 70, 229, 0.1);
      --primary-gradient: linear-gradient(135deg, #4f46e5, #312e81);
      --soft-bg: #f8fafc;
      --card-bg: #ffffff;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --sidebar-width: 280px;
      --soft-shadow: 0 10px 40px -10px rgba(0,0,0,0.08);
      --hover-shadow: 0 20px 40px -10px rgba(79, 70, 229, 0.15);
    }

    body {
      background-color: var(--soft-bg);
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--text-main);
      overflow-x: hidden;
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
      transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
      display: flex;
      flex-direction: column;
      box-shadow: 4px 0 20px rgba(0,0,0,0.03);
    }

    .sidebar-header {
      padding: 35px 20px;
      text-align: center;
      border-bottom: 1px solid #f1f5f9;
    }

    .sitename {
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 800;
      font-size: 1.6rem;
      letter-spacing: -0.5px;
      margin: 0;
    }

    /* Custom Nav Classes (sdm-nav) */
    .sdm-nav {
      padding: 25px 20px;
      overflow-y: auto;
      flex-grow: 1;
    }

    .sdm-menu-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .sdm-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 18px;
      color: var(--text-muted);
      font-weight: 600;
      font-size: 0.95rem;
      border-radius: 14px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .sdm-link:hover, .sdm-link.active {
      background: var(--primary-light);
      color: var(--primary-color);
      transform: translateX(4px);
    }

    /* Submenu Styles */
    .sdm-dropdown .sdm-submenu {
      list-style: none;
      padding-left: 15px;
      margin-top: 5px;
      display: none;
      flex-direction: column;
      gap: 5px;
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .sdm-dropdown.open .sdm-submenu {
      display: flex;
    }

    .sdm-dropdown.open .bi-chevron-down {
      transform: rotate(180deg);
    }
    
    .bi-chevron-down {
      transition: transform 0.3s;
      font-size: 0.8rem;
    }

    .sdm-submenu a {
      display: block;
      padding: 12px 18px;
      color: var(--text-muted);
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 500;
      border-radius: 12px;
      transition: all 0.2s;
    }

    .sdm-submenu a:hover {
      color: var(--primary-color);
      background: rgba(79, 70, 229, 0.05);
      transform: translateX(4px);
    }

    .sdm-logout-btn {
      background: none;
      border: none;
      padding: 12px 18px;
      color: #ef4444;
      width: 100%;
      text-align: left;
      font-weight: 600;
      font-size: 0.9rem;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .sdm-logout-btn:hover {
      background: #fef2f2;
      transform: translateX(4px);
    }

    /* --- Main Content Layout --- */
    .main-content {
      margin-left: var(--sidebar-width);
      padding: 50px 40px;
      min-height: 100vh;
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    /* Mobile Toggle Button */
    .mobile-toggle {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1001;
      background: #fff;
      border: none;
      padding: 10px 14px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      color: var(--primary-color);
      font-size: 1.5rem;
      transition: all 0.3s;
    }
    .mobile-toggle:hover {
      background: var(--primary-light);
    }

    @media (max-width: 991px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.active {
        transform: translateX(0);
      }
      .main-content {
        margin-left: 0;
        padding: 80px 20px 40px; /* Jarak untuk tombol toggle */
      }
      .mobile-toggle {
        display: block;
      }
    }

    @yield('custom-css')
  </style>
</head>

<body>

  <!-- Tombol Toggle Sidebar (Muncul di Mobile) -->
  <button class="mobile-toggle" id="mobileToggle">
    <i class="bi bi-list"></i>
  </button>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <a href="{{ url('/') }}" class="text-decoration-none">
        <h1 class="sitename">SIDOMULYO</h1>
      </a>
    </div>

    <!-- Navigasi -->
    <nav id="sdm-nav" class="sdm-nav">
      <ul class="sdm-menu-list">
        <li><a href="{{ url('/') }}" class="sdm-link">Beranda</a></li>
        
        @auth('warga')
          <li class="sdm-dropdown open">
            <a href="javascript:void(0)" class="sdm-link sdm-drop-toggle active">
              <span>Profil</span> <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <ul class="sdm-submenu">
              <li><a href="{{route('profil.show')}}" @if(request()->routeIs('profil.show')) style="color: var(--primary-color); font-weight: 700;" @endif>Akun Saya</a></li>
              <li><a href="{{ route('showSurat') }}" @if(request()->routeIs('showSurat')) style="color: var(--primary-color); font-weight: 700;" @endif>Riwayat Surat</a></li>
              <li><a href="{{ route('showLaporan') }}" @if(request()->routeIs('showLaporan')) style="color: var(--primary-color); font-weight: 700;" @endif>Riwayat Laporan</a></li>
              <li>
                <form action="{{ route('logout') }}" method="GET" class="m-0">
                    @csrf
                    <button type="submit" class="sdm-logout-btn"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li><a href="{{ route('login') }}" class="sdm-link">Login</a></li>
        @endauth
      </ul>
    </nav>
  </aside>

  <!-- Konten Utama -->
  <main class="main-content">
    <div class="container-fluid">
      @yield('content')
    </div>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script>
    // Inisialisasi Animasi AOS
    AOS.init({
      duration: 800,
      easing: 'ease-out-cubic',
      once: true,
      offset: 50
    });

    // Script untuk Dropdown Sidebar Menu
    const dropdownToggles = document.querySelectorAll('.sdm-drop-toggle');
    dropdownToggles.forEach(toggle => {
      toggle.addEventListener('click', function() {
        this.parentElement.classList.toggle('open');
      });
    });

    // Script untuk Toggle Sidebar di Mode Mobile
    const mobileToggle = document.getElementById('mobileToggle');
    const sidebar = document.getElementById('sidebar');
    
    if(mobileToggle && sidebar) {
        mobileToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        });
    }
  </script>
  @yield('custom-js')
</body>
</html>

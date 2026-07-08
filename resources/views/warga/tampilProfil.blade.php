<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Profil Saya - Desa Sidomulyo</title>

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <style>
    :root {
      --primary-color: #e84545;
      --primary-dark: #b22727;
      --primary-light: rgba(232, 69, 69, 0.1);
      --primary-gradient: linear-gradient(135deg, #e84545, #b22727);
      --soft-bg: #f4f7f6;
      --card-bg: #ffffff;
      --text-main: #1e293b;
      --text-muted: #64748b;
      --sidebar-width: 280px;
      --soft-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
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
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      box-shadow: 4px 0 20px rgba(0,0,0,0.03);
    }

    .sidebar-header {
      padding: 30px 20px;
      text-align: center;
      border-bottom: 1px solid #f1f5f9;
    }

    .sitename {
      color: var(--primary-color);
      font-weight: 800;
      font-size: 1.5rem;
      letter-spacing: -0.5px;
      margin: 0;
    }

    /* Custom Nav Classes (sdm-nav) */
    .sdm-nav {
      padding: 20px 15px;
      overflow-y: auto;
      flex-grow: 1;
    }

    .sdm-menu-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .sdm-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 16px;
      color: var(--text-muted);
      font-weight: 600;
      font-size: 0.95rem;
      border-radius: 12px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .sdm-link:hover, .sdm-link.active {
      background: var(--primary-light);
      color: var(--primary-color);
    }

    /* Submenu Styles */
    .sdm-dropdown .sdm-submenu {
      list-style: none;
      padding-left: 15px;
      margin-top: 5px;
      display: none; /* Disembunyikan secara default, diatur via JS */
      flex-direction: column;
      gap: 5px;
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
      padding: 10px 16px;
      color: var(--text-muted);
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 500;
      border-radius: 10px;
      transition: all 0.2s;
    }

    .sdm-submenu a:hover {
      color: var(--primary-color);
      background: #f8fafc;
    }

    .sdm-logout-btn {
      background: none;
      border: none;
      padding: 10px 16px;
      color: #ef4444;
      width: 100%;
      text-align: left;
      font-weight: 600;
      font-size: 0.9rem;
      border-radius: 10px;
      transition: 0.3s;
    }

    .sdm-logout-btn:hover {
      background: #fef2f2;
    }

    /* --- Main Content Layout --- */
    .main-content {
      margin-left: var(--sidebar-width);
      padding: 40px;
      min-height: 100vh;
      transition: all 0.3s ease;
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
      padding: 8px 12px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      color: var(--primary-color);
      font-size: 1.5rem;
    }

    /* --- Profile Card Styles (Sama seperti sebelumnya) --- */
    .profile-view-card {
      border: none;
      border-radius: 20px;
      background: var(--card-bg);
      box-shadow: var(--soft-shadow);
    }

    .profile-banner {
      background: var(--primary-gradient);
      height: 140px;
      border-radius: 20px 20px 0 0;
    }

    .profile-user-info {
      text-align: center;
      margin-top: -65px;
      padding: 0 20px 20px;
    }

    .profile-avatar {
      width: 130px;
      height: 130px;
      background: var(--card-bg);
      border-radius: 50%;
      border: 6px solid var(--card-bg);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-color);
      font-size: 55px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      margin-bottom: 15px;
      transition: transform 0.3s ease;
    }

    .user-name {
      font-size: 1.75rem;
      font-weight: 800;
      color: var(--text-main);
      margin-bottom: 5px;
    }

    .user-nik {
      display: inline-block;
      background: var(--primary-light);
      color: var(--primary-color);
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.9rem;
      font-weight: 600;
    }

    .info-group {
      display: flex;
      align-items: center;
      padding: 16px;
      background: #fff;
      border-radius: 16px;
      border: 1px solid #f1f5f9;
      transition: all 0.3s ease;
    }

    .info-group:hover {
      border-color: var(--primary-light);
      box-shadow: 0 4px 15px rgba(0,0,0,0.03);
      transform: translateY(-2px);
    }

    .icon-box {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      background: var(--primary-light);
      color: var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      flex-shrink: 0;
      margin-right: 16px;
      transition: background 0.3s, color 0.3s;
    }

    .info-group:hover .icon-box {
      background: var(--primary-color);
      color: #fff;
    }

    .info-text-wrapper {
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .info-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--text-muted);
      margin-bottom: 2px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .info-value {
      font-size: 1.05rem;
      font-weight: 600;
      color: var(--text-main);
      margin: 0;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .btn-action {
      border-radius: 12px;
      padding: 12px 24px;
      font-weight: 600;
      font-size: 0.95rem;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
    }

    .btn-edit-main {
      background: var(--primary-gradient);
      border: none;
      color: white;
      box-shadow: 0 4px 15px rgba(232, 69, 69, 0.3);
      text-decoration: none;
    }

    .btn-edit-main:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(232, 69, 69, 0.4);
      color: white;
    }

    /* Responsive */
    @media (max-width: 991px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.active {
        transform: translateX(0);
      }
      .main-content {
        margin-left: 0;
        padding: 60px 15px 30px; /* Jarak untuk tombol toggle */
      }
      .mobile-toggle {
        display: block;
      }
      .info-value {
        white-space: normal;
      }
    }
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

    <!-- Navigasi dari Anda -->
    <nav id="sdm-nav" class="sdm-nav">
      <ul class="sdm-menu-list">
        <li><a href="{{ url('/') }}" class="sdm-link">Beranda</a></li>
        
        @auth('warga')
          <!-- Saya tambahkan class 'open' secara default agar sub-menu terlihat saat di halaman profil -->
          <li class="sdm-dropdown open">
            <a href="javascript:void(0)" class="sdm-link sdm-drop-toggle active">
              <span>Profil</span> <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <ul class="sdm-submenu">
              <li><a href="{{route('profil.show')}}" style="color: var(--primary-color);">Akun Saya</a></li>
              <li><a href="{{ route('showSurat') }}">Riwayat Surat</a></li>
              <li><a href="{{ route('showLaporan') }}">Riwayat Laporan</a></li>
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
      <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9" data-aos="fade-up" data-aos-duration="800">
          
          <div class="profile-view-card">
            <!-- Background Merah Atas -->
            <div class="profile-banner"></div>

            <!-- Area Foto Profil & Nama -->
            <div class="profile-user-info">
              <div class="profile-avatar" data-aos="zoom-in" data-aos-delay="150">
                <i class="bi bi-person-fill"></i>
              </div>
              <h2 class="user-name">{{ Auth::guard('warga')->user()->nama_warga }}</h2>
              <div class="user-nik">
                <i class="bi bi-credit-card-2-front me-1"></i> NIK: {{ Auth::guard('warga')->user()->nik }}
              </div>
            </div>

            <!-- Detail Data Warga -->
            <div class="card-body px-4 pb-5 pt-3">
              <div class="row g-3">
                
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box"><i class="bi bi-envelope-at"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Email</span>
                      <p class="info-value">{{ Auth::guard('warga')->user()->email_warga }}</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="250">
                    <div class="icon-box"><i class="bi bi-briefcase"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Pekerjaan</span>
                      <p class="info-value">{{ $user->pekerjaan }}</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box"><i class="bi bi-calendar-event"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Tempat, Tanggal Lahir</span>
                      <p class="info-value">{{ $user->alamat }}, {{ \Carbon\Carbon::parse($user->tgl_lahir)->translatedFormat('d M Y') }}</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="350">
                    <div class="icon-box"><i class="bi bi-people"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Status Keluarga</span>
                      <p class="info-value">{{ $user->status }}</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="400">
                    <div class="icon-box"><i class="bi bi-gender-ambiguous"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Jenis Kelamin</span>
                      <p class="info-value">{{ $user->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="450">
                    <div class="icon-box"><i class="bi bi-geo-alt"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Alamat Domisili</span>
                      <p class="info-value" style="white-space: normal; font-size: 0.95rem;">{{ $user->alamat }}</p>
                    </div>
                  </div>
                </div>

              </div>

              <!-- Tombol Edit Profil di Bawah -->
              <div class="mt-5 pt-4 border-top text-end">
                <a href="{{ route('updateProfil.warga') }}" class="btn btn-edit-main btn-action">
                  <i class="bi bi-pencil-square"></i> Perbarui Data Profil
                </a>
              </div>

            </div>
          </div>

        </div>
      </div>
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
    
    mobileToggle.addEventListener('click', () => {
      sidebar.classList.toggle('active');
    });
  </script>

</body>
</html>
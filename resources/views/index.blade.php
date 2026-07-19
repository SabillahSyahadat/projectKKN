<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Website Resmi Desa Kepudibener | Kecamatan Turi </title>
<meta name="description" content="Website resmi Desa Sidomulyo sebagai pusat informasi, layanan digital, dan berita desa.">
<meta name="keywords" content="Desa Sidomulyo, Website Desa, Layanan Desa, Berita Desa">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<style>
  :root {
    --sdm-red: #dc3545;
    --sdm-dark: #0f172a;
    --sdm-glass: rgba(15, 23, 42, 0.9);
  }

  .sdm-header {
    transition: all 0.4s;
    padding: 15px 0;
    background: var(--sdm-glass);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    z-index: 9999; /* Sangat tinggi agar selalu di atas */
    border-bottom: 1px solid rgba(255,255,255,0.1);
  }

  .sdm-header.sdm-scrolled {
    padding: 10px 0;
    background: var(--sdm-dark);
    border-bottom: 1px solid var(--sdm-red);
  }

  .sdm-sitename {
    font-size: 1.4rem;
    font-weight: 800;
    color: #fff;
    margin-left: 10px;
    letter-spacing: 1px;
  }

  /* Desktop Menu */
  .sdm-menu-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center;
  }

  .sdm-link {
    color: rgba(255,255,255,0.8);
    padding: 10px 15px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
  }

  .sdm-link:hover, .sdm-link.active { color: var(--sdm-red); }

  .sdm-btn-login {
    border: 2px solid var(--sdm-red);
    color: #fff;
    padding: 8px 25px;
    border-radius: 50px;
    text-decoration: none;
    margin-left: 15px;
    font-weight: 700;
    transition: 0.3s;
  }

  .sdm-btn-login:hover { background: var(--sdm-red); color: #fff; }

  /* Dropdown Style */
  .sdm-dropdown { position: relative; }
  .sdm-submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    min-width: 180px;
    border-radius: 10px;
    padding: 10px 0;
    list-style: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
  }
  .sdm-dropdown:hover .sdm-submenu { display: block; }
  .sdm-submenu a, .sdm-logout-btn {
    color: #333;
    padding: 8px 20px;
    display: block;
    text-decoration: none;
    font-size: 14px;
    width: 100%;
    border: none;
    background: none;
    text-align: left;
  }
  .sdm-logout-btn { color: var(--sdm-red); font-weight: 700; }

  /* MOBILE RESPONSIVE */
  .sdm-mobile-toggle {
    color: #fff;
    font-size: 32px;
    cursor: pointer;
    z-index: 10000;
  }

  @media (max-width: 1199px) {
    .sdm-nav {
      position: fixed;
      top: 0; right: -100%; /* Sembunyikan di kanan */
      width: 280px;
      height: 100vh;
      background: var(--sdm-dark);
      transition: 0.4s;
      padding-top: 80px;
      box-shadow: -10px 0 30px rgba(0,0,0,0.5);
    }

    .sdm-nav.active { right: 0; } /* Munculkan */

    .sdm-menu-list { flex-direction: column; align-items: flex-start; }
    .sdm-link { width: 100%; padding: 15px 30px; font-size: 16px; border-bottom: 1px solid rgba(255,255,255,0.05); }
    
    .sdm-submenu { position: static; background: rgba(255,255,255,0.05); display: none; box-shadow: none; width: 100%; }
    .sdm-submenu a { color: #ccc; padding-left: 50px; }
    .sdm-dropdown.open .sdm-submenu { display: block; }
  }
</style>

<body class="index-page">
 <header id="sdm-header" class="sdm-header fixed-top">
  
  <div class="container d-flex align-items-center justify-content-between">

    
    <a href="/" class="sdm-logo d-flex align-items-center text-decoration-none">
      <img src="{{ asset('assets/img/logo-surat.png') }}" alt="logo" style="max-height: 40px;">
      <h1 class="sdm-sitename mb-0">KEPUDIBENER</h1>
    </a>

    
    <nav id="sdm-nav" class="sdm-nav">
      <ul class="sdm-menu-list">
        <li><a href="#hero" class="sdm-link active">Beranda</a></li>
        <li><a href="#about" class="sdm-link">Profil Desa</a></li>
        <li><a href="#services" class="sdm-link">Layanan</a></li>

        <li><a href="#portfolio" class="sdm-link">Galeri</a></li>
        <li><a href="#recent-posts" class="sdm-link">Berita</a></li>
        <li><a href="#contact" class="sdm-link">Kontak</a></li>
        
        @auth('warga')
          <li class="sdm-dropdown">
            <a href="javascript:void(0)" class="sdm-link sdm-drop-toggle">
              <span>Profil</span> <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <ul class="sdm-submenu">
              <li><a href="{{route('profil.show')}}">Akun Saya</a></li>
              <li><a href="{{ route('showSurat') }}">Riwayat Surat</a></li>
              <li>
                <form action="{{ route('logout') }}" method="GET" class="m-0">
                    @csrf
                    <button type="submit" class="sdm-logout-btn">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li><a href="{{ route('login') }}" class="sdm-link">Login</a></li>
        @endauth
      </ul>
    </nav>

    <i class="bi bi-list sdm-mobile-toggle d-xl-none"></i>

  </div>
  
</header>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('#sdm-header');
    const nav = document.querySelector('#sdm-nav');
    const mobileToggle = document.querySelector('.sdm-mobile-toggle');
    const dropToggle = document.querySelector('.sdm-drop-toggle');

    // 1. Toggle Mobile Menu
    if (mobileToggle) {
      mobileToggle.addEventListener('click', function() {
        nav.classList.toggle('active');
        // Ganti ikon list ke X
        this.classList.toggle('bi-list');
        this.classList.toggle('bi-x');
      });
    }

    // 2. Toggle Dropdown di Mobile
    if (dropToggle) {
      dropToggle.addEventListener('click', function(e) {
        if (window.innerWidth < 1200) {
          e.preventDefault();
          this.parentElement.classList.toggle('open');
        }
      });
    }

    // 3. Scroll Effect
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        header.classList.add('sdm-scrolled');
      } else {
        header.classList.remove('sdm-scrolled');
      }
    });

    // 4. Klik di luar menu untuk menutup (Mobile)
    document.addEventListener('click', function(e) {
      if (!nav.contains(e.target) && !mobileToggle.contains(e.target) && nav.classList.contains('active')) {
        nav.classList.remove('active');
        mobileToggle.classList.add('bi-list');
        mobileToggle.classList.remove('bi-x');
      }
    });
  });
</script>

@if (session('validasi'))
  <div class="alert alert-white border-0 shadow alert-floating animate__animated animate__fadeInRight" role="alert">
    <div class="d-flex align-items-center">
      <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
      <div>
        <strong class="d-block">Berhasil!</strong>
        <span class="small text-muted">{{ session('validasi') }}</span>
      </div>
      <button type="button" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
@endif

  <main class="main">
    
    <!-- Hero Section -->
    <section id="hero" class="hero section position-relative d-flex align-items-center" style="min-height: 100vh; background: #fff; overflow: hidden;">
  
  <div class="position-absolute end-0 top-0 h-100 w-lg-60 w-100 animate__animated animate__fadeInRight" style="z-index: 1;">
    <div class="hero-image-container h-100">
        <img src="{{ asset('assets/img/backgroundIndex.jpg') }}" alt="Desa Sidomulyo" class="w-100 h-100 object-fit-cover hero-parallax">
        <div class="hero-gradient-overlay"></div>
    </div>
  </div>

  <div class="container position-relative" style="z-index: 5;">
    <div class="row align-items-center">
      
      <div class="col-lg-6">
        <div class="hero-content-box p-lg-0 p-4">
          
          @auth('warga')
            <div class="animate__animated animate__fadeInLeft">
              <div class="badge-modern mb-3">
                <span class="bg-success-subtle text-success px-3 py-2 rounded-pill fw-bold small">
                  <i class="bi bi-patch-check-fill me-1"></i> Sesi Warga Aktif
                </span>
              </div>
              
              <h1 class="display-4 fw-800 text-dark mb-2">
                Selamat Datang,<br>
                <span class="text-danger-premium">{{ explode(' ', Auth::guard('warga')->user()->nama_warga)[0] }}!</span>
              </h1>
              
              <div class="user-info-card bg-light p-3 rounded-4 mb-4 border-start border-4 border-danger shadow-sm" style="max-width: 450px;">
                <div class="d-flex align-items-center">
                  <div class="flex-grow-1">
                    <p class="mb-0 text-muted small fw-bold text-uppercase">Nomor Induk Kependudukan</p>
                    <p class="mb-0 fw-bold fs-5 text-dark">{{ Auth::guard('warga')->user()->nik }}</p>
                  </div>
                  <div class="ms-3">
                     <i class="bi bi-person-badge fs-1 text-danger-subtle"></i>
                  </div>
                </div>
              </div>

              <p class="fs-6 text-secondary mb-4" style="max-width: 500px;">
                Anda terhubung dengan sistem layanan mandiri Sidomulyo. Pantau status pengajuan Anda atau buat dokumen baru hari ini.
              </p>
              
              <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('showSurat') }}" class="btn btn-danger btn-lg rounded-4 px-4 py-3 fw-bold shadow-danger-sm hover-grow">
                  <i class="bi bi-clock-history me-2"></i> Riwayat Surat
                </a>
                <a href="#services" class="btn btn-outline-dark btn-lg rounded-4 px-4 py-3 fw-bold hover-dark">
                  Buat Pengajuan
                </a>
              </div>
            </div>
          @else
            <div class="animate__animated animate__fadeInLeft">
              <div class="badge-modern mb-3 animate__animated animate__fadeInDown">
                <span class="bg-danger-subtle text-danger px-3 py-2 rounded-pill fw-bold small">
                  <i class="bi bi-geo-alt-fill me-1"></i> Kecamatan Turi, Kabupaten Lamongan
                </span>
              </div>
              
              <h1 class="display-3 fw-800 text-dark mb-4" style="line-height: 1.1;">
                Gerbang Layanan <br>
                <span class="text-danger-premium">Digital Kepudibener</span>
              </h1>
              
              <p class="fs-5 text-secondary mb-5 animate__delay-1s" style="max-width: 500px;">
                Akses administrasi desa, laporan warga, dan informasi publik kini lebih mudah, cepat, dan transparan dalam satu platform terpadu.
              </p>
              
              <div class="d-flex flex-wrap gap-3 animate__delay-1s">
                <a href="{{ route('login') }}" class="btn btn-danger btn-lg rounded-4 px-4 py-3 fw-bold shadow-danger-sm hover-grow">
                  Mulai Sekarang <i class="bi bi-arrow-right-short ms-2"></i>
                </a>
                <a href="#about" class="btn btn-outline-dark btn-lg rounded-4 px-4 py-3 fw-bold hover-dark">
                  Profil Desa
                </a>
              </div>
            </div>
          @endauth

          <div class="row mt-5 pt-4 border-top d-none d-md-flex animate__animated animate__fadeInUp animate__delay-2s">
            <div class="col-4 border-end">
              <h4 class="fw-bold mb-0">350+</h4>
              <small class="text-muted">Hektar Wilayah</small>
            </div>
            <div class="col-4 border-end">
              <h4 class="fw-bold mb-0">4</h4>
              <small class="text-muted">Dusun Utama</small>
            </div>
            <div class="col-4">
              <h4 class="fw-bold mb-0">24/7</h4>
              <small class="text-muted">Akses Layanan</small>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="floating-shape shape-1 d-none d-lg-block"></div>
  <div class="floating-shape shape-2 d-none d-lg-block"></div>

  <style>
    /* Tambahan Style khusus Dashboard Hero */
    .bg-success-subtle { background-color: #d1e7dd !important; }
    .text-success { color: #0f5132 !important; }
    .user-info-card {
      transition: all 0.3s ease;
      background: #f8f9fa !important;
    }
    .user-info-card:hover {
      transform: translateX(10px);
      background: #ffffff !important;
    }

    /* Style lama Anda yang tetap dipertahankan */
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
    .fw-800 { font-weight: 800; }
    .hero-image-container { clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%); position: relative; }
    .hero-gradient-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(90deg, #ffffff 0%, rgba(255,255,255,0.2) 20%, transparent 50%); }
    .text-danger-premium { background: linear-gradient(45deg, #dc3545, #ff6b6b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .shadow-danger-sm { box-shadow: 0 10px 20px rgba(220, 53, 69, 0.2); }
    .hover-grow { transition: all 0.3s ease; }
    .hover-grow:hover { transform: scale(1.05); }
    .floating-shape { position: absolute; border-radius: 50%; z-index: 0; filter: blur(80px); }
    .shape-1 { width: 300px; height: 300px; background: rgba(220, 53, 69, 0.1); top: -50px; left: -50px; }
    .shape-2 { width: 200px; height: 200px; background: rgba(220, 53, 69, 0.05); bottom: 10%; left: 20%; }

    @media (max-width: 991px) {
      .hero-image-container { clip-path: none; opacity: 0.3; }
      .hero-gradient-overlay { background: linear-gradient(0deg, #ffffff 20%, transparent 100%); }
      .hero-content-box { background: rgba(255,255,255,0.8); backdrop-filter: blur(10px); border-radius: 20px; }
    }
    .w-lg-60 { @media (min-width: 992px) { width: 60% !important; } }
  </style>
</section>



<section id="about" class="about section py-5" style="background-color: #fff;">
  <div class="container section-title mb-5" data-aos="fade-up">
    <div class="text-center">
        <span class="sdm-tag-line">Profil Desa</span>
        <h2 class="fw-800 mt-2">Tentang <span class="text-danger">Kami</span></h2>
        <div class="mx-auto bg-danger mb-4" style="width: 60px; height: 4px; border-radius: 10px;"></div>
        <h3 class="lead text-muted mx-auto fw-normal" style="max-width: 700px; line-height: 1.8;">
    Desa Sidomulyo berkomitmen tinggi dalam memberikan pelayanan terbaik kepada masyarakat melalui inovasi teknologi informasi yang inklusif.
</h3>
    </div>
  </div>

  <div class="container">
    <div class="row gy-5 align-items-center">
      
      <div class="col-lg-6" data-aos="fade-right">
        <div class="sdm-about-wrapper">
          <img src="{{ asset('assets/img/loginDesa.jpg') }}" class="img-fluid sdm-img-main" alt="Suasana Desa Sidomulyo">
          
          @auth('warga')
            <div class="sdm-personal-overlay animate__animated animate__fadeInUp">
              <div class="sdm-glass-card">
                <div class="d-flex align-items-center">
                  <div class="sdm-avatar-mini">
                    <i class="bi bi-person-bounding-box"></i>
                  </div>
                  <div class="ms-3">
                    <p class="sdm-label-warga">Warga Terverifikasi</p>
                    <h5 class="sdm-user-name">{{ Auth::guard('warga')->user()->nama_warga }}</h5>
                  </div>
                </div>
                <hr class="my-2 opacity-25">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="small opacity-75">ID: {{ substr(Auth::guard('warga')->user()->nik, 0, 6) }}******</span>
                  <span class="badge rounded-pill bg-danger shadow-sm">Aktif</span>
                </div>
              </div>
            </div>
          @else
            <div class="sdm-year-badge animate__animated animate__pulse animate__infinite">
              <h3 class="fw-bold mb-0">2026</h3>
              <p class="small mb-0">Digital Desa</p>
            </div>
          @endauth
        </div>
      </div>

      <div class="col-lg-6 content" data-aos="fade-left">
        <div class="ps-lg-5">
          <h3 class="fw-bold mb-4">Visi & Strategi <span class="text-danger">Pembangunan</span></h3>
          <p class="text-secondary mb-4 italic">
            "Membangun dari pinggiran dengan kekuatan data dan partisipasi warga secara aktif di Kecamatan Deket."
          </p>

          <div class="vission-list">
            <div class="sdm-vision-item">
              <div class="sdm-icon-box">
                <i class="bi bi-cpu"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-1">Digitalisasi Layanan</h6>
                <p class="small text-muted mb-0">Efisiensi administrasi desa yang bisa diakses kapan saja dan di mana saja.</p>
              </div>
            </div>

            <div class="sdm-vision-item">
              <div class="sdm-icon-box">
                <i class="bi bi-eye"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-1">Transparansi Publik</h6>
                <p class="small text-muted mb-0">Keterbukaan informasi mengenai anggaran dan program kerja desa.</p>
              </div>
            </div>
          </div>
          
          <a href="#profil-desa" class="btn btn-danger px-4 py-2 rounded-pill mt-3 fw-bold sdm-btn-hover">
            Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
      </div>

    </div>
  </div>
  <style>
  /* Base Style */
  .fw-800 { font-weight: 800; }
  .sdm-tag-line {
    color: #dc3545;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 0.8rem;
    display: block;
  }

  /* Image Wrapper */
  .sdm-about-wrapper {
    position: relative;
    border-radius: 30px;
    overflow: visible; /* Agar badge/overlay bisa sedikit "keluar" jika mau */
  }

  .sdm-img-main {
    border-radius: 30px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    transition: transform 0.5s ease;
  }

  /* Overlay Glassmorphism */
  .sdm-personal-overlay {
    position: absolute;
    bottom: 20px;
    left: 20px;
    right: 20px;
    z-index: 5;
  }

  .sdm-glass-card {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(15px) saturate(180%);
    -webkit-backdrop-filter: blur(15px) saturate(180%);
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 20px;
    border-radius: 20px;
    color: #fff;
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
  }

  .sdm-avatar-mini {
    width: 50px;
    height: 50px;
    background: #dc3545;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: #fff;
  }

  .sdm-label-warga {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 0;
    opacity: 0.8;
  }

  .sdm-user-name {
    font-weight: 700;
    margin-bottom: 0;
    font-size: 1.1rem;
  }

  /* Default Badge */
  .sdm-year-badge {
    position: absolute;
    bottom: -15px;
    right: 25px;
    background: #dc3545;
    color: #fff;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(220, 53, 69, 0.4);
    text-align: center;
    z-index: 4;
  }

  /* Vision List Item */
  .sdm-vision-item {
    display: flex;
    align-items: center;
    padding: 15px;
    border-radius: 18px;
    margin-bottom: 15px;
    transition: 0.3s;
    background: transparent;
  }

  .sdm-vision-item:hover {
    background: #fffafa;
    transform: translateX(10px);
  }

  .sdm-icon-box {
    min-width: 55px;
    height: 55px;
    background: #fff5f5;
    color: #dc3545;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 20px;
    font-size: 1.5rem;
    transition: 0.3s;
  }

  .sdm-vision-item:hover .sdm-icon-box {
    background: #dc3545;
    color: #fff;
  }

  /* Button Hover */
  .sdm-btn-hover {
    transition: 0.3s;
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
  }

  .sdm-btn-hover:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(220, 53, 69, 0.4);
  }

  @media (max-width: 768px) {
    .sdm-glass-card { padding: 15px; }
    .sdm-user-name { font-size: 1rem; }
  }
</style>
</section><!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section py-5 bg-light-subtle">

  <div class="container section-title text-center mb-5" data-aos="fade-up">
    <span class="text-danger fw-bold text-uppercase tracking-wider small">E-Service</span>
    <h2 class="fw-800 mt-2">Layanan <span class="text-danger">Digital</span></h2>
    <div class="mx-auto bg-danger mb-3" style="width: 50px; height: 3px; border-radius: 10px;"></div>
    <p class="text-muted mx-auto fs-3 fw-normal" style="max-width: 800px; line-height: 1.6;">
    Pemerintah Desa Sidomulyo kini hadir lebih dekat dalam genggaman Anda. 
    <span class="d-block d-md-inline">Akses layanan publik dengan cepat, mudah, dan transparan.</span>
</p>
  </div>

  <div class="container">
    <div class="row gy-4">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-card position-relative p-5 shadow-sm rounded-5 bg-white h-100 overflow-hidden">
          <div class="service-decorator"></div>
          <div class="icon-circle mb-4 d-inline-flex align-items-center justify-content-center bg-danger-subtle rounded-4">
            <i class="bi bi-megaphone-fill text-danger fs-3"></i>
          </div>
          <a href="{{ route('laporan') }}" class="stretched-link text-decoration-none text-dark">
            <h4 class="fw-bold mb-3">Laporan Warga</h4>
          </a>
          <p class="text-muted small leading-relaxed">Laporkan kejadian atau kendala di lingkungan Anda agar segera ditindaklanjuti oleh petugas desa kami.</p>
          <div class="go-corner">
            <div class="go-arrow">→</div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card position-relative p-5 shadow-sm rounded-5 bg-white h-100 overflow-hidden border-danger-hover">
          <div class="service-decorator"></div>
          <div class="icon-circle mb-4 d-inline-flex align-items-center justify-content-center bg-danger-subtle rounded-4">
            <i class="bi bi-file-earmark-text-fill text-danger fs-3"></i>
          </div>
          <a href="{{ route('pilihSurat') }}" class="stretched-link text-decoration-none text-dark">
            <h4 class="fw-bold mb-3">Surat Online</h4>
          </a>
          <p class="text-muted small leading-relaxed">Urus berbagai surat keterangan (Domisili, SKTM, dll) secara mandiri tanpa perlu antre di Balai Desa.</p>
          <div class="go-corner">
            <div class="go-arrow">→</div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card position-relative p-5 shadow-sm rounded-5 bg-white h-100 overflow-hidden">
          <div class="service-decorator"></div>
          <div class="icon-circle mb-4 d-inline-flex align-items-center justify-content-center bg-danger-subtle rounded-4">
            <i class="bi bi-chat-left-heart-fill text-danger fs-3"></i>
          </div>
          <a href="#contact" class="stretched-link text-decoration-none text-dark">
            <h4 class="fw-bold mb-3">Kritik & Saran</h4>
          </a>
          <p class="text-muted small leading-relaxed">Sampaikan aspirasi dan masukan Anda untuk pembangunan desa. Privasi pelapor kami jamin sepenuhnya.</p>
          <div class="go-corner">
            <div class="go-arrow">→</div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <style>
    .bg-light-subtle { background-color: #f9fbff; }
    .fw-800 { font-weight: 800; }
    
    .service-card {
      border: 1px solid rgba(0,0,0,0.03);
      transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
      z-index: 1;
    }

    .icon-circle {
      width: 70px;
      height: 70px;
      transition: all 0.5s ease;
    }

    .service-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 20px 40px rgba(220, 53, 69, 0.12) !important;
      border-color: rgba(220, 53, 69, 0.2);
    }

    .service-card:hover .icon-circle {
      background-color: #dc3545 !important;
      transform: rotateY(360deg);
    }

    .service-card:hover .icon-circle i {
      color: #fff !important;
    }

    .service-card h4 {
      transition: color 0.3s ease;
    }

    .service-card:hover h4 {
      color: #dc3545 !important;
    }

    /* Dekorasi Sudut */
    .go-corner {
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      width: 32px;
      height: 32px;
      overflow: hidden;
      top: 0;
      right: 0;
      background-color: #dc3545;
      border-radius: 0 4px 0 32px;
      opacity: 0;
      transition: all 0.3s ease;
    }

    .go-arrow {
      margin-top: -4px;
      margin-right: -4px;
      color: white;
      font-family: courier, sans-serif;
    }

    .service-card:hover .go-corner {
      opacity: 1;
      width: 45px;
      height: 45px;
    }

    /* Background Decorator */
    .service-decorator {
      position: absolute;
      width: 100px;
      height: 100px;
      background: radial-gradient(circle, rgba(220, 53, 69, 0.05) 0%, transparent 70%);
      top: -50px;
      right: -50px;
      z-index: -1;
      transition: all 0.5s ease;
    }

    .service-card:hover .service-decorator {
      transform: scale(3);
    }
  </style>

</section><!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="pengumuman" class="call-to-action section dark-background position-relative py-5">
  
  <img src="{{ asset('assets/img/cta-bg.jpg') }}" alt="Pengumuman Sidomulyo" class="position-absolute w-100 h-100 object-fit-cover top-0 start-0">
  <div class="cta-overlay position-absolute w-100 h-100 top-0 start-0"></div>

  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center gy-4" data-aos="zoom-in">
      
      <div class="col-xl-9 text-center text-xl-start">
        <div class="d-flex align-items-center justify-content-center justify-content-xl-start mb-3">
            <span class="badge bg-danger px-3 py-2 rounded-pill mb-2 mb-xl-0 me-3 shadow pulse-red">PENGUMUMAN TERBARU</span>
        </div>
        <h3 class="fw-bold display-6 text-white mb-3">Pemberitahuan <span class="text-danger">Warga</span></h3>
        <p class="fs-5 text-white-50 lh-base">
          Diberitahukan kepada seluruh warga Desa Sidomulyo bahwa pelayanan 
          administrasi desa tutup pada tanggal <strong>17 Agustus 2026</strong> dalam rangka 
          Hari Kemerdekaan RI. Pelayanan akan dibuka kembali pada hari kerja berikutnya.
        </p>
      </div>

      <div class="col-xl-3 text-center text-xl-end">
        <a class="cta-btn-modern" href="#recent-posts">
            <span>Lihat Berita</span>
            <i class="bi bi-arrow-right-short fs-4"></i>
        </a>
      </div>

    </div>
  </div>

  <style>
    /* Overlay untuk memastikan teks terbaca */
    .cta-overlay {
        background: linear-gradient(90deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 100%);
    }

    /* Tombol CTA Modern agar tidak putih saat dihover */
    .cta-btn-modern {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #ffffff;
        border: 2px solid #dc3545;
        padding: 12px 35px;
        font-weight: 700;
        font-size: 16px;
        text-transform: uppercase;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.4s ease;
        background: transparent;
    }

    .cta-btn-modern:hover {
        background: #dc3545;
        color: #ffffff !important; /* Teks tetap putih saat hover */
        box-shadow: 0 10px 20px rgba(220, 53, 69, 0.4);
        transform: scale(1.05);
    }

    /* Efek Pulse pada Badge */
    .pulse-red {
        animation: pulse-animation 2s infinite;
    }

    @keyframes pulse-animation {
        0% { box-shadow: 0 0 0 0px rgba(220, 53, 69, 0.7); }
        100% { box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
    }
  </style>

</section>
<!-- /Call To Action Section -->

    <!-- Features Section -->
    <section id="profil-desa" class="features section py-5 bg-white overflow-hidden">
  <div class="container">

    <div class="section-title text-center mb-5" data-aos="fade-up">
      <span class="text-danger fw-bold text-uppercase tracking-wider small">Eksplorasi</span>
      <h2 class="fw-800 mt-2">Profil <span class="text-danger">Desa</span></h2>
      <div class="mx-auto bg-danger mb-3" style="width: 50px; height: 3px; border-radius: 10px;"></div>
      <p class="text-muted mx-auto fs-3 fw-light" style="max-width: 800px; line-height: 1.5;">
    Mengenal lebih dekat <span class="text-dark fw-bold">identitas</span>, 
    tata ruang, dan <span class="text-dark fw-bold">potensi unggulan</span> Desa Sidomulyo.
</p>
    </div>

    <div class="row gy-5 align-items-center">
      
      <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
        <div class="position-relative overflow-hidden rounded-5 shadow-lg profile-img-wrapper border border-5 border-white">
          <img src="{{ asset('assets/img/features-bg.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover shadow-inner" alt="Kantor Balai Desa Sidomulyo">
          
          <div class="position-absolute top-0 start-0 w-100 h-100 bg-overlay-premium"></div>
          
          <div class="position-absolute bottom-0 start-0 p-5 text-white animate__animated animate__fadeInUp">
            <div class="d-flex align-items-center mb-2">
                <div class="bg-danger rounded-circle me-2" style="width: 10px; height: 10px;"></div>
                <small class="text-uppercase fw-bold tracking-wider opacity-75">Pusat Pemerintahan</small>
            </div>
            <h4 class="fw-800 mb-0">Kantor Balai Desa</h4>
            <p class="small opacity-90 mb-0">Melayani dengan integritas untuk warga Sidomulyo.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 order-1 order-lg-2">
        <div class="ps-lg-5">
          
          <div class="features-item d-flex p-4 rounded-5 mb-4 shadow-hover border-start-custom transition-all" data-aos="fade-up">
            <div class="icon-box-premium me-4 bg-danger-subtle rounded-4 d-flex align-items-center justify-content-center">
              <i class="bi bi-people-fill text-danger fs-3"></i>
            </div>
            <div class="flex-grow-1">
              <h5 class="fw-800 mb-1">Struktur Organisasi</h5>
              <p class="text-muted small mb-0">Dikelola oleh perangkat desa kompeten dari jajaran Pemerintah Desa hingga RT/RW yang responsif.</p>
            </div>
            <div class="align-self-center">
                <i class="bi bi-chevron-right text-light-gray"></i>
            </div>
          </div>

          <div class="features-item d-flex p-4 rounded-5 mb-4 shadow-hover border-start-custom transition-all" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box-premium me-4 bg-danger-subtle rounded-4 d-flex align-items-center justify-content-center">
              <i class="bi bi-map-fill text-danger fs-3"></i>
            </div>
            <div class="flex-grow-1">
              <h5 class="fw-800 mb-1">Geografis Wilayah</h5>
              <p class="text-muted small mb-0">Wilayah strategis seluas ± 350 Ha di Kecamatan Deket yang terbagi dalam 4 dusun tertata.</p>
            </div>
            <div class="align-self-center">
                <i class="bi bi-chevron-right text-light-gray"></i>
            </div>
          </div>

          <div class="features-item d-flex p-4 rounded-5 shadow-hover border-start-custom transition-all" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box-premium me-4 bg-danger-subtle rounded-4 d-flex align-items-center justify-content-center">
              <i class="bi bi-graph-up-arrow text-danger fs-3"></i>
            </div>
            <div class="flex-grow-1">
              <h5 class="fw-800 mb-1">Potensi Ekonomi</h5>
              <p class="text-muted small mb-0">Sentra pertanian unggulan, pemberdayaan UMKM lokal, dan pengembangan potensi wisata desa.</p>
            </div>
            <div class="align-self-center">
                <i class="bi bi-chevron-right text-light-gray"></i>
            </div>
          </div>

        </div>
      </div>
      
    </div>
  </div>

  <style>
    .fw-800 { font-weight: 800; }
    .tracking-wider { letter-spacing: 1.5px; }
    .bg-danger-subtle { background-color: #fff5f5; }
    .text-light-gray { color: #e0e0e0; }

    /* Wrapper Image */
    .profile-img-wrapper {
      height: 500px;
      transition: all 0.5s ease;
    }
    
    .bg-overlay-premium {
      background: linear-gradient(180deg, rgba(0,0,0,0) 40%, rgba(0,0,0,0.85) 100%);
    }

    /* Features Item Styling */
    .features-item {
      background: #ffffff;
      border: 1px solid rgba(0,0,0,0.02);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      cursor: pointer;
    }

    .border-start-custom {
      border-left: 5px solid #dc3545 !important;
    }

    .icon-box-premium {
      min-width: 65px;
      height: 65px;
      transition: all 0.3s ease;
    }

    /* Hover Effects */
    .features-item:hover {
      transform: scale(1.03) translateX(10px);
      box-shadow: 0 15px 35px rgba(220, 53, 69, 0.08) !important;
      background: #fffdfd;
      border-color: rgba(220, 53, 69, 0.2);
    }

    .features-item:hover .icon-box-premium {
      background-color: #dc3545 !important;
      color: #fff !important;
    }

    .features-item:hover .icon-box-premium i {
      color: #fff !important;
      transform: scale(1.1);
    }

    .features-item:hover .text-light-gray {
      color: #dc3545;
      transform: translateX(5px);
    }

    @media (max-width: 991px) {
      .profile-img-wrapper { height: 350px; }
      .ps-lg-5 { padding-left: 0 !important; }
    }
  </style>
</section>
<!-- /Features Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section py-5 bg-light">
  <div class="container section-title text-center mb-5" data-aos="fade-up">
    <span class="text-danger fw-bold text-uppercase tracking-wider small">Pemerintahan Desa</span>
    <h2 class="fw-800 mt-2">Struktur <span class="text-danger">Organisasi</span></h2>
    <div class="mx-auto bg-danger mb-3" style="width: 50px; height: 3px; border-radius: 10px;"></div>
    <h3 class="text-muted mx-auto" style="max-width: 600px;">Mengenal lebih dekat para perangkat masyarakat yang berdedikasi untuk Desa Sidomulyo.</h3>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-3 g-md-4 justify-content-center">

      @foreach($perangkat as $staff)
      <div class="col-xl-3 col-lg-4 col-md-6 col-6">
        <div class="staff-card shadow-sm bg-white rounded-5 overflow-hidden transition-all h-100">
          
          <div class="staff-img-wrapper position-relative overflow-hidden">
            <img src="{{ $staff->foto ? asset('storage/' . $staff->foto) : 'https://ui-avatars.com/api/?name='.urlencode($staff->nama).'&background=f8d7da&color=dc3545&size=500' }}" 
                 class="img-fluid w-100 staff-portrait" 
                 alt="{{ $staff->nama }}">
            
            <div class="staff-overlay d-flex align-items-end p-2 p-md-3">
                <div class="overlay-content bg-white bg-opacity-75 backdrop-blur rounded-4 p-2 w-100 text-center shadow-sm">
                    <small class="fw-bold text-danger d-block text-truncate" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                        {{ strtoupper($staff->jabatan) }}
                    </small>
                </div>
            </div>
          </div>

          <div class="p-3 p-md-4 text-center card-body-custom">
            <h6 class="fw-800 mb-1 text-dark text-truncate staff-name">{{ $staff->nama }}</h6>
            
            <div class="badge-jabatan mb-2">
                <span class="badge bg-danger-subtle text-danger rounded-pill fw-600">
                    {{ $staff->jabatan }}
                </span>
            </div>
            
            @if($staff->nip)
              <p class="text-muted mb-0 font-monospace nip-text">NIP. {{ $staff->nip }}</p>
            @else
              <p class="text-muted mb-0 opacity-50 small nip-text">Perangkat Desa</p>
            @endif
          </div>

        </div>
      </div>
      @endforeach

    </div>
  </div>

  <style>
    .fw-800 { font-weight: 800; }
    .fw-600 { font-weight: 600; }
    
    .staff-card {
        border: 1px solid rgba(0,0,0,0.02);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
        /* Penting untuk mobile touch feedback */
        -webkit-tap-highlight-color: transparent;
    }

    .staff-img-wrapper {
        aspect-ratio: 3/4;
        background-color: #f1f3f5;
    }

    .staff-portrait {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    /* Efek Interaktif (Hover & Active/Touch) */
    @media (hover: hover) {
        .staff-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
        }
        .staff-card:hover .staff-portrait {
            transform: scale(1.08);
        }
        .staff-card:hover .staff-overlay {
            opacity: 1;
        }
    }

    /* Efek saat layar disentuh di HP */
    .staff-card:active {
        transform: scale(0.97);
        background-color: #fdfdfd;
    }

    /* Glassmorphism effect untuk overlay */
    .backdrop-blur {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .staff-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        opacity: 0; /* Tersembunyi default */
        transition: opacity 0.3s ease;
        background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
    }

    .bg-danger-subtle {
        background-color: #fff5f5 !important;
        border: 1px solid rgba(232, 69, 69, 0.1);
    }

    /* Responsive Typography */
    .staff-name {
        font-size: 0.9rem;
    }

    .badge-jabatan .badge {
        font-size: 0.65rem;
        padding: 5px 10px;
    }

    .nip-text {
        font-size: 0.6rem;
    }

    @media (min-width: 768px) {
        .staff-name { font-size: 1.1rem; }
        .badge-jabatan .badge { font-size: 0.75rem; }
        .nip-text { font-size: 0.7rem; }
        .staff-overlay { opacity: 0; } /* Munculkan hanya di hover */
    }

    /* Memastikan teks tidak berantakan */
    .text-truncate {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
  </style>
</section>

<style>
    .transition-hover {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        border-color: #f1f3f5;
    }
    .staff-img {
        transition: transform 0.5s ease;
    }
    .client-logo-card:hover .staff-img {
        transform: scale(1.08);
    }
    .img-container {
        background-color: #f8f9fa;
    }
</style><!-- /Clients Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section dark-background position-relative overflow-hidden py-5">

  <img src="{{ asset('assets/img/stats-bg.jpg') }}" alt="Statistik Sidomulyo" data-aos="fade-in" class="position-absolute w-100 h-100 object-fit-cover top-0 start-0">
  <div class="position-absolute w-100 h-100 top-0 start-0" style="background: rgba(0,0,0,0.7);"></div>

  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

    <div class="text-center mb-5">
      <h3 class="fw-bold text-white mb-2">Statistik Desa <span class="text-danger">Sidomulyo</span></h3>
      <p class="text-light opacity-75">Gambaran umum data kependudukan dan potensi desa saat ini</p>
      <div class="mx-auto bg-danger" style="width: 60px; height: 4px; border-radius: 2px;"></div>
    </div>

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
  <div class="stats-item text-center w-100 h-100 p-4 rounded-4 glass-card">
    <i class="bi bi-people fs-1 text-danger mb-3 d-block"></i>
    <span data-purecounter-start="0" data-purecounter-end="{{ $totalWarga ?? 0 }}" data-purecounter-duration="1" class="purecounter display-5 fw-bold text-white"></span>
    <p class="text-white-50 mb-0 mt-2 fw-bold text-uppercase small" style="letter-spacing: 1px;">Jumlah Penduduk</p>
  </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100 p-4 rounded-4 glass-card">
          <i class="bi bi-house-door fs-1 text-danger mb-3 d-block"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{ $kepalaKeluarga }}" data-purecounter-duration="1" class="purecounter display-5 fw-bold text-white"></span>
          <p class="text-white-50 mb-0 mt-2 fw-bold text-uppercase small " style="letter-spacing: 1px;">Kepala Keluarga</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100 p-4 rounded-4 glass-card">
          <i class="bi bi-shop fs-1 text-danger mb-3 d-block"></i>
          <span data-purecounter-start="0" data-purecounter-end="145" data-purecounter-duration="1" class="purecounter display-5 fw-bold text-white"></span>
          <p class="text-light opacity-75 mb-0 mt-2 fw-bold text-uppercase small">UMKM Aktif</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100 p-4 rounded-4 glass-card">
          <i class="bi bi-person-badge fs-1 text-danger mb-3 d-block"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{ $jumPerangkat }}" data-purecounter-duration="1" class="purecounter display-5 fw-bold text-white"></span>
          <p class="text-light opacity-75 mb-0 mt-2 fw-bold text-uppercase small">Perangkat Desa</p>
        </div>
      </div>

    </div>
  </div>

 <style>
  /* Base Card Style */
  .glass-card {
    background: rgba(0, 0, 0, 0.3); /* Default lebih gelap agar teks putih aman */
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }
  
  /* Hover State: Mempertegas Kontras */
  .glass-card:hover {
    background: rgba(220, 53, 69, 0.15); /* Background berubah merah transparan tipis */
    border-color: #dc3545; /* Border merah tegas */
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
  }

  /* Memastikan teks tetap putih saat di-hover */
  .glass-card:hover .purecounter, 
  .glass-card:hover p, 
  .glass-card:hover i {
    color: #ffffff !important;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5); /* Shadow agar teks makin 'keluar' */
  }

  .purecounter {
    display: block;
    line-height: 1.2;
  }
</style>
</section><!-- /Stats Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section" style="background-color: #ffffff;">

  <div class="container section-title text-center mb-5" data-aos="fade-up">
    <span class="text-muted small fw-bold text-uppercase tracking-wider">Dokumentasi Desa</span>
    <h2 class="fw-800 mt-2">Galeri <span class="text-danger">Kegiatan</span></h2>
    <div class="mx-auto bg-danger mb-4" style="width: 50px; height: 3px; border-radius: 10px;"></div>
    <h3 class="text-muted mx-auto" style="max-width: 600px;">Momen berharga dan potret kegiatan kemasyarakatan di Desa Sidomulyo</h3>
  </div>

  <div class="container-fluid px-md-5">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <div class="filter-wrapper mb-4" data-aos="fade-up" data-aos-delay="100">
        <ul class="portfolio-filters isotope-filters d-flex justify-content-start justify-content-md-center flex-nowrap flex-md-wrap gap-2 pb-3 pb-md-0">
          <li data-filter="*" class="filter-active px-4 py-2 rounded-pill shadow-sm text-nowrap">Semua</li>
          @foreach($categories as $cat)
            <li data-filter=".filter-{{ Str::slug($cat->kategori) }}" class="px-4 py-2 rounded-pill shadow-sm text-nowrap">
              {{ $cat->kategori }}
            </li>
          @endforeach
        </ul>
      </div>

      <div class="row gy-3 gy-md-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        
        @foreach($galeries as $item)
        <div class="col-lg-4 col-md-6 col-6 portfolio-item isotope-item filter-{{ Str::slug($item->kategori) }}">
          <div class="gallery-card rounded-4 overflow-hidden position-relative shadow-sm border-0">
            
            <div class="category-badge position-absolute z-3 bg-danger text-white px-2 py-1 rounded-pill fw-bold" style="top: 10px; left: 10px;">
                {{ $item->kategori }}
            </div>

            <img src="{{ asset('storage/galeri/' . $item->gambar) }}" class="img-fluid transition-img" alt="{{ $item->judul }}">
            
            <div class="gallery-overlay d-flex flex-column justify-content-end p-2 p-md-4">
              <div class="overlay-content translate-y-20 transition-all duration-300">
                <h6 class="text-white fw-bold mb-1 gallery-title">{{ Str::limit($item->judul, 25) }}</h6>
                <p class="text-white-50 d-none d-md-block mb-3" style="font-size: 0.75rem;">{{ Str::limit($item->keterangan, 45) }}</p>
                
                <div class="d-flex justify-content-between align-items-center">
                  <a href="{{ asset('storage/galeri/' . $item->gambar) }}" 
                     title="{{ $item->judul }}" 
                     data-gallery="portfolio-gallery-{{ Str::slug($item->kategori) }}" 
                     class="glightbox btn btn-light btn-sm rounded-circle shadow-sm">
                     <i class="bi bi-zoom-in text-danger fs-6"></i>
                  </a>
                  <span class="d-md-none text-white-50" style="font-size: 0.6rem;">Tap for info</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

  <style>
    .fw-800 { font-weight: 800; }
    
    /* Horizontal Scroll untuk Filter di HP */
    .filter-wrapper {
        overflow-x: auto;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE/Edge */
    }
    .filter-wrapper::-webkit-scrollbar {
        display: none; /* Chrome/Safari */
    }

    .portfolio-filters {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .portfolio-filters li {
        cursor: pointer;
        transition: all 0.3s ease;
        background: #f8f9fa;
        color: #666;
        font-weight: 600;
        font-size: 13px;
        border: 1px solid #eee;
        -webkit-tap-highlight-color: transparent;
    }
    .portfolio-filters li.filter-active {
        background: #dc3545 !important;
        color: #fff !important;
        border-color: #dc3545;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3) !important;
    }

    /* Card Galeri Adaptif */
    .gallery-card {
        aspect-ratio: 1/1; /* Kotak di HP lebih rapi */
        background: #222;
        -webkit-tap-highlight-color: transparent;
    }
    
    @media (min-width: 768px) {
        .gallery-card { aspect-ratio: 4/3; }
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.2, 1, 0.22, 1);
    }

    /* Tampilan Mobile: Overlay terlihat sedikit di bagian bawah atau muncul saat di-tap */
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 60%, transparent 100%);
        opacity: 0;
        transition: all 0.4s ease;
    }

    /* Desktop Hover */
    @media (hover: hover) {
        .gallery-card:hover img { transform: scale(1.1); }
        .gallery-card:hover .gallery-overlay { opacity: 1; }
        .gallery-card:hover .translate-y-20 { transform: translateY(0); }
    }

    /* Mobile Interaction: Overlay muncul saat aktif/di-tap */
    @media (max-width: 767px) {
        .gallery-card:active .gallery-overlay {
            opacity: 1;
        }
        .gallery-title { font-size: 0.8rem; }
        .category-badge { font-size: 8px !important; }
    }

    .translate-y-20 { transform: translateY(20px); }
    
    /* Glassmorphism Badge */
    .category-badge {
        font-size: 10px;
        letter-spacing: 0.5px;
        backdrop-filter: blur(4px);
        background: rgba(220, 53, 69, 0.9) !important;
    }

    .btn-light.rounded-circle {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
  </style>
</section><!-- /Portfolio Section -->

    <!-- Pricing Section -->
    

    <!-- Faq Section -->
    <section id="faq" class="faq section py-5">

  <div class="container">
    <div class="row gy-5 align-items-center">

      <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

        <div class="content px-xl-5 mb-4" data-aos="fade-up">
          <h3 class="fw-bold"><span class="text-dark">Pertanyaan yang Sering </span><span class="text-danger">Diajukan</span></h3>
          <h4 class="text-muted">
            Butuh bantuan cepat? Berikut adalah rangkuman jawaban untuk pertanyaan yang paling sering ditanyakan oleh masyarakat mengenai layanan Desa Sidomulyo.
          </h4>
        </div>

        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

          <div class="faq-item faq-active shadow-sm border rounded-4 mb-3 p-3">
            <i class="faq-icon bi bi-question-circle-fill text-danger"></i>
            <h3 class="fw-bold fs-6">Bagaimana cara membuat surat keterangan secara online?</h3>
            <div class="faq-content mt-2">
              <p class="text-muted mb-0">
                Warga cukup masuk ke menu <strong>Layanan Surat</strong>, pilih jenis surat yang dibutuhkan, unggah dokumen persyaratan (seperti KTP/KK), dan tunggu verifikasi dari admin desa melalui sistem atau WhatsApp.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item shadow-sm border rounded-4 mb-3 p-3">
            <i class="faq-icon bi bi-clock-fill text-danger"></i>
            <h3 class="fw-bold fs-6">Kapan jam operasional pelayanan di Kantor Desa?</h3>
            <div class="faq-content mt-2">
              <p class="text-muted mb-0">
                Pelayanan tatap muka tersedia setiap hari <strong>Senin s/d Jumat</strong> pukul 08.00 - 15.00 WIB. Namun, pengajuan surat online dapat dilakukan 24 jam melalui website ini.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item shadow-sm border rounded-4 mb-3 p-3">
            <i class="faq-icon bi bi-chat-heart-fill text-danger"></i>
            <h3 class="fw-bold fs-6">Di mana saya bisa memberikan usul pembangunan desa?</h3>
            <div class="faq-content mt-2">
              <p class="text-muted mb-0">
                Anda dapat menggunakan fitur <strong>Kritik & Saran</strong> di bagian bawah website atau menu Laporan Warga untuk memberikan aspirasi demi kemajuan Desa Sidomulyo.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

        </div>
      </div>

      <div class="col-lg-5 order-1 order-lg-2 text-center" data-aos="zoom-in" data-aos-delay="300">
        <div class="image-stack position-relative d-inline-block">
          <img src="{{ asset('assets/img/faq.jpg') }}" class="img-fluid rounded-5 shadow-lg" alt="Layanan Sidomulyo" style="border: 8px solid white;">
          <div class="position-absolute bottom-0 start-0 bg-danger p-3 rounded-4 shadow-lg d-none d-md-block" style="transform: translate(-30%, 30%);">
             <i class="bi bi-headset fs-1 text-white"></i>
          </div>
        </div>
      </div>

    </div>
  </div>

  <style>

    html {
    scroll-behavior: smooth;
    }
    .faq .faq-item {
      cursor: pointer;
      background: #fff;
      transition: all 0.3s ease;
      position: relative;
    }

    .faq .faq-item:hover {
      border-color: #dc3545 !important;
      background: #fff8f8;
    }

    .faq .faq-item h3 {
      padding: 0 30px 0 32px;
      margin: 0;
      transition: color 0.3s ease;
    }

    .faq .faq-item .faq-icon {
      position: absolute;
      left: 15px;
      top: 18px;
      font-size: 20px;
    }

    .faq .faq-item .faq-toggle {
      position: absolute;
      right: 20px;
      top: 20px;
      font-size: 16px;
      transition: 0.3s;
    }

    .faq .faq-active .faq-toggle {
      transform: rotate(90deg);
      color: #dc3545;
    }

    .faq .faq-active {
      border-left: 4px solid #dc3545 !important;
    }
  </style>

</section><!-- /Faq Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Berita <span class="text-danger">Desa</span></h2>
        <p>Informasi terbaru dari Desa Sidomulyo</p>
    </div><div class="container">
        <div class="row gy-4">

            @forelse($beritas as $item)
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <article class="h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white">

                    <div class="post-img" style="height: 250px; overflow: hidden;">
                        @if($item->gambar_berita)
                            <img src="{{ asset('storage/' . $item->gambar_berita) }}" alt="{{ $item->nama_berita }}" class="img-fluid w-100 h-100 object-fit-cover transition-scale">
                        @else
                            <img src="{{ asset('storage/uploads/berita/template.png') }}" alt="Default Image" class="img-fluid w-100 h-100 object-fit-cover">
                        @endif
                    </div>

                    <div class="p-4">
                        <p class="post-category text-danger fw-bold small mb-2">#BeritaSidomulyo</p>

                        <h2 class="title h5 fw-bold mb-3">
                            <a href="/berita/{{ $item->slug }}" class="text-dark text-decoration-none hover-danger">
                                {{ $item->nama_berita }}
                            </a>
                        </h2>

                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <div class="post-meta">
                                <p class="post-date mb-0 text-muted small">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <time datetime="{{ $item->created_at }}">{{ $item->created_at->translatedFormat('d M Y') }}</time>
                                </p>
                            </div>
                            <a href="/berita/{{ $item->slug }}" class="readmore stretched-link"><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </article>
            </div>@empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-newspaper display-1 text-muted"></i>
                <p class="mt-3 text-muted">Belum ada berita terbaru saat ini.</p>
            </div>
            @endforelse

        </div></div>

    <style>
        .transition-scale {
            transition: transform 0.3s ease;
        }
        article:hover .transition-scale {
            transform: scale(1.1);
        }
        .hover-danger:hover {
            color: #dc3545 !important;
        }
        .object-fit-cover {
            object-fit: cover;
        }
    </style>

</section><!-- /Recent Posts Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section" style="background-color: #fcfcfc;">

  <div class="container section-title" data-aos="fade-up">
    <span class="text-muted small fw-bold text-uppercase tracking-wider">Hubungi Kami</span>
    <h2 class="fw-800 mt-2">Kritik & <span class="text-danger">Saran</span></h2>
    <div class="mx-auto bg-danger mb-4" style="width: 50px; height: 3px; border-radius: 10px;"></div>
    <p class="text-secondary">Sampaikan aspirasi Anda untuk kemajuan Desa Sidomulyo yang lebih baik</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-5">

      <div class="col-lg-5">
        <div class="contact-info-card bg-white p-4 p-md-5 shadow-sm rounded-5 h-100 border-0">
          <h4 class="fw-bold mb-4 text-dark">Informasi Kontak</h4>
          
          <div class="info-list d-flex flex-column gap-4">
            <div class="d-flex align-items-start">
              <div class="icon-circle bg-danger-subtle text-danger me-3">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <div>
                <p class="data-label mb-0">Lokasi Kantor</p>
                <p class="data-value small">Jl. Sambo Pinggir, Kec. Deket, Kab. Lamongan</p>
              </div>
            </div>

            <div class="d-flex align-items-start">
              <div class="icon-circle bg-danger-subtle text-danger me-3">
                <i class="bi bi-envelope-open-fill"></i>
              </div>
              <div>
                <p class="data-label mb-0">Email Resmi</p>
                <p class="data-value small">sidomulyo@gmail.com</p>
              </div>
            </div>

            <div class="d-flex align-items-start">
              <div class="icon-circle bg-danger-subtle text-danger me-3">
                <i class="bi bi-whatsapp"></i>
              </div>
              <div>
                <p class="data-label mb-0">WhatsApp</p>
                <p class="data-value small">08123456789</p>
              </div>
            </div>
          </div>

          <div class="mt-5 rounded-4 overflow-hidden shadow-sm border">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15842.152862908226!2d112.4452!3d-7.1129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77f10000000001%3A0x0!2zN8KwMDYnNDYuNCJTIDExMsKwMjYnNDIuNyJF!5e0!3m2!1sid!2sid!4v1712960000000!5m2!1sid!2sid" 
              width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="bg-white p-4 p-md-5 shadow-sm rounded-5 border-0 position-relative overflow-hidden h-100">
          <div class="position-absolute bg-danger opacity-10 rounded-circle" style="width: 200px; height: 200px; top: -100px; right: -100px;"></div>
          
          <h4 class="fw-bold mb-4 text-dark">Formulir Aspirasi</h4>

          @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center">
               <i class="bi bi-check-circle-fill me-2 fs-4"></i> {{ session('success') }}
            </div>
          @endif

          <form action="{{ route('warga.kritik') }}" method="post" class="position-relative">
            @csrf
            <div class="row g-4">
              <div class="col-md-6">
                <div class="form-floating mb-0">
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="floatingNama" placeholder="Nama" value="{{ old('nama') }}" required>
                  <label for="floatingNama">Nama Lengkap</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating mb-0">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder="Email" value="{{ old('email') }}" required>
                  <label for="floatingEmail">Alamat Email</label>
                </div>
              </div>

              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" placeholder="Pesan" id="floatingPesan" style="height: 180px" required>{{ old('pesan') }}</textarea>
                  <label for="floatingPesan">Tuliskan Aspirasi Anda...</label>
                </div>
              </div>

              <div class="col-12 text-end">
                <button type="submit" class="btn btn-danger px-5 py-3 rounded-pill fw-bold shadow-sm btn-hover-grow">
                  Kirim Aspirasi <i class="bi bi-send-fill ms-2"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <style>
    .fw-800 { font-weight: 800; }
    .tracking-wider { letter-spacing: 2px; }
    
    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .bg-danger-subtle { background-color: #fff5f5; }
    
    .data-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #adb5bd;
        text-transform: uppercase;
    }

    .data-value {
        font-weight: 600;
        color: #343a40;
    }

    /* Floating Input Custom Style */
    .form-floating > .form-control {
        border-radius: 15px;
        border: 1px solid #eee;
        padding-left: 1.5rem;
    }

    .form-floating > .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.05);
    }

    .btn-hover-grow {
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .btn-hover-grow:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 30px rgba(220, 53, 69, 0.3) !important;
    }

    .contact-info-card {
        border-top: 5px solid #dc3545 !important;
    }
  </style>

</section>

  </main>

  <footer id="footer" class="footer dark-background py-5">
  <div class="container">
    @auth('warga')
<div class="announcement-footer shadow-lg">
    <div class="announcement-wrapper">
        <div class="announcement-label">
            <i class="bi bi-megaphone-fill"></i>
            <span class="d-none d-md-inline ms-2">INFO</span>
        </div>
        <div class="announcement-content">
            <div class="scrolling-text">
                Selamat Datang, **{{ Auth::guard('warga')->user()->nama_warga }}**! Selamat menggunakan Layanan Digital Desa Sidomulyo. 
                <span class="mx-4 text-danger">|</span> 
                Pastikan data profil Anda sudah lengkap untuk mempermudah pengajuan surat secara mandiri.
                <span class="mx-4 text-danger">|</span> 
                Ada kendala? Gunakan menu Laporan Warga untuk menghubungi admin desa.
            </div>
        </div>
    </div>
</div>

<style>
    /* Penempatan di paling bawah layar */
    .announcement-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 9999; /* Agar tidak tertutup elemen lain */
        background: #fff;
        border-top: 2px solid #e84545;
    }

    .announcement-wrapper {
        display: flex;
        align-items: center;
        overflow: hidden;
        height: 40px; /* Sedikit lebih tipis agar tidak makan tempat */
    }

    .announcement-label {
        background: #e84545;
        color: white;
        padding: 0 15px;
        height: 100%;
        display: flex;
        align-items: center;
        font-weight: 800;
        font-size: 0.75rem;
        z-index: 10;
        box-shadow: 10px 0 15px rgba(0,0,0,0.1);
    }

    .announcement-content {
        flex: 1;
        overflow: hidden;
        white-space: nowrap;
        display: flex;
        align-items: center;
        background: #fdfdfd;
    }

    .scrolling-text {
        display: inline-block;
        padding-left: 100%;
        animation: scroll-left 30s linear infinite; /* Sedikit lebih lambat agar nyaman dibaca */
        font-weight: 500;
        color: #334155;
        font-size: 0.85rem;
    }

    .announcement-wrapper:hover .scrolling-text {
        animation-play-state: paused;
    }

    @keyframes scroll-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    /* Padding tambahan untuk body agar konten paling bawah tidak tertutup footer ini */
    body {
        padding-bottom: 45px; 
    }

    @media (max-width: 768px) {
        .announcement-label { padding: 0 10px; }
        .scrolling-text { 
            font-size: 0.8rem;
            animation-duration: 20s; 
        }
    }
</style>
@endauth
    <div class="row gy-4">
      
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="/" class="d-flex align-items-center text-decoration-none">
          <h3 class="sitename text-white fw-bold mb-0">Desa <span class="text-danger">Sidomulyo</span></h3>
        </a>
        <p class="mt-3 text-secondary">
          Website resmi Pemerintah Desa Sidomulyo. Kami berkomitmen memberikan transparansi informasi dan kemudahan layanan administrasi bagi seluruh warga.
        </p>
        <div class="social-links d-flex mt-4">
          <a href="#" class="me-2 rounded-circle shadow-sm"><i class="bi bi-facebook"></i></a>
          <a href="#" class="me-2 rounded-circle shadow-sm"><i class="bi bi-instagram"></i></a>
          <a href="#" class="me-2 rounded-circle shadow-sm"><i class="bi bi-youtube"></i></a>
          <a href="#" class="rounded-circle shadow-sm"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4 class="text-white fw-bold mb-3 small-title">Tautan Cepat</h4>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-chevron-right text-danger small"></i> <a href="#hero" class="text-secondary text-decoration-none hover-white">Beranda</a></li>
          <li class="mb-2"><i class="bi bi-chevron-right text-danger small"></i> <a href="#about" class="text-secondary text-decoration-none hover-white">Profil Desa</a></li>
          <li class="mb-2"><i class="bi bi-chevron-right text-danger small"></i> <a href="#recent-posts" class="text-secondary text-decoration-none hover-white">Berita Terbaru</a></li>
          <li class="mb-2"><i class="bi bi-chevron-right text-danger small"></i> <a href="#contact" class="text-secondary text-decoration-none hover-white">Kritik & Saran</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4 class="text-white fw-bold mb-3 small-title">Layanan</h4>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-chevron-right text-danger small"></i> <a href="/surat" class="text-secondary text-decoration-none hover-white">Persuratan Online</a></li>
          <li class="mb-2"><i class="bi bi-chevron-right text-danger small"></i> <a href="/laporan" class="text-secondary text-decoration-none hover-white">Laporan Warga</a></li>
          <li class="mb-2"><i class="bi bi-chevron-right text-danger small"></i> <a href="/admin/login" class="text-secondary text-decoration-none hover-white">Panel Admin</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12 footer-contact text-md-start">
        <h4 class="text-white fw-bold mb-3 small-title">Kontak Kami</h4>
        <p class="text-secondary mb-1">
          <i class="bi bi-geo-alt-fill text-danger me-2"></i> Jalan Sambo Pinggir, Kec. Deket, Kab. Lamongan
        </p>
        <p class="text-secondary mb-1">
          <i class="bi bi-telephone-fill text-danger me-2"></i> +62 812-3456-789
        </p>
        <p class="text-secondary">
          <i class="bi bi-envelope-fill text-danger me-2"></i> sidomulyo@gmail.com
        </p>
      </div>

    </div>
  </div>

  <div class="container mt-5 pt-4 border-top border-secondary border-opacity-25 text-center">
    <div class="copyright text-secondary small">
      &copy; {{ date('Y') }} <strong class="text-white">Desa Sidomulyo</strong>. All Rights Reserved.
    </div>
    <div class="credits text-muted mt-1" style="font-size: 0.7rem;">
      Dikembangkan secara mandiri untuk kemajuan desa.
    </div>
  </div>

  <style>
    .footer {
      font-size: 0.9rem;
    }
    .small-title {
      font-size: 1.1rem;
      letter-spacing: 1px;
    }
    .footer .social-links a {
      font-size: 1.2rem;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.05);
      color: #fff;
      width: 40px;
      height: 40px;
      transition: 0.3s;
    }
    .footer .social-links a:hover {
      background: #dc3545;
      transform: translateY(-3px);
    }
    .hover-white:hover {
      color: #fff !important;
      padding-left: 5px;
    }
    .footer-links ul li {
      transition: all 0.3s ease;
    }
  </style>
</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
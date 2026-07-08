<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    {{-- CSS dari template asli kamu taruh di sini --}}
   <style>
    :root {
      --sidebar-width: 280px;
      --primary-color: #e84545;
      --dark-bg: #212529;
    }

    body { 
      background-color: #f8f9fa; 
      font-family: 'Poppins', sans-serif; 
      overflow-x: hidden;
    }

    /* Sidebar Smooth Transition */
    .sidebar {
      width: var(--sidebar-width);
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background: var(--dark-bg);
      z-index: 1050;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      padding: 25px 15px;
    }

    .main-wrapper {
      margin-left: var(--sidebar-width);
      min-height: 100vh;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      padding: 30px;
    }

    /* Active State for Links */
    .nav-link {
      color: rgba(255,255,255,0.7);
      padding: 12px 20px;
      border-radius: 12px;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      transition: 0.3s;
      border: 1px solid transparent;
    }

    .nav-link i { font-size: 1.3rem; margin-right: 15px; }

    .nav-link:hover {
      background: rgba(255,255,255,0.05);
      color: white;
      transform: translateX(5px);
    }

    .nav-link.active {
      background: var(--primary-color);
      color: white;
      box-shadow: 0 4px 15px rgba(232, 69, 69, 0.3);
    }

    /* Card Animation */
    .stat-card {
      border: none;
      border-radius: 20px;
      padding: 30px;
      background: white;
      transition: all 0.3s ease;
      height: 100%;
    }

    .stat-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.08) !important;
    }

    /* Responsive Logic */
    @media (max-width: 991.98px) {
      .sidebar { left: calc(-1 * var(--sidebar-width)); }
      .main-wrapper { margin-left: 0; }
      
      .sidebar.show { left: 0; }
      
      /* Overlay saat sidebar muncul di HP */
      .sidebar-overlay {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.5);
        z-index: 1040;
        display: none;
      }
      .sidebar-overlay.show { display: block; }
    }

    /* Hamburger Menu Pulse */
    .btn-toggle {
      width: 45px;
      height: 45px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      border: none;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <x-sidebar />

    <div class="main-wrapper">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button class="btn-toggle d-lg-none" id="toggleBtn">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="text-end w-100">
                 <span class="badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill">
                   <i class="bi bi-calendar3 me-2 text-danger"></i> {{ now()->translatedFormat('d F Y') }}
                 </span>
            </div>
        </div>

        {{ $slot }}
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        const sidebar = document.getElementById('adminSidebar');
        const toggleBtn = document.getElementById('toggleBtn');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleSidebar = () => { sidebar.classList.toggle('show'); overlay.classList.toggle('show'); };
        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>
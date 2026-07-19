<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Desa Sidomulyo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        :root {
            /* Diubah menjadi biru untuk membedakan dengan login warga (merah) */
            --primary-color: #0d6efd; 
            --dark-overlay: rgba(0, 0, 0, 0.7);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f2f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            border: none;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            background: white;
            max-width: 950px;
            width: 100%;
            display: flex;
        }

        /* Bagian Kiri: Visual Admin */
        .login-visual {
            background: linear-gradient(var(--dark-overlay), var(--dark-overlay)), 
                        /* Opsional: Gunakan gambar yang berbeda untuk admin jika ada */
                        url("{{ asset('assets/img/loginDesa.jpg') }}");
            background-size: cover;
            background-position: center;
            width: 50%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
        }

        .login-visual h2 {
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 15px;
            line-height: 1.1;
        }

        /* Bagian Kanan: Form */
        .login-form-side {
            width: 50%;
            padding: 60px;
            position: relative;
        }

        .form-error {
            background-color: #fff5f5;
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .form-floating > .form-control {
            border-radius: 15px;
            border: 1px solid #e9ecef;
            background-color: #f8f9fa;
        }

        .form-floating > .form-control:focus {
            background-color: #fff;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
        }

        .btn-login {
            border-radius: 15px;
            padding: 14px;
            font-weight: 700;
            background: var(--primary-color);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(13, 110, 253, 0.2);
        }

        .divider {
            height: 1px;
            background: #eee;
            margin: 30px 0;
            position: relative;
        }

        @media (max-width: 992px) {
            .login-visual { display: none; }
            .login-form-side { width: 100%; padding: 40px; }
            .login-card { max-width: 500px; }
        }
    </style>
</head>
<body>

    <div class="login-card animate__animated animate__fadeInUp">
        
        <div class="login-visual">
            <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">Administrator Panel</span>
                <h2>Sistem<br>Manajemen Desa</h2>
                <p class="text-white-50">Portal khusus perangkat desa dan administrator sistem E-Government Sidomulyo.</p>
            </div>
        </div>

        <div class="login-form-side d-flex flex-column justify-content-center">
            <div class="animate__animated animate__fadeIn animate__delay-1s">
                
                <div class="mb-4">
                    <h3 class="fw-800 mb-1">Admin Login</h3>
                    <p class="text-muted small">Silakan masuk menggunakan email dinas Anda</p>
                </div>

                {{-- Alert Error --}}
                @if ($errors->any())
                <div class="form-error animate__animated animate__shakeX">
                    <ul class="list-unstyled mb-0 small text-danger">
                        @foreach ($errors->all() as $error)
                            <li><i class="bi bi-exclamation-circle-fill me-2"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('loginFirst'))
                <div class="form-error">
                    <span class="small text-danger"><i class="bi bi-shield-lock-fill me-2"></i> {{ session('loginFirst') }}</span>
                </div>
                @endif

                {{-- Pastikan route ini mengarah ke controller admin --}}
                <form action="{{ route('admin.login.post') }}" method="POST">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="email" 
                               name="email_admin" 
                               class="form-control" 
                               id="floatingEmail" 
                               placeholder="name@example.com" 
                               required>
                        <label for="floatingEmail" class="text-muted">Alamat Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" 
                               name="password" 
                               class="form-control" 
                               id="floatingPassword" 
                               placeholder="Password" 
                               required>
                        <label for="floatingPassword" class="text-muted">Kata Sandi</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                        </div>
                        {{-- Opsional: Matikan fitur lupa password jika ingin lebih ketat --}}
                        <a href="#" class="text-primary small fw-bold text-decoration-none">Lupa Password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-login mb-2">
                        Masuk ke Dashboard <i class="bi bi-shield-lock ms-2"></i>
                    </button>
                </form>

                <div class="divider"></div>
                <div class="text-center">
                    <a href="/" class="btn btn-link btn-sm text-secondary text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Website Warga
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
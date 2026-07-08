<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Desa Sidomulyo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        :root {
            --primary-color: #dc3545;
            --dark-overlay: rgba(0, 0, 0, 0.6);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f2f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .register-card {
            border: none;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            background: white;
            max-width: 1000px; /* Sedikit dikecilkan agar pas dengan form minimalis */
            width: 100%;
            display: flex;
        }

        /* Bagian Kiri: Visual */
        .register-visual {
            background: linear-gradient(var(--dark-overlay), var(--dark-overlay)), 
                        url("{{ asset('assets/img/registerDesa.jpg') }}");
            background-size: cover;
            background-position: center;
            width: 40px; /* Disesuaikan proporsinya */
            width: 40%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
        }

        .register-visual h2 {
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 15px;
        }

        /* Bagian Kanan: Form */
        .register-form-side {
            width: 60%;
            padding: 50px;
        }

        .form-error {
            background-color: #fff5f5;
            border-left: 4px solid var(--primary-color);
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .form-floating > .form-control {
            border-radius: 12px;
            border: 1px solid #e9ecef;
            background-color: #f8f9fa;
        }

        .form-floating > .form-control:focus {
            background-color: #fff;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.1);
        }

        .btn-register {
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            background: var(--primary-color);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #b02a37;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(220, 53, 69, 0.2);
        }

        @media (max-width: 992px) {
            .register-visual { display: none; }
            .register-form-side { width: 100%; padding: 30px; }
            .register-card { max-width: 500px; }
        }
    </style>
</head>
<body>

    <div class="register-card animate__animated animate__fadeInUp">
        
        <div class="register-visual">
            <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                <span class="badge bg-danger mb-3 px-3 py-2 rounded-pill">Registrasi Warga</span>
                <h2>Bergabung <br>Bersama Kami</h2>
                <p class="text-white-50">Daftarkan akun Anda untuk mengakses layanan administrasi digital Desa Sidomulyo.</p>
            </div>
        </div>

        <div class="register-form-side">
            <div class="animate__animated animate__fadeIn animate__delay-1s">
                
                <div class="mb-4">
                    <h3 class="fw-800 mb-1">Buat Akun</h3>
                    <p class="text-muted small">Silakan lengkapi kredensial akun warga Anda</p>
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

                <form action="{{ route('isRegister') }}" method="POST">
                    @csrf
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" 
                                       name="nik" 
                                       class="form-control" 
                                       id="regNik" 
                                       placeholder="NIK" 
                                       maxlength="16" 
                                       pattern="[0-9]*" 
                                       inputmode="numeric" 
                                       style="font-family: monospace; letter-spacing: 1px;"
                                       value="{{ old('nik') }}"
                                       required>
                                <label for="regNik">Nomor Induk Kependudukan (16 Digit)</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" 
                                       name="email_warga" 
                                       class="form-control" 
                                       id="regEmail" 
                                       placeholder="Email" 
                                       value="{{ old('email_warga') }}"
                                       required>
                                <label for="regEmail">Alamat Email Aktif</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" 
                                       name="password_warga" 
                                       class="form-control" 
                                       id="regPass" 
                                       placeholder="Password" 
                                       required>
                                <label for="regPass">Kata Sandi / Password</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 btn-register mt-4 mb-3">
                        Daftar Sekarang <i class="bi bi-person-plus-fill ms-2"></i>
                    </button>

                    <div class="text-center">
                        <p class="small text-muted mb-0">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-danger fw-bold text-decoration-none">Masuk di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
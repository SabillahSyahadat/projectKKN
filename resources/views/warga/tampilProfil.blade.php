@extends('warga.layout')

@section('title', 'Profil Saya - Desa Sidomulyo')

@section('custom-css')
    /* --- Profile Card Styles --- */
    .profile-view-card {
      border: none;
      border-radius: 28px;
      background: var(--card-bg);
      box-shadow: var(--soft-shadow);
      overflow: hidden;
      transition: all 0.4s ease;
    }

    .profile-view-card:hover {
      box-shadow: var(--hover-shadow);
      transform: translateY(-2px);
    }

    .profile-banner {
      background: var(--primary-gradient);
      height: 180px;
      position: relative;
    }
    
    .profile-banner::after {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .profile-user-info {
      text-align: center;
      margin-top: -75px;
      padding: 0 30px 25px;
      position: relative;
      z-index: 2;
    }

    .profile-avatar {
      width: 150px;
      height: 150px;
      background: var(--card-bg);
      border-radius: 50%;
      border: 8px solid var(--soft-bg);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-color);
      font-size: 65px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.08);
      margin-bottom: 20px;
      transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .profile-avatar:hover {
      transform: scale(1.08) rotate(5deg);
    }

    .user-name {
      font-size: 2rem;
      font-weight: 800;
      color: var(--text-main);
      margin-bottom: 8px;
      letter-spacing: -0.5px;
    }

    .user-nik {
      display: inline-flex;
      align-items: center;
      background: var(--primary-light);
      color: var(--primary-color);
      padding: 8px 20px;
      border-radius: 30px;
      font-size: 0.95rem;
      font-weight: 700;
      letter-spacing: 0.5px;
      box-shadow: 0 4px 10px rgba(79, 70, 229, 0.1);
      transition: all 0.3s;
    }
    
    .user-nik:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(79, 70, 229, 0.2);
    }

    .info-group {
      display: flex;
      align-items: center;
      padding: 22px;
      background: #ffffff;
      border-radius: 20px;
      border: 1px solid rgba(0,0,0,0.03);
      box-shadow: 0 4px 15px rgba(0,0,0,0.02);
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
      height: 100%;
    }

    .info-group:hover {
      border-color: var(--primary-light);
      box-shadow: 0 12px 30px rgba(79, 70, 229, 0.1);
      transform: translateY(-5px);
    }

    .icon-box {
      width: 55px;
      height: 55px;
      border-radius: 16px;
      background: var(--primary-light);
      color: var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      flex-shrink: 0;
      margin-right: 20px;
      transition: all 0.4s ease;
    }

    .info-group:hover .icon-box {
      background: var(--primary-gradient);
      color: #fff;
      transform: scale(1.1) rotate(8deg);
      box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
    }

    .info-text-wrapper {
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .info-label {
      font-size: 0.85rem;
      font-weight: 700;
      color: var(--text-muted);
      margin-bottom: 4px;
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    .info-value {
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--text-main);
      margin: 0;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      transition: color 0.3s;
    }

    .info-group:hover .info-value {
      color: var(--primary-color);
    }

    .btn-action {
      border-radius: 50px;
      padding: 14px 32px;
      font-weight: 700;
      font-size: 1rem;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      transition: all 0.4s ease;
      letter-spacing: 0.5px;
    }

    .btn-edit-main {
      background: var(--primary-gradient);
      border: none;
      color: white;
      box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);
      text-decoration: none;
    }

    .btn-edit-main:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 28px rgba(79, 70, 229, 0.35);
      color: white;
    }

    @media (max-width: 991px) {
      .info-value {
        white-space: normal;
      }
    }
@endsection

@section('content')
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

                <!-- 1. Pekerjaan -->
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="250">
                    <div class="icon-box"><i class="bi bi-briefcase"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Pekerjaan</span>
                      <p class="info-value">{{ $user->pekerjaan ?? '-' }}</p>
                    </div>
                  </div>
                </div>

                <!-- 2. Tempat, Tanggal Lahir -->
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box"><i class="bi bi-calendar-event"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Tempat, Tanggal Lahir</span>
                      <p class="info-value">
                        {{ $user->tempat_lahir ?? 'Tes' }}, 
                        {{ $user->tgl_lahir ? \Carbon\Carbon::parse($user->tgl_lahir)->translatedFormat('d M Y') : '-' }}
                      </p>
                    </div>
                  </div>
                </div>

                <!-- 3. Status Keluarga -->
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="350">
                    <div class="icon-box"><i class="bi bi-people"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Status Keluarga</span>
                      <p class="info-value">{{ $user->status ?? '-' }}</p>
                    </div>
                  </div>
                </div>

                <!-- 4. Jenis Kelamin -->
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="400">
                    <div class="icon-box"><i class="bi bi-gender-ambiguous"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Jenis Kelamin</span>
                      <p class="info-value">
                        @if($user->jenis_kelamin === 'L') Laki-laki
                        @elseif($user->jenis_kelamin === 'P') Perempuan
                        @else -
                        @endif
                      </p>
                    </div>
                  </div>
                </div>

                <!-- 5. Agama -->
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="450">
                    <div class="icon-box"><i class="bi bi-star"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Agama</span>
                      <p class="info-value">{{ $user->agama ?? '-' }}</p>
                    </div>
                  </div>
                </div>

                <!-- 6. Golongan Darah -->
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box"><i class="bi bi-droplet"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Golongan Darah</span>
                      <p class="info-value">{{ $user->golongan_darah ?? '-' }}</p>
                    </div>
                  </div>
                </div>

                <!-- 7. Kewarganegaraan -->
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="550">
                    <div class="icon-box"><i class="bi bi-flag"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Kewarganegaraan</span>
                      <p class="info-value">{{ $user->kewarganegaraan ?? '-' }}</p>
                    </div>
                  </div>
                </div>

                {{-- Alamat --}}
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="550">
                    <div class="icon-box"><i class="bi bi-flag"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Alamat Lengkap</span>
                      <p class="info-value">{{ $user->alamat ?? '-' }}</p>
                    </div>
                  </div>
                </div>

                {{-- Status Kawin --}}
                <div class="col-md-6">
                  <div class="info-group" data-aos="fade-up" data-aos-delay="550">
                    <div class="icon-box"><i class="bi bi-flag"></i></div>
                    <div class="info-text-wrapper">
                      <span class="info-label">Status Nikah</span>
                      <p class="info-value">{{ $user->status_pernikahan ?? '-' }}</p>
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
@endsection
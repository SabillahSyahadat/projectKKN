<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container py-5">
        <div class="row mb-4 justify-content-center" data-aos="fade-down">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <div>
                        <h3 class="fw-bold mb-0">Tambah Data Warga</h3>
                        <p class="text-muted small mb-0">Dafrarkan NIK warga baru ke dalam sistem database desa</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 24px;">
                    
                    <form action="#" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="nik" class="form-label text-muted small text-uppercase fw-bold mb-2">
                                Nomor Induk Kependudukan (NIK)
                            </label>
                            <div class="input-group input-group-lg cast-input">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 12px 0 0 12px;">
                                    <i class="bi bi-card-text"></i>
                                </span>
                                <input type="text" 
                                       name="nik" 
                                       id="nik" 
                                       class="form-control bg-light border-start-0 @error('nik') is-invalid @enderror" 
                                       placeholder="Contoh: 3512xxxxxxxxxxxx" 
                                       maxlength="16"
                                       pattern="[0-9]*"
                                       inputmode="numeric"
                                       style="border-radius: 0 12px 12px 0; font-family: monospace; letter-spacing: 2px;"
                                       value="{{ old('nik') }}"
                                       required>
                            </div>
                            
                            @error('nik')
                                <div class="text-danger small mt-2">
                                    <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                            
                            <div class="form-text text-muted small mt-2">
                                <i class="bi bi-info-circle me-1"></i> Pastikan NIK terdiri dari tepat 16 digit angka resmi.
                            </div>
                        </div>

                        <form action="{{ route('admin.storeWarga') }}" method="POST">
                            @csrf
                            @method('POST')
                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" class="btn btn-dark btn-lg rounded-pill py-3 fw-bold shadow-sm" style="font-size: 1rem; letter-spacing: 0.5px;">
                                <i class="bi bi-check-circle me-2"></i> Simpan Data Warga
                            </button>
                            </form>
                            <a href="{{ url()->previous() }}" class="btn btn-link text-muted btn-sm text-decoration-none mt-2">
                                Batalkan
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout>
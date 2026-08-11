<x-layout>
    <x-slot:title>Tambah Pemberitahuan</x-slot:title>

    <div class="container py-5 page-wrapper animate-reveal">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Pemberitahuan</a></li>
                        <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Tambah Pemberitahuan Baru</li>
                    </ol>
                </nav>

                <div class="card border-0 shadow-lg-soft rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-danger text-white rounded-3 p-3 me-3">
                                <i class="bi bi-megaphone-fill fs-4"></i>
                            </div>
                            <div>
                                <h4 class="fw-800 text-dark mb-0">Publikasikan</h4>
                                <p class="text-muted small mb-0">Buat pengumuman baru untuk warga desa</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('admin.pemberitahuan.store') }}" method="POST" class="needs-validation">
                            @csrf
                            
                            <div class="mb-4">
                                <label class="form-label-custom">Judul Pengumuman</label>
                                <input type="text" name="judul" class="form-control form-control-lg custom-input @error('judul') is-invalid @enderror" 
                                       placeholder="Contoh: Jadwal Gotong Royong Akhir Pekan" value="{{ old('judul') }}" required>
                                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label-custom">Isi Pesan</label>
                                <textarea name="isi" class="form-control custom-input @error('isi') is-invalid @enderror" rows="5" 
                                          placeholder="Tuliskan detail pengumuman di sini..." required>{{ old('isi') }}</textarea>
                                @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-danger flex-fill btn-lg fw-700 rounded-3">
                                    <i class="bi bi-send-fill me-2"></i> Kirim Sekarang
                                </button>
                                <button type="button" class="btn btn-outline-secondary flex-fill btn-lg fw-700 rounded-3">
                                    <i class="bi bi-clock-history me-2"></i> Simpan Draft
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
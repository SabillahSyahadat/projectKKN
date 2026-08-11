<x-layout>
    <x-slot:title>Pemberitahuan Umum</x-slot:title>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 fw-bold">Pengaturan Pemberitahuan</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 10px; border-left: 5px solid #198754;">
                <i class="bi bi-check-circle-fill me-2 text-success"></i>
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 10px; border-left: 5px solid #dc3545;">
                <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>
                <strong>Terjadi Kesalahan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm mb-4 border-0" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header py-3 bg-white border-bottom-0 d-flex align-items-center">
                <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: var(--primary-color) !important;">
                    <i class="bi bi-megaphone-fill fs-5"></i>
                </div>
                <h6 class="m-0 fw-bold fs-5" style="color: var(--primary-color);">Edit Pemberitahuan Tunggal</h6>
            </div>
            <div class="card-body px-4 pb-4">
                <form action="{{ route('admin.pemberitahuan.update') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="judul" class="form-label fw-semibold text-secondary">Judul Pemberitahuan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $pemberitahuan->judul ?? '') }}" placeholder="Contoh: Pengumuman Kerja Bakti" required style="border-radius: 10px; background-color: #f8f9fa;">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="form-label fw-semibold text-secondary">Isi Pemberitahuan <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="8" placeholder="Tuliskan isi detail dari pemberitahuan di sini..." required style="border-radius: 10px; background-color: #f8f9fa;">{{ old('isi', $pemberitahuan->isi ?? '') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text mt-2 text-muted"><i class="bi bi-info-circle me-1"></i> Pemberitahuan ini akan tampil untuk warga yang mengakses sistem.</div>
                    </div>

                    <hr class="mt-4 mb-4">

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger btn-lg px-5 shadow-sm d-flex align-items-center" style="border-radius: 10px; background-color: var(--primary-color); border: none; transition: transform 0.2s;">
                            <i class="bi bi-save2-fill me-2"></i> Simpan Pemberitahuan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
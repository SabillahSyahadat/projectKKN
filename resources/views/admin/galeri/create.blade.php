<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <div class="container py-5 page-wrapper animate-reveal">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.galeri.index') }}" class="text-decoration-none text-muted">Galeri</a></li>
                        <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Tambah Foto Baru</li>
                    </ol>
                </nav>

                <div class="card border-0 shadow-lg-soft rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-dark text-white rounded-3 p-3 me-3">
                                <i class="bi bi-cloud-arrow-up-fill fs-4"></i>
                            </div>
                            <div>
                                <h4 class="fw-800 text-dark mb-0">Upload Konten</h4>
                                <p class="text-muted small mb-0">Lengkapi detail foto untuk galeri desa</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-custom-success slide-in-top mb-4">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                            @csrf
                            
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <label class="form-label-custom">Judul Konten</label>
                                    <input type="text" name="judul" class="form-control form-control-lg custom-input @error('judul') is-invalid @enderror" 
                                           placeholder="Contoh: Perayaan HUT RI ke-81" value="{{ old('judul') }}" required>
                                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label-custom">Kategori</label>
                                    <select name="kategori" class="form-select form-select-lg custom-input @error('kategori') is-invalid @enderror" required>
                                        <option value="" selected disabled>Pilih Kategori...</option>
                                        <option value="lomba" {{ old('kategori') == 'lomba' ? 'selected' : '' }}>Lomba</option>
                                        <option value="acara" {{ old('kategori') == 'acara' ? 'selected' : '' }}>Acara</option>
                                        <option value="hiburan" {{ old('kategori') == 'hiburan' ? 'selected' : '' }}>Hiburan</option>
                                    </select>
                                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label-custom">Unggah Gambar</label>
                                    <div class="upload-zone rounded-4 p-4 text-center border-dashed">
                                        <input type="file" name="gambar" id="imageInput" class="d-none" accept="image/*" required>
                                        
                                        <div id="uploadPlaceholder" onclick="document.getElementById('imageInput').click()" class="cursor-pointer">
                                            <i class="bi bi-image text-muted display-4"></i>
                                            <p class="mt-2 text-secondary">Klik untuk pilih gambar atau seret file ke sini</p>
                                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">Maksimal 2MB (JPG/PNG)</span>
                                        </div>

                                        <div id="previewWrapper" class="d-none position-relative mt-2">
                                            <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded-3 shadow-sm border" style="max-height: 300px;">
                                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow" onclick="resetUpload()">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('gambar') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label-custom">Keterangan / Deskripsi</label>
                                    <textarea name="keterangan" class="form-control custom-input" rows="4" 
                                              placeholder="Tuliskan deskripsi singkat mengenai foto tersebut...">{{ old('keterangan') }}</textarea>
                                </div>
                            </div>

                            <div class="mt-5 pt-3 border-top d-flex gap-3">
                                <button type="submit" class="btn btn-dark px-5 py-2-5 rounded-pill fw-bold shadow-btn flex-grow-1 flex-md-grow-0">
                                    <i class="bi bi-cloud-arrow-up me-2"></i>Simpan Konten
                                </button>
                                <a href="{{ route('admin.galeri.index') }}" class="btn btn-light px-5 py-2-5 rounded-pill border fw-semibold">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const previewWrapper = document.getElementById('previewWrapper');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');

        imageInput.onchange = evt => {
            const [file] = imageInput.files
            if (file) {
                imagePreview.src = URL.createObjectURL(file)
                previewWrapper.classList.remove('d-none');
                uploadPlaceholder.classList.add('d-none');
            }
        }

        function resetUpload() {
            imageInput.value = "";
            previewWrapper.classList.add('d-none');
            uploadPlaceholder.classList.remove('d-none');
        }
    </script>

    <style>
        .page-wrapper { font-family: 'Inter', sans-serif; }
        .fw-800 { font-weight: 800; letter-spacing: -0.02em; }
        
        .animate-reveal {
            animation: revealUp 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes revealUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Input Styling */
        .form-label-custom {
            font-weight: 600;
            color: #374151;
            font-size: 0.9rem;
            margin-bottom: 0.6rem;
        }

        .custom-input {
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .custom-input:focus {
            border-color: #111827;
            box-shadow: 0 0 0 4px rgba(17, 24, 39, 0.05);
            background-color: #fff;
        }

        /* Upload Zone */
        .upload-zone {
            background-color: #f9fafb;
            border: 2px dashed #d1d5db;
            transition: all 0.3s ease;
        }

        .upload-zone:hover {
            background-color: #f3f4f6;
            border-color: #9ca3af;
        }

        .cursor-pointer { cursor: pointer; }

        /* Buttons */
        .py-2-5 { padding-top: 0.7rem; padding-bottom: 0.7rem; }
        .shadow-btn { box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15); }
        .shadow-lg-soft { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02); }

        .alert-custom-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            border-radius: 12px;
            padding: 1rem;
        }

        .slide-in-top {
            animation: slideInTop 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideInTop {
            from { transform: translateY(-10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</x-layout>
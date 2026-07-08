<x-layout>
    <x-slot:title>Tambah Berita Desa</x-slot:title>

    <style>
        /* Desain Input yang Lebih Elegan */
        .form-control:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.25rem rgba(232, 69, 69, 0.1) !important;
            border: 1px solid var(--primary-color) !important;
        }

        /* Container Gambar dengan Efek Hover */
        .upload-wrapper {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px dashed #dee2e6;
            background-color: #f8f9fa;
        }

        .upload-wrapper:hover {
            border-color: var(--primary-color);
            background-color: #fff5f5;
        }

        /* Animasi Tombol */
        .btn-hover-zoom {
            transition: transform 0.2s ease;
        }

        .btn-hover-zoom:hover {
            transform: scale(1.02);
        }
    </style>

    <div class="row mb-4">
        <div class="col-12" data-aos="fade-right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="/admin/berita" class="text-decoration-none text-muted">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Buat Baru</li>
                </ol>
            </nav>
            <h2 class="fw-bold">Buat Berita Baru</h2>
            @if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>
    </div>

    <form action="{{route('storeBerita')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Judul Berita</label>
                        <input type="text" name="nama_berita" id="judul" 
                               class="form-control form-control-lg border-0 bg-light px-3 py-3" 
                               placeholder="Masukkan judul yang menarik..." 
                               style="border-radius: 12px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">URL Slug</label>
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-secondary-subtle" style="border-radius: 12px 0 0 12px;">/berita/</span>
                            <input type="text" name="slug" id="slug" 
                                   class="form-control border-0 bg-light px-3" 
                                   style="border-radius: 0 12px 12px 0;" readonly>
                        </div>
                        <div class="form-text mt-2"><i class="bi bi-magic me-1 text-danger"></i> Slug dibuat otomatis berdasarkan judul.</div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold text-dark">Konten Berita</label>
                        <textarea name="isi_berita" rows="12" 
                                  class="form-control border-0 bg-light px-3 py-3" 
                                  placeholder="Ceritakan kegiatan desa secara mendalam..."
                                  style="border-radius: 12px;" required></textarea>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px;" data-aos="fade-up" data-aos-delay="200">
                    <label class="form-label fw-semibold text-dark mb-3">Gambar Sampul</label>
                    <div class="upload-wrapper p-4 text-center" style="border-radius: 15px;" id="dropzone">
                        <input type="file" name="gambar_berita" id="imageInput" class="d-none" accept="image/*">
                        
                        <div id="previewContainer" class="d-none">
                            <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded-3 mb-3 shadow-sm">
                            <p class="small text-danger mb-0" id="removeImg" style="cursor: pointer;">Ganti Gambar</p>
                        </div>

                        <div id="uploadUI">
                            <i class="bi bi-cloud-arrow-up text-danger" style="font-size: 3.5rem;"></i>
                            <p class="fw-medium mb-1 mt-2">Pilih File</p>
                            <p class="text-muted small">Maksimal 2MB (JPG, PNG)</p>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;" data-aos="fade-up" data-aos-delay="300">
                    <label class="form-label fw-semibold text-dark mb-3">Pengaturan Publikasi</label>
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-calendar-check text-success fs-4"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <small class="text-muted d-block">Tanggal Publish</small>
                            <span class="fw-bold">{{ now()->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-danger btn-lg w-100 rounded-pill py-3 shadow btn-hover-zoom mb-2">
                        <i class="bi bi-send-fill me-2"></i> Publikasikan
                    </button>
                    <a href="/admin/berita" class="btn btn-light w-100 rounded-pill py-2 text-muted">Batalkan</a>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Auto-Slug Logic dengan Animasi Halus
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');
        
        judul.addEventListener('input', function() {
            let value = judul.value.toLowerCase()
                        .replace(/ /g,"-")
                        .replace(/[^\w-]+/g,'');
            slug.value = value;
        });

        // Click-to-Upload Logic
        const dropzone = document.querySelector('#dropzone');
        const input = document.querySelector('#imageInput');
        const preview = document.querySelector('#imagePreview');
        const previewContainer = document.querySelector('#previewContainer');
        const uploadUI = document.querySelector('#uploadUI');
        const removeImg = document.querySelector('#removeImg');

        dropzone.addEventListener('click', () => input.click());

        input.onchange = evt => {
            const [file] = input.files;
            if (file) {
                preview.src = URL.createObjectURL(file);
                previewContainer.classList.remove('d-none');
                uploadUI.classList.add('d-none');
                
                // Animasi Zoom-in Preview
                preview.animate([
                    { transform: 'scale(0.8)', opacity: 0 },
                    { transform: 'scale(1)', opacity: 1 }
                ], { duration: 400, easing: 'ease-out' });
            }
        }

        removeImg.addEventListener('click', (e) => {
            e.stopPropagation();
            input.value = "";
            previewContainer.classList.add('d-none');
            uploadUI.classList.remove('d-none');
        });
    </script>
</x-layout>
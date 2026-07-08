<x-layout>
    <x-slot:title>Tambah Aparatur Desa - Desa Sidomulyo</x-slot:title>

    <style>
        :root {
            --primary: #e84545;
            --secondary: #1e293b;
            --bg-soft: #f8fafc;
        }

        /* Karena sudah di dalam layout, kita tidak perlu styling body secara global, 
           cukup styling container kontennya saja */
        .fw-800 { font-weight: 800; }
        .fw-700 { font-weight: 700; }
        .fw-600 { font-weight: 600; }

        .main-card {
            border: none;
            border-radius: 24px;
            background: white;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .upload-area {
            border: 2px dashed #e2e8f0;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            background: #fdfdfd;
            cursor: pointer;
        }

        .upload-area:hover {
            border-color: var(--primary);
            background: #fff5f5;
        }

        .upload-area.is-invalid {
            border-color: #dc3545;
        }

        .preview-circle {
            width: 120px;
            height: 120px;
            background: #f1f5f9;
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 40px;
            color: #cbd5e1;
            overflow: hidden;
        }

        .form-control, .form-select {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            font-size: 0.95rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(232, 69, 69, 0.1);
        }

        .section-title {
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::after {
            content: "";
            height: 1px;
            flex-grow: 1;
            background: #e2e8f0;
        }

        .btn-submit {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: #c63232;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(232, 69, 69, 0.3);
            color: white;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12"> @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4" data-aos="fade-in">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bi bi-exclamation-triangle-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-800 mb-1">Terjadi Kesalahan!</h6>
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <div class="text-center mb-5" data-aos="fade-down">
                    <h2 class="fw-800 tracking-tight">Tambah <span class="text-danger">Aparatur Desa</span></h2>
                    <p class="text-muted">Daftarkan data diri dan jabatan perangkat desa untuk ditampilkan di laman publik.</p>
                </div>

                <form action="{{ route('admin.perangkat.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="200">
                            <div class="main-card p-4 text-center h-100">
                                <div class="section-title">Foto Profil</div>
                                
                                <div class="upload-area @error('foto') is-invalid @enderror" onclick="document.getElementById('foto').click()">
                                    <div class="preview-circle" id="previewArea">
                                        <i class="bi bi-person-plus"></i>
                                    </div>
                                    <p class="small fw-600 mb-1">Klik untuk Upload</p>
                                    <p class="x-small text-muted mb-0">Max 2MB (JPG, PNG)</p>
                                    <input type="file" id="foto" name="foto" hidden accept="image/*">
                                </div>
                                
                                @error('foto')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror

                                <div class="mt-4 p-3 bg-light rounded-3 text-start">
                                    <p class="small text-muted mb-0">
                                        <i class="bi bi-info-circle me-1 text-primary"></i> 
                                        Foto akan otomatis disesuaikan ukurannya.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8" data-aos="fade-left" data-aos-delay="300">
                            <div class="main-card p-4 p-md-5">
                                
                                <div class="section-title">Informasi Dasar</div>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-12">
                                        <label class="form-label fw-600 small">Nama Lengkap & Gelar</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                               name="nama" value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso, S.Sos">
                                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label fw-600 small">NIP / NIAP</label>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                               name="nip" value="{{ old('nip') }}" placeholder="Nomor Induk Perangkat">
                                        @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label fw-600 small">Jabatan</label>
                                        <select class="form-select @error('jabatan') is-invalid @enderror" name="jabatan">
                                            <option value="" selected disabled>Pilih Jabatan</option>
                                            @php
                                                $jabatanList = ['Kepala Desa', 'Sekretaris Desa', 'Kaur Keuangan', 'Kaur Perencanaan', 'Kasi Pemerintahan', 'Kasi Kesejahteraan', 'Kepala Dusun'];
                                            @endphp
                                            @foreach($jabatanList as $j)
                                                <option value="{{ $j }}" {{ old('jabatan') == $j ? 'selected' : '' }}>{{ $j }}</option>
                                            @endforeach
                                        </select>
                                        @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="section-title">Kontak & Media</div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-600 small">Nomor WhatsApp</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0 bg-light"><i class="bi bi-whatsapp text-success"></i></span>
                                            <input type="text" class="form-control border-start-0 @error('whatsapp') is-invalid @enderror" 
                                                   name="whatsapp" value="{{ old('whatsapp') }}" placeholder="0812xxxx">
                                        </div>
                                        @error('whatsapp') <div class="text-danger x-small mt-1">{{ $message }}</div> @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label fw-600 small">Email Kerja</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0 bg-light"><i class="bi bi-envelope text-primary"></i></span>
                                            <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                                   name="email" value="{{ old('email') }}" placeholder="staff@desasidomulyo.id">
                                        </div>
                                        @error('email') <div class="text-danger x-small mt-1">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-600 small">Status Keaktifan</label>
                                        <select class="form-select" name="status">
                                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="non-aktif" {{ old('status') == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-600 small">Urutan Tampil</label>
                                        <input type="number" class="form-control" name="urutan" value="{{ old('urutan', 0) }}">
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="form-label fw-600 small">Keterangan / Tugas Pokok</label>
                                        <textarea class="form-control" name="keterangan" rows="3" placeholder="Jelaskan peran utama...">{{ old('keterangan') }}</textarea>
                                    </div>
                                </div>

                                <div class="mt-5 d-flex justify-content-end gap-3">
                                    <a href="{{ route('admin.perangkat.index')}}" class="btn btn-light px-4 rounded-3 fw-600 text-muted">Batal</a>
                                    <button type="submit" class="btn btn-submit shadow-sm">
                                        <i class="bi bi-check-circle-fill me-2"></i>Simpan Perangkat
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Preview Gambar
        document.getElementById('foto').onchange = function (evt) {
            const [file] = this.files
            if (file) {
                const previewArea = document.getElementById('previewArea');
                previewArea.innerHTML = `<img src="${URL.createObjectURL(file)}" style="width:100%; height:100%; object-fit:cover;">`;
            }
        }
    </script>
    @endpush
</x-layout>
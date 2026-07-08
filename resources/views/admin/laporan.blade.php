<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <style>
        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f1f1;
        }

        .table tbody tr:hover {
            background-color: #fcfcfc;
            transform: scale(1.005);
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }

        .avatar-circle {
            width: 40px;
            height: 40px;
            background: #2d3436;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
            margin-right: 12px;
        }

        .img-report-preview {
            width: 60px;
            height: 45px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .img-report-preview:hover {
            transform: scale(1.1);
        }
    </style>

    <div class="row mb-5 align-items-center" data-aos="fade-down">
        <div class="col-md-8">
            <h2 class="fw-bold display-6 mb-1">Laporan & Aspirasi</h2>
            <p class="text-muted mb-0">
                <i class="bi bi-info-circle me-1"></i> 
                Terdapat <span class="text-danger fw-bold">{{ $laporans->count() }}</span> laporan terdaftar dalam sistem.
            </p>
        </div>
    </div>

    <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 24px;" data-aos="fade-up">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead class="bg-light">
                    <tr class="text-uppercase" style="letter-spacing: 1px; font-size: 0.8rem;">
                        <th class="ps-4 py-4 text-muted">Waktu</th>
                        <th class="py-4 text-muted">Pelapor (NIK)</th>
                        <th class="py-4 text-muted">Isi Laporan</th>
                        <th class="py-4 text-muted">Lampiran</th>
                        <th class="py-4 text-center text-muted">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $index => $data)
                    <tr data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                        <td class="ps-4">
                            <div class="text-dark fw-medium">{{ $data->created_at->format('d M Y') }}</div>
                            <small class="text-muted">{{ $data->created_at->format('H:i') }} WIB</small>
                        </td>

                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle shadow-sm">
                                    {{ substr($data->nama_pelapor, 0, 1) }}
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">{{ $data->nama_pelapor }}</div>
                                    <code class="text-muted small">{{ $data->nik }}</code>
                                </div>
                            </div>
                        </td>

                        <td>
                            <p class="mb-0 text-muted" style="max-width: 300px; font-size: 0.9rem; line-height: 1.4;">
                                {{ Str::limit($data->isi_laporan, 80) }}
                            </p>
                        </td>

                        <td>
                            @if($data->foto_laporan)
                                <img src="{{ asset('storage/' . $data->foto_laporan) }}" 
                                     class="img-report-preview shadow-sm border" 
                                     alt="Lampiran">
                            @else
                                <span class="text-muted small italic">Tidak ada foto</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="btn-group shadow-sm" role="group" style="border-radius: 10px; overflow: hidden;">
                                <form action="{{ route('admin.detailLaporan', $data->id) }}" method="post">
                                    @csrf
                                    @method('GET')
                                    <a href="{{ route('admin.detailLaporan', $data->id) }}" class="btn btn-dark btn-sm px-3">Detail</a>
                                </form>
                                <form action="{{route('admin.laporan.destroy', $data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                     <button type="submit" class="btn btn-outline-danger btn-sm px-3">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
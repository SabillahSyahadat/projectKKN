<!DOCTYPE html>
<html>
<head>
    <title>Surat Pengantar - {{ $warga->nama_warga }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5; }
        .kop-surat { border-bottom: 3px double #000; padding-bottom: 5px; margin-bottom: 20px; }
        .kop-surat table { width: 100%; border: none; }
        .logo { width: 70px; }
        .header-text { text-align: center; }
        .header-text h3, .header-text h2, .header-text p { margin: 0; padding: 0; }
        
        .judul-surat { text-align: center; text-decoration: underline; margin-bottom: 0; font-weight: bold; }
        .nomor-surat { text-align: center; margin-top: 0; margin-bottom: 30px; }
        
        .isi-surat { margin-top: 20px; }
        .data-table { width: 100%; margin-left: 30px; margin-bottom: 20px; }
        .data-table td { vertical-align: top; }
        .label { width: 150px; }
        .titik-dua { width: 10px; }

        .penutup { margin-top: 30px; }
        .tanda-tangan { margin-top: 50px; width: 100%; }
        .ttd-box { float: right; width: 250px; text-align: center; }
        .space-ttd { height: 80px; }
    </style>
</head>
<body>

    <div class="kop-surat">
        <table>
            <tr>
                <td class="logo">
                    <img src="{{ public_path('assets/img/logo-surat.png') }}" class="logo">
                </td>
                <td class="header-text">
                    <h3>PEMERINTAH KABUPATEN LAMONGAN</h3>
                    <h3>KECAMATAN DEKET</h3>
                    <h2>KANTOR KEPALA DESA SIDOMULYO</h2>
                    <p>Jl. Raya Desa Sidomulyo No. 01, Kode Pos 622xx</p>
                </td>
            </tr>
        </table>
    </div>

    <p class="judul-surat">SURAT PENGANTAR</p>
    <p class="nomor-surat">Nomor: 145 / {{ $surat->id }} / 413.312.05 / 2026</p>

    <div class="isi-surat">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Sidomulyo, Kecamatan Deket, Kabupaten Lamongan, menerangkan dengan sebenarnya bahwa:</p>
        
        <table class="data-table">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="titik-dua">:</td>
                <td><strong>{{ $warga->nama_warga }}</strong></td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->nik }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, Tgl Lahir</td>
                <td class="titik-dua">:</td>
                <td> {{ $warga->alamat. ' '. $warga->tgl_lahir->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->pekerjaan }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->alamat }}</td>
            </tr>
        </table>

        <p>Orang tersebut di atas adalah benar-benar warga kami yang bertempat tinggal di Desa Sidomulyo. Surat pengantar ini dibuat untuk keperluan: <strong>{{ $surat->keperluan }}</strong>.</p>
        
        <p class="penutup">Demikian surat pengantar ini kami buat agar dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="tanda-tangan">
        <div class="ttd-box">
            <p>Sidomulyo, {{ date('d F Y') }}</p>
            <p>Kepala Desa Sidomulyo,</p>
            <div class="space-ttd"></div>
            <p><strong>( NAMA KEPALA DESA )</strong></p>
            <p>NIP. 19820301 xxxx xx x xxx</p>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Domisili - {{ $warga->nama_warga }}</title>
    <style>
        @page { margin: 1cm 2cm; }
        body { 
            font-family: 'Times New Roman', Times, serif; 
            font-size: 12pt; 
            line-height: 1.5; 
            color: #000; 
            margin: 0;
        }

        /* Kop Surat */
        .kop-surat { border-bottom: 5px double #000; padding-bottom: 5px; margin-bottom: 20px; }
        .kop-table { width: 100%; border: none; }
        .logo { width: 70px; }
        .header-text { text-align: center; }
        .header-text h3 { margin: 0; font-size: 14pt; text-transform: uppercase; font-weight: normal; }
        .header-text h2 { margin: 0; font-size: 16pt; text-transform: uppercase; font-weight: bold; }
        .header-text p { margin: 0; font-size: 10pt; }

        /* Judul */
        .judul-container { text-align: center; margin-bottom: 30px; }
        .judul-surat { 
            font-weight: bold; 
            text-decoration: underline; 
            margin-bottom: 0; 
            font-size: 14pt;
            text-transform: uppercase; 
        }
        .nomor-surat { margin-top: 2px; }

        /* Isi */
        .isi-surat { text-align: justify; }
        .data-table { width: 100%; margin: 15px 0 15px 20px; border-collapse: collapse; }
        .data-table td { vertical-align: top; padding: 3px; }
        .label { width: 150px; }
        .titik-dua { width: 10px; }

        .paragraf { text-indent: 45px; margin-bottom: 15px; }

        /* Footer / TTD */
        .footer-section { width: 100%; margin-top: 30px; }
        .ttd-table { width: 100%; border: none; }
        .ttd-box { width: 45%; text-align: center; }
        .space-ttd { height: 80px; }
        
        .bold { font-weight: bold; }
        .uppercase { text-transform: uppercase; }
    </style>
</head>
<body>

    <div class="kop-surat">
        <table class="kop-table">
            <tr>
                <td style="width: 15%; text-align: center;">
                    <img src="{{ public_path('assets/img/logo-surat.png') }}" class="logo">
                </td>
                <td class="header-text" style="width: 85%;">
                    <h3>Pemerintah Kabupaten Lamongan</h3>
                    <h3>Kecamatan Deket</h3>
                    <h2>Kantor Kepala Desa Sidomulyo</h2>
                    <p>Alamat: Jl. Raya Desa Sidomulyo No. 01, Kode Pos 62291</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="judul-container">
        <div class="judul-surat">Surat Keterangan Domisili</div>
        <div class="nomor-surat">Nomor: 470 / {{ $surat->id ?? '...' }} / 413.312.05 / 2026</div>
    </div>

    <div class="isi-surat">
        <p class="paragraf">Yang bertanda tangan di bawah ini, Kepala Desa Sidomulyo, Kecamatan Deket, Kabupaten Lamongan, dengan ini menerangkan bahwa:</p>
        
        <table class="data-table">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="titik-dua">:</td>
                <td class="bold uppercase">{{ $warga->nama_warga }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->nik }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, Tgl. Lahir</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->tempat_lahir }}, {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Agama</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->agama ?? 'Islam' }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->pekerjaan }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Asal (KTP)</td>
                <td class="titik-dua">:</td>
                <td>{{ $warga->alamat }}</td>
            </tr>
        </table>

        <p class="paragraf">
            Berdasarkan keterangan yang ada, nama tersebut di atas adalah benar-benar warga yang saat ini <strong>Berdomisili / Bertempat Tinggal</strong> di Desa Sidomulyo, Kecamatan Deket, Kabupaten Lamongan.
        </p>
        
        <p class="paragraf">
            Surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan sebagai: <br>
            <center><strong>" {{ strtoupper($surat->keterangan ?? 'PERSYARATAN ADMINISTRASI') }} "</strong></center>
        </p>
        
        <p class="paragraf">
            Demikian surat keterangan domisili ini diberikan untuk dapat dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <div class="footer-section">
        <table class="ttd-table">
            <tr>
                <td style="width: 55%;"></td>
                <td class="ttd-box">
                    <p>Sidomulyo, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                    <p style="margin-top: -15px;">Kepala Desa Sidomulyo</p>
                    <div class="space-ttd"></div>
                    <p class="bold"><u>( NAMA KEPALA DESA )</u></p>
                    <p style="margin-top: -15px;">NIP. 19820301 xxxx xx x xxx</p>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
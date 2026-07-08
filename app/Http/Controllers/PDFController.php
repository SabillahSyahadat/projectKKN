<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;
use App\Models\Surat;

class PDFController extends Controller
{
    public function cetakPDF($id)
{
    // 1. Ambil data
    $surat = Surat::with('warga')->where('id', $id)
                  ->where('warga_id', Auth::guard('warga')->id())
                  ->where('status', 'disetujui')
                  ->firstOrFail();

    // 2. Tentukan view berdasarkan jenis_surat
    // Pastikan nilai 'jenis_surat' di database cocok dengan case di bawah
    switch ($surat->jenis_surat) {
        case 'SKTM':
            $viewPath = 'surat.sktm';
            break;
        case 'Surat Domisili':
            $viewPath = 'surat.domisili';
            break;
        default:
            $viewPath = 'surat.suratPengantar'; // View default/standar
            break;
    }

    // 3. Render View terpilih menjadi HTML
    $html = view($viewPath, [
        'surat' => $surat,
        'warga' => $surat->warga,
        'tgl_cetak' => now()->translatedFormat('d F Y')
    ])->render();

    // 4. Konfigurasi mPDF
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'margin_top' => 15,
        'margin_bottom' => 15,
    ]);

    // 5. Masukkan HTML ke mPDF
    $mpdf->WriteHTML($html);

    // 6. Output ke Browser
    $filename = 'Surat_' . str_replace(' ', '_', $surat->jenis_surat) . '_' . $surat->warga->nama . '.pdf';
    return $mpdf->Output($filename, 'I');
}
    
    public function konfirmasi(Request $request) {
        $jenis_surat = $request->jenis_surat;
        return view('surat.konfirmasiSurat', compact('jenis_surat'));
    }

    public function simpanPengajuan(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'jenis_surat' => 'required',
        
    ]);

    // 2. Simpan ke Database
    Surat::create([
        'warga_id' => Auth::guard('warga')->id(),
        'jenis_surat' => $request->jenis_surat,
        'keperluan' => $request->keperluan,
        'status' => 'pending', // Default awal
    ]);

    // 3. Redirect ke halaman riwayat atau beranda dengan pesan sukses
    return redirect()->to('warga/riwayatSurat')->with('validasi', 'Pengajuan surat berhasil dikirim! Silakan tunggu verifikasi admin.');
}

    public function showSurat()
{
    // Mengambil surat hanya milik warga yang sedang login
    $surats = Surat::where('warga_id', Auth::guard('warga')->id())
                   ->latest()
                   ->get();

    return view('warga.riwayatSurat', compact('surats'));
    }

    public function destroy($id)
{
    // Cari surat yang ID-nya cocok DAN milik warga yang sedang login
    $surat = Surat::where('id', $id)
                  ->first();

    if ($surat) {
            $surat->delete();
            return redirect()->back()->with('success', 'Pengajuan surat berhasil dibatalkan.');
    }

    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Berita;
use App\Models\KritikSaran; 
use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // --- FITUR BERITA ---

    public function showBerita()
    {
        $beritas = Berita::latest()->get();
        return view('admin/berita', [
            'title' => 'Daftar Berita',
            'beritas' => $beritas
        ]);
    }

    public function addBerita()
    {
        return view('admin/storeBerita');
    }

    public function storeBerita(Request $request)
    {
        $validatedData = $request->validate([
            'nama_berita' => 'required|max:255',
            'slug' => 'required|unique:beritas',
            'isi_berita' => 'required',
            'gambar_berita' => 'image|file|max:2048'
        ]);

        if ($request->file('gambar_berita')) {
            $validatedData['gambar_berita'] = $request->file('gambar_berita')->store('uploads/berita', 'public');
        }

        Berita::create($validatedData);
        return redirect('/admin/berita')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function destroyBerita($id) // Nama diganti agar tidak bentrok
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar_berita) {
            Storage::disk('public')->delete($berita->gambar_berita);
        }
        $berita->delete();

        if (request()->wantsJson()) {
            return response()->json(['status' => 'success']);
        }
        return redirect()->back();
    }


    // --- FITUR KRITIK & SARAN ---

    public function adminIndex() // Fungsi yang tadi error "Undefined"
    {
        $pesans = KritikSaran::latest()->get();
        return view('admin.kritikSaran', [
            'title' => 'Kritik & Saran Warga',
            'pesans' => $pesans
        ]);
    }

    public function destroyKritik($id)
    {
        KritikSaran::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pesan berhasil dihapus');
    }

    // --- FITUR LAPORAN ---

    public function laporan()
    {
        $laporans = Laporan::all();
        return view('admin/laporan', [
            'title' => 'Daftar Laporan Warga',
            'laporans' => $laporans
        ]);
    }

    public function destroyLaporan($id)
{
    $laporan = Laporan::findOrFail($id);
    if ($laporan->foto_laporan) {
        Storage::disk('public')->delete($laporan->foto_laporan);
    }
    $laporan->delete();
    return redirect()->back()->with('success', 'Laporan berhasil dihapus');
}

public function detailLaporan($id)
{
    // Ambil satu data laporan berdasarkan ID
    $laporan = Laporan::findOrFail($id);
    
    // Kirim langsung sebagai variabel terpisah agar mudah dipanggil di Blade
    return view('admin.detailLaporan', [
        'laporan' => $laporan,
        'title'   => 'Detail Laporan'
    ]);
}


    public function surat() {
    $suratPengantar = Surat::with('warga')->where('jenis_surat', 'Surat Pengantar')->latest()->get();
    $suratDomisili = Surat::with('warga')->where('jenis_surat', 'Surat Domisili')->latest()->get();
    $suratSKTM = Surat::with('warga')->where('jenis_surat', 'SKTM')->latest()->get();

    return view('admin.surat.index', compact('suratPengantar', 'suratDomisili', 'suratSKTM'));
}
    // Tambahkan $id setelah $request
public function setujui(Request $request, $id) 
{
    // Cari menggunakan $id yang datang dari URL
    $surat = Surat::find($id);

if (!$surat) {
    return redirect()->back()->with('error', 'Data surat tidak ditemukan!');
}

$surat->status = 'disetujui';
$surat->save();
return redirect()->back();
}
public function tolak(Request $request, $id) 
{
    // Cari menggunakan $id yang datang dari URL
    $surat = Surat::find($id);

if (!$surat) {
    return redirect()->back()->with('error', 'Data surat tidak ditemukan!');
}

$surat->status = 'ditolak';
$surat->save();
return redirect()->back();
}

public function daftarWarga(Request $request)
{
    $query = Warga::query();

    // Fitur Pencarian
    if ($request->has('search')) {
        $query->where('nama_warga', 'like', '%' . $request->search . '%')
              ->orWhere('nik', 'like', '%' . $request->search . '%');
    }

    $wargas = $query->latest()->paginate(10);

    return view('admin.dataWarga', [
        'title' => 'Data Warga',
        'wargas' => $wargas
    ]);
}

       public function showWarga($id)
{
    // Mengambil data spesifik warga berdasarkan ID
    $warga = Warga::findOrFail($id);
    $data = ['title'=>'Detail Warga',
             'warga'=>$warga];

    return view('admin.showWarga', compact('warga'), $data);
}

public function tambahWarga()
{
    return view('admin.tambahWarga', ['title' => 'Tambah Warga']);
}

public function storeWarga(Request $request)
{
    // 1. Aturan Validasi
    $validatedData = $request->validate([
        'nik' => 'required|string|min:16|max:16|unique:wargas,nik',
    ]);

    // 2. Proses Penyimpanan
    Warga::create($validatedData);

    // 3. Redirect dengan Notifikasi
    return redirect()->route('admin.daftarWarga')
        ->with('success', 'Data warga berhasil ditambahkan!');
}
}
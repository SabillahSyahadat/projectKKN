<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Warga;
use App\Models\Laporan;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Perangkat;
use Carbon\carbon;


class PageController extends Controller
{
    public function index()
    {
        $perangkat = Perangkat::orderBy('urutan', 'asc')->get();
        $galeries = Galeri::latest()->get();
        $categories = Galeri::select('kategori')->distinct()->get();
        $total = Warga::count();
        $kepalaKeluarga = Warga::where('status', 'Kepala Keluarga')->count();
        $beritas = Berita::latest()->take(3)->get();
        $jumPerangkat = Perangkat::count();
        return view('index', ['totalWarga' => $total,
                                'beritas' => $beritas,
                                'galeries' => $galeries,
                                'categories' => $categories,
                                'perangkat' => $perangkat,
                                'kepalaKeluarga' => $kepalaKeluarga,
                                'jumPerangkat' => $jumPerangkat]);
    }

    public function updateProfil()
    {
    $warga = Auth::guard('warga')->user();
    return view('warga/profilUpdate', compact('warga'));
    }

    public function showDetailWarga($data){
        $user = Warga::showDetail($data);
        return view('warga/profil');
    }

    public function toLaporan(){

        if(!Auth::guard('warga')->user()){
            return redirect()->to('/auth/login')->with('loginFirst', 'Silahkan Login terlebih dahulu');
        }
        if(Auth::guard('warga')->user()->nama_warga == null){
            return redirect()->to('/updateProfil/warga')->with('validasi', 'Silahkan lengkapi profil anda terlebih dahulu untuk menggunakan layanan kami');
        }
        return view('warga/buatLaporan');
    }

    public function buatLaporan(Request $request)
    {
    $request->validate([
        'isi_laporan'  => 'required|min:10',
        'foto_laporan' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $userWarga = auth('warga')->user();

    $data = [
        'nik'          => $userWarga->nik,
        'nama_pelapor' => $userWarga->nama_warga, 
        'isi_laporan'  => $request->isi_laporan,
    ];

    if ($request->hasFile('foto_laporan')) {
        $file = $request->file('foto_laporan');
        $path = $file->store('uploads/laporan');
        $data['foto_laporan'] = $path;
    }
    Laporan::create($data);

    return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
}

public function show()//show proffil warga
    {
        $user = Auth::guard('warga')->user();
        $data = [
            'user' => $user,
            'umur' => Carbon::parse($user['tgl_lahir'])->age
        ];
        return view('warga.tampilProfil', $data);
    }

    public function pilihSurat(){
         if(!Auth::guard('warga')->check()){return redirect()->to('auth/login')->with('loginFirst', 'Silahkan Login terlebih dahulu');}
         if(Auth::guard('warga')->user()->nama_warga == null){
            return redirect()->to('/updateProfil/warga')->with('validasi', 'Silahkan lengkapi profil anda terlebih dahulu untuk menggunakan layanan kami');
        }
            return view('warga.menuSurat');
         }
         
         public function showLaporan()
{
    // Mengambil laporan hanya milik warga yang sedang login
    $nik_warga = Auth::guard('warga')->user()->nik;
    
    $laporans = Laporan::where('nik', $nik_warga)
                        ->latest()
                        ->get();

    return view('warga.showLaporan', compact('laporans'));
}
}

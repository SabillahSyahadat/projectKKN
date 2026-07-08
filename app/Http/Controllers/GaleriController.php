<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function create()
    {
        $data = ['title'=>'Galeri'];
        return view('admin.galeri.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required',
            'keterangan' => 'required'
        ]);

        // Upload Gambar
        $file = $request->file('gambar');
        $nama_gambar = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('storage/galeri'), $nama_gambar);

        // Simpan Data
        Galeri::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'gambar' => $nama_gambar,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }
    public function index()
{
    // Mengambil galeri terbaru dengan pagination (12 foto per halaman)
    $galeries = Galeri::latest()->paginate(12);

    return view('admin.galeri.index', [
        'title' => 'Manajemen Galeri',
        'galeries' => $galeries
    ]);
}

public function destroy($id)
{
    $galeri = Galeri::findOrFail($id);
    
    // Hapus file fisik gambar dari folder storage agar tidak menumpuk
    if(file_exists(public_path('storage/galeri/' . $galeri->gambar))){
        unlink(public_path('storage/galeri/' . $galeri->gambar));
    }

    $galeri->delete();

    return redirect()->back()->with('success', 'Foto berhasil dihapus dari galeri.');
}
}

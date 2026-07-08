<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function showDetailWarga($slug)
    {
        // Mencari berita berdasarkan kolom slug
        $berita = Berita::where('slug', $slug)->firstOrFail(); 
    
        return view('warga.berita_detail', compact('berita'));
    }
    public function showDetailAdmin($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail(); 
    
        return view('admin.detailBeritaAdmin', compact('berita'));
    }
}


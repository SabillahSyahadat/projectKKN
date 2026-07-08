<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Berita;
use Illuminate\Support\Str;
class Berita extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional jika nama tabel 'beritas')
    protected $table = 'beritas';

    // Field yang boleh diisi
    protected $fillable = [
        'nama_berita',
        'slug',
        'isi_berita',
        'gambar_berita',
    ];

    public function store(Request $request)
    {
    Berita::create([
        'nama_berita' => $request->nama_berita,
        'slug' => Str::slug($request->nama_berita), // Otomatis buat slug
        'isi_berita' => $request->isi_berita,
        'gambar_berita' => $request->file('gambar_berita')->store('berita-images'),
        ]);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Perangkat extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     * Secara default Laravel akan menganggap tabelnya bernama 'perangkats',
     * jadi ini opsional, tapi bagus untuk kejelasan.
     */
    protected $table = 'perangkats';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Pastikan semua kolom baru di migrasi terdaftar di sini.
     */
    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'whatsapp',
        'email',
        'foto',
        'status',
        'urutan',
        'keterangan',
    ];

    /**
     * Casting atribut ke tipe data tertentu.
     */
    protected $casts = [
        'urutan' => 'integer',
        'status' => 'string',
    ];

    /**
     * ACCESSOR: Mendapatkan URL foto profil.
     * Jika foto tidak ada, akan mengembalikan gambar placeholder default.
     * Panggil di Blade dengan: {{ $perangkat->foto_url }}
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto && Storage::disk('public')->exists($this->foto)) {
            return asset('storage/' . $this->foto);
        }

        // Menggunakan UI Avatars sebagai placeholder jika foto kosong
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->nama) . '&background=f8d7da&color=dc3545&size=512';
    }

    /**
     * SCOPE: Mengurutkan perangkat berdasarkan prioritas urutan.
     * Panggil di Controller dengan: Perangkat::prioritas()->get();
     */
    public function scopePrioritas($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('nama', 'asc');
    }

    /**
     * SCOPE: Hanya mengambil perangkat yang aktif.
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}
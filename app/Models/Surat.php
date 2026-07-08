<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'warga_id',
        'jenis_surat',
        'nomor_surat',
        'keperluan',
        'status',
        'keterangan_admin',
        'tgl_disetujui'
    ];

    /**
     * Relasi Balik ke Warga
     */
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
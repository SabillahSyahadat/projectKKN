<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';

    protected $fillable = [
        'nik',
        'nama_pelapor',
        'isi_laporan',
        'foto_laporan'
    ];
}

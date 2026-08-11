<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    protected $table = 'pemberitahuan';
    protected $fillable = ['judul', 'isi'];
    


//tidak dipakai
    public static function savePemberitahuan($request)
    {
        $pemberitahuan = new Pemberitahuan();
        $pemberitahuan->judul = $request->judul;
        $pemberitahuan->isi = $request->isi;
        $pemberitahuan->save();

        return $pemberitahuan;
    }
}

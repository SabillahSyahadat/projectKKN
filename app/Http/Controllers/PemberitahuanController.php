<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemberitahuanController extends Controller
{

    public static function showPemberitahuan()
    {
        $pemberitahuan = \App\Models\Pemberitahuan::first();
        return view('admin.pemberitahuan.showPemberitahuan', compact('pemberitahuan'));
    }

    public function updatePemberitahuan(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pemberitahuan = \App\Models\Pemberitahuan::first();
        if ($pemberitahuan) {
            $pemberitahuan->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        } else {
            \App\Models\Pemberitahuan::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        }

        return redirect()->back()->with('success', 'Pemberitahuan berhasil diperbarui');
    }
    public static function savePemberitahuan($request)
    {

        return $pemberitahuan;
    }
}

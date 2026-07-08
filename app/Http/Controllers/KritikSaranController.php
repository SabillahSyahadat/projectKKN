<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    // Tampilan Admin: Melihat semua kritik saran
    public function adminIndex()
    {
        $pesans = KritikSaran::latest()->get();
        return view('admin.kritik_saran_index', [
            'title' => 'Kritik & Saran Warga',
            'pesans' => $pesans
        ]);
    }

    // Tampilan Warga: Menampilkan form input
    public function index()
    {
        return view('warga.kritik_saran', [
            'title' => 'Kirim Kritik & Saran'
        ]);
    }

    // Proses Simpan: Mengambil data dari form warga
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string|min:5',
        ]);

        KritikSaran::create($validated);

        return redirect()->route('index')->with('success', 'Pesan berhasil dikirim!');
    }

    // Hapus Pesan
    public function destroy($id)
    {
        KritikSaran::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pesan berhasil dihapus.');
    }
}
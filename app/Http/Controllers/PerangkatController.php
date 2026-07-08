<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Perangkat;
class PerangkatController extends Controller
{
    //
    public function index()
{
    $perangkat = Perangkat::orderBy('urutan', 'asc')->get(); // Diurutkan berdasarkan hierarki jabatan

    return view('admin.perangkat.index', [
        'title' => 'Perangkat Desa',
        'perangkat' => $perangkat
    ]);
}

public function addPerangkat()
{
    return view('admin.perangkat.addPerangkat');
}
public function savePerangkat(Request $request)
{
    // 1. Validasi Input
    $validatedData = $request->validate([
        'nama'      => 'required|string|max:255',
        'nip'       => 'nullable|string|unique:perangkats,nip|max:50',
        'jabatan'   => 'required|string|max:100',
        'whatsapp'  => 'nullable|string|max:20',
        'email'     => 'nullable|email|max:255',
        'status'    => 'required|in:aktif,non-aktif',
        'urutan'    => 'required|integer|min:0',
        'keterangan'=> 'nullable|string',
        'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
    ], [
        'nama.required' => 'Nama lengkap wajib diisi.',
        'jabatan.required' => 'Jabatan harus dipilih.',
        'foto.image' => 'File harus berupa gambar.',
    ]);

    // 2. Handling Upload Foto
    if ($request->hasFile('foto')) {
        // Simpan file dan dapatkan path-nya
        $path = $request->file('foto')->store('perangkat', 'public');
        $validatedData['foto'] = $path;
    }

    // 3. Simpan ke Database
    try {
        Perangkat::create($validatedData);

        // PERBAIKAN: Gunakan NAMA ROUTE, bukan path URL
        // Cek web.php anda, jika namanya 'admin.perangkat.index', gunakan itu.
        return redirect()->route('admin.perangkat.index') 
                         ->with('success', 'Perangkat desa berhasil ditambahkan!');

    } catch (\Exception $e) {
        // Hapus foto jika database gagal menyimpan
        if (isset($validatedData['foto'])) {
            \Storage::disk('public')->delete($validatedData['foto']);
        }

        return back()->withInput()
                     ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

public function showPerangkat($id)
{
    $perangkat = Perangkat::findOrFail($id);
    $data = ['perangkat' => $perangkat];
    return view('admin.perangkat.detailPerangkat', $data);
}
public function deletePerangkat($id)
{
    // Menggunakan find() untuk mengambil satu data berdasarkan primary key
    $perangkat = Perangkat::find($id);

    // Cek apakah data perangkat memang ada
    if (!$perangkat) {
        return redirect()->back()->with('error', 'Data perangkat tidak ditemukan.');
    }

    // Hapus foto dari storage jika kolom foto tidak kosong
    if ($perangkat->foto) {
        // Pastikan path foto benar, asumsikan file disimpan di disk 'public'
        if (\Storage::disk('public')->exists($perangkat->foto)) {
            \Storage::disk('public')->delete($perangkat->foto);
        }
    }

    // Hapus data dari database
    if ($perangkat->delete()) {
        return redirect()->route('admin.perangkat.index')->with('success', 'Perangkat desa berhasil dihapus.');
    }

    return redirect()->back()->with('validasi', 'Gagal menghapus perangkat');
}

}

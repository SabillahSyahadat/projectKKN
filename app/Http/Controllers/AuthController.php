<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Laporan;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function adminDashboard()
    {
        $countWarga = Warga::count();
    $countBerita = Berita::count();
    
    return view('/admin/index', compact('countWarga', 'countBerita'));
        
    }
    public function login()
    {
        return view('/auth/login');
    }

    public function register()
    {
        return view('/auth/register');
    }

    public function isRegister(Request $request)
{
    // 1. Validasi sesuai dengan 3 kolom inputan baru
    $validated = $request->validate([
        'nik'            => 'required|numeric|digits:16',
        'email_warga'    => 'required|email',
        'password_warga' => 'required|min:8',
    ], [
        'nik.required'            => 'NIK wajib diisi.',
        'nik.digits'              => 'NIK harus tepat 16 digit.',
        'email_warga.required'    => 'Email wajib diisi.',
        'email_warga.email'       => 'Format email tidak valid.',
        'password_warga.required' => 'Password wajib diisi.',
        'password_warga.min'      => 'Password minimal bertumpu pada 8 karakter.',
    ]);

    // 2. Cek apakah NIK sudah terdaftar di database desa
    $warga = Warga::where('nik', $validated['nik'])->first();

    if ($warga) {
        // Cek juga apakah email yang diinput sudah dipakai oleh NIK lain agar tidak bentrok
        $emailTerpakai = Warga::where('email_warga', $validated['email_warga'])
                              ->where('nik', '!=', $validated['nik'])
                              ->exists();

        if ($emailTerpakai) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['email_warga' => 'Email ini sudah digunakan oleh akun lain.']);
        }

        // 3. JIKA NIK ADA: Update email dan password untuk akun warga tersebut
        $warga->update([
            'email_warga'    => $validated['email_warga'],
            'password_warga' => Hash::make($validated['password_warga']), // Amankan password dengan Hash
        ]);

        return redirect()->to('/auth/login')->with('success', 'Akun berhasil didaftarkan! Silakan masuk.');
    }

    // 4. JIKA NIK TIDAK ADA: Tolak registrasi karena NIK belum diinput oleh Admin Desa
    return redirect()->back()
        ->withInput()
        ->withErrors(['nik' => 'NIK Anda belum terdaftar dalam database Desa Sidomulyo. Silakan hubungi operator desa.']);
}

    public function isLogin(Request $request)
    {
        $credentials = [
        'email_warga' => $request->email_warga,
        'password'    => $request->password_warga,
    ];
        $admin = [
        'email_admin' => $request->email_warga,
        'password'    => $request->password_warga,
    ];

    if (Auth::guard('warga')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->to('/')->with('validasi', 'Anda berhasil Login');
    }
    if (Auth::guard('admin')->attempt($admin)) {
        $request->session()->regenerate();
        return redirect()->to('/admin/dashboard')->with('validasi', 'Anda berhasil Login');
    }

        return back()->withErrors(['email' => 'Login Warga Gagal']);
    }

    public function update(Request $request)
    {
    $user = Auth::guard('warga')->user();
   

  
    $request->validate([
        'nama_warga'   => 'required|string|max:255',
        
        'email_warga'  => 'required|email|unique:wargas,email_warga,' . $user->id, 
        
        'tgl_lahir'    => 'required|date',
        'alamat'       => 'required',
        'jenis_kelamin' => 'required',
        'status'       => 'required',
        'pekerjaan'    => 'required',
    ]);


    $user = Warga::updateProfil($request);
    
    Auth::guard('warga')->login($user);

    return redirect()->route('profil.show')->with('validasi', 'Profil berhasil diperbarui!');
    }

    public function logout(Request $request)
    {
        // 1. Logout dari guard 'warga'
        Auth::guard('warga')->logout();

        // 2. Menghapus semua data session user
        $request->session()->invalidate();

        // 3. Menghasilkan token baru untuk keamanan (mencegah session fixation)
        $request->session()->regenerateToken();

        // 4. Redirect ke halaman utama dengan pesan sukses
        return redirect('/')->with('validasi', 'Anda telah keluar.');
    }

    public function logoutAdmin(Request $request)
    {
        // 1. Logout dari guard 'admin'
        Auth::guard('admin')->logout();

        // 2. Menghapus semua data session user
        $request->session()->invalidate();

        // 3. Menghasilkan token baru untuk keamanan (mencegah session fixation)
        $request->session()->regenerateToken();

        // 4. Redirect ke halaman utama dengan pesan sukses
        return redirect('/auth/login')->with('validasi', 'Anda telah keluar.');
    }
}

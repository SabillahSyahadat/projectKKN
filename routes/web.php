<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PerangkatController;

Route::get('/', [PageController::class, 'index'])->name('index');//
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'isLogin'])->name('login.post');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/auth/register', [AuthController::class, 'isRegister'])->name('isRegister');
Route::get('/profil/logout', [AuthController::class, 'logout'])->name('logout');
Route::put('/profil/warga/update', [AuthController::class, 'update'])->name('profil.update');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/profil', [PageController::class, 'show'])->name('profil.show');
Route::get('/updateProfil/warga', [PageController::class, 'updateProfil'])->name('updateProfil.warga');
Route::get('/detail/warga/{id}', [PageController::class, 'showDetailWarga']);
Route::get('warga/laporan', [PageController::class, 'toLaporan'])->name('laporan');
Route::post('warga/laporan', [PageController::class, 'buatLaporan'])->name('submit.laporan');
Route::get('/warga/surat', [PageController::class, 'pilihSurat'])->name('pilihSurat');
Route::POST('/warga/kritik', [KritikSaranController::class, 'store'])->name('warga.kritik');//
Route::get('/berita/{slug}', [BeritaController::class, 'showDetailWarga'])->name('berita.detail');


Route::get('admin/dashboard', [AuthController::class, 'adminDashboard'])->name('adminDasboard');
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('adminLaporan');
Route::delete('/admin/laporan/{id}', [AdminController::class, 'destroyLaporan'])->name('admin.laporan.destroy');
Route::get('/admin/detailLaporan/{id}', [AdminController::class, 'detailLaporan'])->name('admin.detailLaporan');
Route::get('/admin/berita', [AdminController::class, 'showBerita'])->name('adminBerita');
Route::get('/admin/addBerita', [AdminController::class, 'addBerita'])->name('addBerita');
Route::post('/admin/storeBerita', [AdminController::class, 'storeBerita'])->name('storeBerita');
Route::post('admin/logout', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::delete('/admin/berita/{id}', [AdminController::class, 'destroyBerita'])->name('berita.destroy');
Route::get('admin/berita/{slug}', [BeritaController::class, 'showDetailAdmin'])->name('berita.detailAdmin');


Route::get('/admin/kritik-saran', [AdminController::class, 'adminIndex'])->name('admin.kritik');
Route::delete('/admin/kritik-saran/{id}', [AdminController::class, 'destroyKritik'])->name('admin.kritik.destroy');

// Route::post('surat/pengantar', [PDFController::class, 'pengantar'])->name('pengantar');
// Route::post('surat/domisili', [PDFController::class, 'domisili'])->name('domisili');
// Route::post('surat/sktm', [PDFController::class, 'sktm'])->name('sktm');
// Route::post('/surat/simpan', [PDFController::class, 'simpanKeDatabase'])->name('simpan.pengajuan');

Route::post('/surat/konfirmasi', [PDFController::class, 'konfirmasi'])->name('konfirmasi');
Route::post('/surat/simpan', [PDFController::class, 'simpanPengajuan'])->name('simpan.pengajuan');

Route::get('/admin/surat', [AdminController::class, 'surat'])->name('admin.surat.index');
Route::post('/admin/surat/{id}/setujui', [AdminController::class, 'setujui'])->name('admin.surat.setujui');
Route::post('/admin/surat/{id}/tolak', [AdminController::class, 'tolak'])->name('admin.surat.tolak');
Route::get('/warga/riwayatSurat', [PDFController::class, 'showSurat'])->name('showSurat');
// Menggunakan GET karena ini adalah proses download/view dokumen
Route::get('/cetak-surat/{id}', [PDFController::class, 'cetakPDF'])->name('cetak.surat');
Route::delete('/surat/hapus/{id}', [PDFController::class, 'destroy'])->name('surat.destroy');

Route::get('/admin/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
Route::post('/admin/galeri/store', [GaleriController::class, 'store'])->name('admin.galeri.store');

Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');
Route::delete('/admin/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

Route::get('/admin/perangkat', [PerangkatController::class, 'index'])->name('admin.perangkat.index');
Route::get('/admin/daftarWarga', [AdminController::class, 'daftarWarga'])->name('admin.daftarWarga');
Route::get('/admin/perangkat/tambah', [PerangkatController::class, 'addPerangkat'])->name('admin.tambah.perangkat');
Route::post('/admin/perangkat/save', [PerangkatController::class, 'savePerangkat'])->name('admin.perangkat.save');
Route::get('/admin/perangkat/{id}', [PerangkatController::class, 'showPerangkat'])->name('showPerangkat');
Route::delete('/admin/perangkat/{id}', [PerangkatController::class, 'deletePerangkat'])->name('admin.perangkat.delete');
Route::get('/admin/showWarga/{id}', [AdminController::class, 'showWarga'])->name('admin.showWarga');
Route::get('/warga/riwayatLaporan', [PageController::class, 'showLaporan'])->name('showLaporan');
Route::get('/admin/tambahWarga', [AdminController::class, 'tambahWarga'])->name('admin.tambahWarga');
Route::post('/admin/tambahWarga', [AdminController::class, 'storeWarga'])->name('admin.storeWarga');

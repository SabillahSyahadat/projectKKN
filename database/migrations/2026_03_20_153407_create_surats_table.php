<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('surats', function (Blueprint $table) {
        $table->id();
        // Relasi ke tabel warga (asumsi nama tabel: wargas)
        $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
        
        $table->string('jenis_surat'); // Surat Pengantar, SKTM, dll
        $table->string('nomor_surat')->nullable(); // Diisi oleh admin saat ACC
        $table->text('keperluan'); // Alasan yang diisi warga di menu konfirmasi
        
        // Status Pengajuan
        $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
        
        $table->text('keterangan_admin')->nullable(); // Alasan jika ditolak
        $table->timestamp('tgl_disetujui')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};

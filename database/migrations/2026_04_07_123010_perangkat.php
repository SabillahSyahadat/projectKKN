<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perangkats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable()->unique(); // NIP bisa kosong untuk perangkat non-PNS
            $table->string('jabatan'); // Contoh: Kepala Desa, Sekretaris, Kasih Pemerintahan
            $table->string('foto')->nullable();
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            
            // Kolom 'urutan' sangat penting untuk mengatur siapa yang tampil duluan di website
            $table->integer('urutan')->default(0); 
            
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perangkats');
    }
};
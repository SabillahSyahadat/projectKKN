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
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_berita'); // Judul berita
        $table->string('slug')->unique(); // Untuk URL yang elegan (contoh: /berita/kegiatan-desa)
        $table->text('isi_berita');
        $table->string('gambar_berita')->nullable(); // Menyimpan path file gambar
        $table->timestamps(); // Field created_at & updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};

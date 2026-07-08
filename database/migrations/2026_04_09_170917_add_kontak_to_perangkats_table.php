<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('perangkats', function (Blueprint $table) {
            // Menambah kolom kontak setelah kolom jabatan
            $table->string('whatsapp')->nullable()->after('jabatan');
            $table->string('email')->nullable()->after('whatsapp');
            
            // Jika Anda ingin mengubah kolom 'keterangan' menjadi lebih spesifik (Tugas & Fungsi)
            // Anda bisa mengganti namanya atau membiarkannya saja.
        });
    }

    public function down(): void
    {
        Schema::table('perangkats', function (Blueprint $table) {
            $table->dropColumn(['whatsapp', 'email']);
        });
    }
};
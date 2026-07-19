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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            
            // Catatan: Sangat disarankan NIK menggunakan string daripada bigInteger 
            // agar angka 0 di depan (jika ada) tidak hilang dan validasi panjang 16 digit lebih mudah.
            $table->bigInteger('nik')->unique(); 
            
            // Tambahkan ->nullable() ke semua field yang tidak diisi oleh admin
            $table->string('nama_warga', 512)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status')->nullable();
            $table->string('agama')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('email_warga', 512)->nullable();
            
            // Password dibiarkan wajib (tanpa nullable) karena warga butuh ini untuk login pertama kali.
            // Admin akan men-generate password default di Controller saat mendaftarkan NIK.
            $table->string('password_warga', 512)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
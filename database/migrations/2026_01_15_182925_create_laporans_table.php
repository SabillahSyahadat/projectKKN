<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();

            // FK ke wargas (berdasarkan NIK)
            $table->bigInteger('nik');
            $table->string('nama_pelapor');
            $table->text('isi_laporan');
            $table->string('foto_laporan')->nullable();

            $table->timestamps();

            // Foreign Key
            $table->foreign('nik')
                  ->references('nik')
                  ->on('wargas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};

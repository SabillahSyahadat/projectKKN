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
            $table->bigInteger('nik')->unique();
            $table->string('nama_warga', length:512);
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('status');
            $table->string('agama');
            $table->string('golongan_darah')->nullable();
            $table->string('kewarganegaraan');
            $table->string('pekerjaan');
            $table->string('email_warga', length:512);
            $table->string('password_warga', length:512);

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

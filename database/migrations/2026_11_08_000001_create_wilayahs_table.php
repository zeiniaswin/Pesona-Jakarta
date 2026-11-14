<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Deskripsi : Membuat tabel `wilayahs` (6 wilayah administratif DKI Jakarta).
 * Author    : Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
return new class extends Migration
{
    /** I.S.: tabel belum ada. F.S.: tabel `wilayahs` terbentuk. */
    public function up(): void
    {
        Schema::create('wilayahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wilayah')->unique();
            $table->string('tipe');
            $table->text('deskripsi');
            $table->string('karakteristik');
            $table->string('gambar')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('jumlah_penduduk')->nullable();
            $table->text('destinasi_unggulan')->nullable();
            $table->timestamps();
        });
    }

    /** I.S.: tabel ada. F.S.: tabel `wilayahs` dihapus. */
    public function down(): void
    {
        Schema::dropIfExists('wilayahs');
    }
};

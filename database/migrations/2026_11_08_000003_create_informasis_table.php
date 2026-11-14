<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Deskripsi : Membuat tabel `informasis` (data wisata/kuliner) yang berelasi
 *             ke `wilayahs` dan `kategoris` lewat foreign key.
 * Author    : Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
return new class extends Migration
{
    /** I.S.: tabel belum ada. F.S.: tabel `informasis` terbentuk beserta relasinya. */
    public function up(): void
    {
        Schema::create('informasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('alamat');
            $table->string('jam_operasional')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->string('gambar')->nullable();
            $table->foreignId('wilayah_id')->constrained('wilayahs')->restrictOnDelete();
            $table->foreignId('kategori_id')->constrained('kategoris')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /** I.S.: tabel ada. F.S.: tabel `informasis` dihapus. */
    public function down(): void
    {
        Schema::dropIfExists('informasis');
    }
};

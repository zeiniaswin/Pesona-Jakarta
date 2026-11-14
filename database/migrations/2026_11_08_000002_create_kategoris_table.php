<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Deskripsi : Membuat tabel `kategoris` (jenis informasi: wisata, kuliner, dst).
 * Author    : Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
return new class extends Migration
{
    /** I.S.: tabel belum ada. F.S.: tabel `kategoris` terbentuk. */
    public function up(): void
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori')->unique();
            $table->string('ikon')->default('ph-map-pin'); // kelas ikon Phosphor Icons
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /** I.S.: tabel ada. F.S.: tabel `kategoris` dihapus. */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};

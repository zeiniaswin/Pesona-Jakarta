<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model Informasi - data wisata/kuliner di DKI Jakarta.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class Informasi extends Model
{
    protected $table = 'informasis';

    protected $fillable = [
        'judul', 'deskripsi', 'alamat', 'jam_operasional', 'harga_tiket',
        'gambar', 'wilayah_id', 'kategori_id',
    ];

    /**
     * Deskripsi : Relasi informasi milik satu wilayah.
     * I.S.      : model Informasi terisi.
     * F.S.      : mengembalikan relasi BelongsTo ke Wilayah.
     */
    public function wilayah(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }

    /**
     * Deskripsi : Relasi informasi milik satu kategori.
     * I.S.      : model Informasi terisi.
     * F.S.      : mengembalikan relasi BelongsTo ke Kategori.
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
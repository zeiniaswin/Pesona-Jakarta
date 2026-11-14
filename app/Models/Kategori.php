<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model Kategori - jenis informasi (Sejarah & Budaya, Kuliner, dst).
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class Kategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = ['nama_kategori', 'ikon', 'deskripsi'];

    /**
     * Deskripsi : Relasi satu kategori memiliki banyak informasi.
     * I.S.      : model Kategori terisi.
     * F.S.      : mengembalikan relasi HasMany ke Informasi.
     */
    public function informasis(): HasMany
    {
        return $this->hasMany(Informasi::class, 'kategori_id');
    }
}

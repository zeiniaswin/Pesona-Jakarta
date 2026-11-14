<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model Wilayah - satu baris = satu wilayah administratif DKI Jakarta.
 * Author: Zeini Aswin Rangkuti | v1.1 | 08-11-2026
 */
class Wilayah extends Model
{
    protected $table = 'wilayahs';

    protected $fillable = [
        'nama_wilayah', 'tipe', 'deskripsi', 'karakteristik', 'gambar',
        'luas_wilayah', 'jumlah_penduduk', 'destinasi_unggulan',
    ];

    /**
     * Deskripsi : Relasi satu wilayah memiliki banyak informasi.
     * I.S.      : model Wilayah terisi.
     * F.S.      : mengembalikan relasi HasMany ke Informasi.
     */
    public function informasis(): HasMany
    {
        return $this->hasMany(Informasi::class, 'wilayah_id');
    }
}

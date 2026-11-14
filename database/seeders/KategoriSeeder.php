<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

/**
 * KategoriSeeder - mengisi 4 kategori informasi.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class KategoriSeeder extends Seeder
{
    /**
     * I.S.: tabel `kategoris` masih kosong/berisi data lama.
     * F.S.: data contoh terisi (updateOrCreate -> aman dijalankan berulang).
     */
    public function run(): void
    {
        $data = [
        [
            'nama_kategori' => 'Sejarah & Budaya',
            'ikon' => 'ph-bank',
            'deskripsi' => 'Monumen, museum, dan kawasan bersejarah serta budaya Betawi.',
        ],
        [
            'nama_kategori' => 'Alam & Bahari',
            'ikon' => 'ph-leaf',
            'deskripsi' => 'Pulau, pantai, dan ruang terbuka hijau untuk menikmati alam.',
        ],
        [
            'nama_kategori' => 'Hiburan & Belanja',
            'ikon' => 'ph-storefront',
            'deskripsi' => 'Taman hiburan, pusat perbelanjaan, dan tempat berkumpul.',
        ],
        [
            'nama_kategori' => 'Kuliner',
            'ikon' => 'ph-fork-knife',
            'deskripsi' => 'Makanan khas dan sentra kuliner di berbagai penjuru kota.',
        ],
        ];

        foreach ($data as $baris) {
            Kategori::updateOrCreate(['nama_kategori' => $baris['nama_kategori']], $baris);
        }
    }
}
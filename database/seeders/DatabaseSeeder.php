<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder - menjalankan seluruh seeder dengan urutan yang benar
 * (wilayah & kategori harus ada dulu sebelum informasi).
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class DatabaseSeeder extends Seeder
{
    /**
     * I.S.: tabel masih kosong setelah migrate.
     * F.S.: admin, wilayah, kategori, dan informasi contoh terisi.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            WilayahSeeder::class,
            KategoriSeeder::class,
            InformasiSeeder::class,
        ]);
    }
}
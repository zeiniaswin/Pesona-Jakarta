<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wilayah;

/**
 * WilayahSeeder - mengisi 6 wilayah administratif DKI Jakarta dengan foto lokal asli berkualitas tinggi.
 * Author: Zeini Aswin Rangkuti
 */
class WilayahSeeder extends Seeder
{
    /**
     * I.S.: tabel `wilayahs` masih kosong/berisi data lama.
     * F.S.: data contoh terisi (updateOrCreate -> aman dijalankan berulang).
     */
    public function run(): void
    {
        $data = [
            [
                'nama_wilayah' => 'Jakarta Pusat',
                'tipe' => 'Kota Administrasi',
                'deskripsi' => 'Sebagai pusat pemerintahan negara dan pusat bisnis utama di DKI Jakarta, wilayah ini menaungi berbagai ikon nasional, monumen bersejarah, dan gedung pemerintahan pusat.',
                'karakteristik' => 'Pusat Pemerintahan & Ikon Nasional',
                'gambar' => 'images/wilayah/jakarta-pusat.jpg',
                'luas_wilayah' => '48.13 km²',
                'jumlah_penduduk' => '1.1 Juta Jiwa',
                'destinasi_unggulan' => 'Monas, Masjid Istiqlal, Bundaran HI, Sarinah',
            ],
            [
                'nama_wilayah' => 'Jakarta Selatan',
                'tipe' => 'Kota Administrasi',
                'deskripsi' => 'Merupakan pusat bisnis modern, kawasan permukiman elit, dan pusat gaya hidup masa kini. Menjadi favorit ekspatriat dan pusat hiburan di ibu kota.',
                'karakteristik' => 'Pusat Bisnis Modern & Gaya Hidup',
                'gambar' => 'images/wilayah/jakarta-selatan.jpg',
                'luas_wilayah' => '141.27 km²',
                'jumlah_penduduk' => '2.3 Juta Jiwa',
                'destinasi_unggulan' => 'Kawasan SCBD, Kemang, Blok M, Setu Babakan',
            ],
            [
                'nama_wilayah' => 'Jakarta Barat',
                'tipe' => 'Kota Administrasi',
                'deskripsi' => 'Kawasan yang sarat akan sejarah kolonial dan pusat perdagangan perintis, yang kini berkembang pesat menjadi kawasan niaga padat dan pusat bisnis.',
                'karakteristik' => 'Pusat Sejarah & Perdagangan',
                'gambar' => 'images/wilayah/jakarta-barat.jpg',
                'luas_wilayah' => '129.54 km²',
                'jumlah_penduduk' => '2.5 Juta Jiwa',
                'destinasi_unggulan' => 'Kota Tua, Museum Fatahillah, Glodok, Taman Sari',
            ],
            [
                'nama_wilayah' => 'Jakarta Timur',
                'tipe' => 'Kota Administrasi',
                'deskripsi' => 'Wilayah dengan luas area terbesar di DKI Jakarta. Dikenal sebagai kawasan industri, permukiman warga, dan pusat pelestarian kebudayaan asli Betawi.',
                'karakteristik' => 'Kawasan Industri & Pelestarian Budaya',
                'gambar' => 'images/wilayah/jakarta-timur.jpg',
                'luas_wilayah' => '188.03 km²',
                'jumlah_penduduk' => '3.2 Juta Jiwa',
                'destinasi_unggulan' => 'Taman Mini Indonesia Indah, Cibubur, Danau Cipondoh',
            ],
            [
                'nama_wilayah' => 'Jakarta Utara',
                'tipe' => 'Kota Administrasi',
                'deskripsi' => 'Kawasan pesisir pantai utara yang menjadi pintu gerbang logistik laut nasional melalui pelabuhan, serta pusat rekreasi taman hiburan utama keluarga.',
                'karakteristik' => 'Pesisir Pantai & Gerbang Maritim',
                'gambar' => 'images/wilayah/jakarta-utara.jpg',
                'luas_wilayah' => '146.66 km²',
                'jumlah_penduduk' => '1.8 Juta Jiwa',
                'destinasi_unggulan' => 'Taman Impian Jaya Ancol, Pelabuhan Tanjung Priok, Muara Angke',
            ],
            [
                'nama_wilayah' => 'Kepulauan Seribu',
                'tipe' => 'Kabupaten Administrasi',
                'deskripsi' => 'Satu-satunya kabupaten di wilayah DKI Jakarta yang berupa gugusan pulau di Teluk Jakarta. Menjadi destinasi utama wisata bahari dan konservasi alam bawah laut.',
                'karakteristik' => 'Wisata Bahari & Konservasi Alam',
                'gambar' => 'images/wilayah/kepulauan-seribu.jpg',
                'luas_wilayah' => '8.70 km²',
                'jumlah_penduduk' => '28 Ribu Jiwa',
                'destinasi_unggulan' => 'Pulau Tidung, Pulau Pramuka, Pulau Pari, Pulau Macan',
            ],
        ];

        foreach ($data as $baris) {
            Wilayah::updateOrCreate(['nama_wilayah' => $baris['nama_wilayah']], $baris);
        }
    }
}

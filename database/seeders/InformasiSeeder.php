<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informasi;

/**
 * InformasiSeeder - mengisi data destinasi wisata, belanja, dan kuliner dengan foto asli Jakarta berkualitas tinggi.
 * Author: Zeini Aswin Rangkuti
 */
class InformasiSeeder extends Seeder
{
    /**
     * I.S.: tabel `informasis` masih kosong/berisi data lama.
     * F.S.: data contoh terisi lengkap dengan gambar lokal HD, jam operasional, dan harga tiket.
     */
    public function run(): void
    {
        $data = [
            // ---- Jakarta Pusat ----
            [
                'judul' => 'Monumen Nasional (Monas)',
                'deskripsi' => 'Ikon nasional yang menandai perjuangan bangsa Indonesia. Pengunjung dapat menikmati panorama kota dari puncak, museum sejarah perjuangan bangsa, serta area taman luas yang nyaman untuk bersantai.',
                'alamat' => 'Jl. Medan Merdeka Barat, Gambir, Jakarta Pusat',
                'jam_operasional' => 'Selasa – Minggu, 08.00 – 16.00 WIB (Senin tutup)',
                'harga_tiket' => 'Kawasan Monas gratis | Museum Dewasa Rp 5.000 | Puncak Dewasa Rp 15.000',
                'gambar' => 'images/informasi/monas.jpg',
                'wilayah_id' => 1,
                'kategori_id' => 1,
            ],
            [
                'judul' => 'Masjid Istiqlal',
                'deskripsi' => 'Masjid terbesar di Asia Tenggara yang menjadi simbol toleransi dan keberagaman di Jakarta. Arsitekturnya yang megah dan tata ruangnya yang luas menjadikannya destinasi religi yang menarik.',
                'alamat' => 'Jl. Taman Wijaya Kusuma, Pasar Baru, Jakarta Pusat',
                'jam_operasional' => 'Setiap hari, 04.00 – 22.00 WIB',
                'harga_tiket' => 'Gratis masuk',
                'gambar' => 'images/informasi/istiqlal.jpg',
                'wilayah_id' => 1,
                'kategori_id' => 1,
            ],
            [
                'judul' => 'Kuliner Jalan Sabang',
                'deskripsi' => 'Surga kuliner Jakarta yang ramai setiap malam, dengan sajian sate ayam khas, masakan Nusantara legendaris, hingga kafe modern untuk nongkrong santai.',
                'alamat' => 'Jl. H. Agus Salim (Jalan Sabang), Menteng, Jakarta Pusat',
                'jam_operasional' => 'Setiap hari, 10.00 – 24.00 WIB',
                'harga_tiket' => 'Gratis masuk | Harga makanan mulai Rp 15.000',
                'gambar' => 'images/informasi/sate-jalan-sabang.jpg',
                'wilayah_id' => 1,
                'kategori_id' => 4,
            ],
            [
                'judul' => 'Pasar Baru Jakarta',
                'deskripsi' => 'Kawasan belanja dan kuliner bersejarah yang berdiri sejak 1820. Pengunjung bisa menjelajahi koridor pejalan kaki beratap dengan toko tekstil, sepatu legendaris, suvenir, dan jajanan khas.',
                'alamat' => 'Jl. Pasar Baru, Sawah Besar, Jakarta Pusat',
                'jam_operasional' => 'Setiap hari, 09.00 – 21.00 WIB',
                'harga_tiket' => 'Gratis masuk',
                'gambar' => 'images/informasi/pasar-baru.jpg',
                'wilayah_id' => 1,
                'kategori_id' => 3,
            ],

            // ---- Jakarta Selatan ----
            [
                'judul' => 'Setu Babakan',
                'deskripsi' => 'Perkampungan Budaya Betawi yang menghadirkan danau asri, rumah panggung tradisional Betawi, pertunjukan seni lenong dan tanjidor, serta kuliner khas kerak telor dan bir pletok.',
                'alamat' => 'Srengseng Sawah, Jagakarsa, Jakarta Selatan',
                'jam_operasional' => 'Setiap hari, 09.00 – 18.00 WIB',
                'harga_tiket' => 'Gratis masuk',
                'gambar' => 'images/informasi/setu-babakan.jpg',
                'wilayah_id' => 2,
                'kategori_id' => 1,
            ],
            [
                'judul' => 'Taman Margasatwa Ragunan',
                'deskripsi' => 'Kebun binatang seluas 147 hektar dengan koleksi ribuan satwa dalam habitat rimbun dan asri. Destinasi rekreasi edukasi keluarga terpopuler dengan tiket yang sangat terjangkau.',
                'alamat' => 'Jl. Harsono RM No. 1, Ragunan, Pasar Minggu, Jakarta Selatan',
                'jam_operasional' => 'Selasa – Minggu, 07.00 – 16.00 WIB (Senin tutup)',
                'harga_tiket' => 'Dewasa Rp 4.000 | Anak-anak Rp 3.000 | Parkir Motor Rp 3.000',
                'gambar' => 'images/informasi/ragunan.jpg',
                'wilayah_id' => 2,
                'kategori_id' => 2,
            ],
            [
                'judul' => 'Kawasan Blok M',
                'deskripsi' => 'Pusat gaya hidup anak muda dan nostalgia ibu kota yang terintegrasi dengan MRT dan TransJakarta. Terkenal dengan sentra kuliner Little Tokyo Melawai, Blok M Square, dan M Bloc Space.',
                'alamat' => 'Kebayoran Baru, Jakarta Selatan',
                'jam_operasional' => 'Setiap hari, 10.00 – 22.00 WIB',
                'harga_tiket' => 'Gratis masuk',
                'gambar' => 'images/informasi/blok-m.jpg',
                'wilayah_id' => 2,
                'kategori_id' => 3,
            ],
            [
                'judul' => 'Gandaria City',
                'deskripsi' => 'Supermal modern 7 lantai dengan ratusan gerai internasional, area kuliner Piazza terbuka, bioskop IMAX, serta pusat hiburan keluarga terkemuka di Jakarta Selatan.',
                'alamat' => 'Jl. Sultan Iskandar Muda, Kebayoran Lama, Jakarta Selatan',
                'jam_operasional' => 'Setiap hari, 10.00 – 22.00 WIB',
                'harga_tiket' => 'Gratis masuk',
                'gambar' => 'images/informasi/gandaria-city.jpg',
                'wilayah_id' => 2,
                'kategori_id' => 3,
            ],

            // ---- Jakarta Barat ----
            [
                'judul' => 'Taman Anggrek',
                'deskripsi' => 'Pusat perbelanjaan legendaris di Jakarta Barat yang terkenal dengan wahana arena seluncur es indoor Skyrink berskala olimpiade, bioskop, dan ratusan butik serta restoran modern.',
                'alamat' => 'Jl. Letjen S. Parman No. 28, Grogol Petamburan, Jakarta Barat',
                'jam_operasional' => 'Setiap hari, 10.00 – 22.00 WIB',
                'harga_tiket' => 'Gratis masuk mall | Skyrink mulai Rp 110.000',
                'gambar' => 'images/informasi/taman-anggrek.jpg',
                'wilayah_id' => 3,
                'kategori_id' => 3,
            ],
            [
                'judul' => 'Kota Tua dan Museum Fatahillah',
                'deskripsi' => 'Kawasan cagar budaya dengan arsitektur kolonial abad ke-17 di Taman Fatahillah. Dilengkapi persewaan sepeda ontel warna-warni, meriam Si Jagur, dan suasana Batavia tempo dulu.',
                'alamat' => 'Taman Fatahillah, Pinangsia, Tamansari, Jakarta Barat',
                'jam_operasional' => 'Selasa – Minggu, 09.00 – 15.00 WIB (Senin tutup)',
                'harga_tiket' => 'Kawasan Kota Tua gratis | Museum Fatahillah Rp 5.000',
                'gambar' => 'images/informasi/museum-fatahillah.jpg',
                'wilayah_id' => 3,
                'kategori_id' => 1,
            ],
            [
                'judul' => 'Kuliner Pecinan Glodok',
                'deskripsi' => 'Pusat pecinan tertua Jakarta yang sarat aroma rempah autentik di Gang Gloria dan Jalan Pancoran. Menawarkan aneka bakmi legendaris, kopi es tak kie, dan jajanan peranakan legendaris.',
                'alamat' => 'Glodok, Taman Sari, Jakarta Barat',
                'jam_operasional' => 'Setiap hari, 07.00 – 21.00 WIB',
                'harga_tiket' => 'Gratis masuk | Harga makanan mulai Rp 10.000',
                'gambar' => 'images/informasi/glodok.jpg',
                'wilayah_id' => 3,
                'kategori_id' => 4,
            ],
            [
                'judul' => 'Pasar Mayestik',
                'deskripsi' => 'Sentra perdagangan tekstil dan penjahit terlengkap di ibu kota, serta pusat aneka jajanan pasar basah, pakaian tradisional, dan perlengkapan busana dengan harga bersaing.',
                'alamat' => 'Jl. Tebah III, Kebayoran Baru, Jakarta Selatan',
                'jam_operasional' => 'Setiap hari, 09.00 – 18.00 WIB',
                'harga_tiket' => 'Gratis masuk',
                'gambar' => 'images/informasi/pasar-mayestik.jpg',
                'wilayah_id' => 3,
                'kategori_id' => 3,
            ],
            [
                'judul' => 'Museum Bank Indonesia',
                'deskripsi' => 'Museum megah bergaya neo-klasikal peninggalan De Javasche Bank. Menampilkan sejarah perbankan dan moneter Nusantara melalui diorama interaktif serta ruang penyimpanan emas batangan.',
                'alamat' => 'Jl. Pintu Besar Utara No. 3, Jakarta Barat',
                'jam_operasional' => 'Selasa – Minggu, 08.00 – 15.30 WIB (Senin & Libur Nasional tutup)',
                'harga_tiket' => 'Rp 5.000 (Pelajar/Mahasiswa/Anak gratis)',
                'gambar' => 'images/informasi/museum-bi.jpg',
                'wilayah_id' => 3,
                'kategori_id' => 1,
            ],

            // ---- Jakarta Timur ----
            [
                'judul' => 'Taman Mini Indonesia Indah (TMII)',
                'deskripsi' => 'Taman rekreasi budaya ikonik seluas 150 hektar dengan 33 anjungan daerah berarsitektur adat asli Nusantara, Danau Kepulauan Indonesia, kereta gantung, dan Istana Anak-Anak megah.',
                'alamat' => 'Jl. Raya Taman Mini, Ceger, Cipayung, Jakarta Timur',
                'jam_operasional' => 'Setiap hari, 06.00 – 20.00 WIB',
                'harga_tiket' => 'Tiket Masuk Pintu Utama Rp 25.000/orang',
                'gambar' => 'images/informasi/tmii.jpg',
                'wilayah_id' => 4,
                'kategori_id' => 1,
            ],
            [
                'judul' => 'Cibubur Recreation and Park',
                'deskripsi' => 'Taman rekreasi keluarga di Cibubur dengan taman bunga bundar berair mancur indah, kolam renang, arena outbond, dan ruang terbuka hijau sejuk di Jakarta Timur.',
                'alamat' => 'Jl. Jambore No. 1, Cibubur, Ciracas, Jakarta Timur',
                'jam_operasional' => 'Setiap hari, 08.00 – 17.00 WIB',
                'harga_tiket' => 'Tiket masuk Rp 10.000/orang',
                'gambar' => 'images/informasi/cibubur-park.jpg',
                'wilayah_id' => 4,
                'kategori_id' => 2,
            ],
            [
                'judul' => 'Kebun Raya Cibubur',
                'deskripsi' => 'Area hijau rimbun dengan pepohonan rindang dan gazebo santai di kawasan Cibubur. Tempat favorit untuk piknik keluarga, bersantai di bawah pohon, dan aktivitas luar ruangan.',
                'alamat' => 'Kawasan Perkemahan & Taman Cibubur, Jakarta Timur',
                'jam_operasional' => 'Setiap hari, 07.00 – 17.00 WIB',
                'harga_tiket' => 'Tiket masuk mulai Rp 10.000',
                'gambar' => 'images/informasi/kebun-raya-cibubur.jpg',
                'wilayah_id' => 4,
                'kategori_id' => 2,
            ],
            [
                'judul' => 'Kawasan Kuliner Jatinegara',
                'deskripsi' => 'Pusat berburu jajanan pasar kue basah tradisional Nusantara dan kuliner khas Betawi yang legendaris di sekitar Pasar Regional Jatinegara yang semarak.',
                'alamat' => 'Jl. Jatinegara Timur, Balimester, Jatinegara, Jakarta Timur',
                'jam_operasional' => 'Setiap hari, 06.00 – 22.00 WIB',
                'harga_tiket' => 'Gratis masuk | Harga jajanan mulai Rp 3.000',
                'gambar' => 'images/informasi/jatinegara.jpg',
                'wilayah_id' => 4,
                'kategori_id' => 4,
            ],
            [
                'judul' => 'Jakarta Street Food Menteng',
                'deskripsi' => 'Pusat kuliner malam legendaris ibu kota, rumah bagi Nasi Goreng Kambing Kebon Sirih yang dimasak di wajan raksasa serta ragam hidangan khas kaki lima yang menggugah selera.',
                'alamat' => 'Kawasan Kebon Sirih & Sabang, Menteng, Jakarta Pusat',
                'jam_operasional' => 'Setiap hari, 17.00 – 01.00 WIB',
                'harga_tiket' => 'Gratis masuk | Makanan mulai Rp 25.000',
                'gambar' => 'images/informasi/street-food-menteng.jpg',
                'wilayah_id' => 4,
                'kategori_id' => 4,
            ],

            // ---- Jakarta Utara ----
            [
                'judul' => 'Taman Impian Jaya Ancol',
                'deskripsi' => 'Kawasan rekreasi tepi laut terbesar di Jakarta yang menaungi wahana spektakuler Dunia Fantasi (Dufan), Sea World, Atlantis Water Adventures, dan pantai berpasir putih.',
                'alamat' => 'Jl. Lodan Timur No. 7, Ancol, Pademangan, Jakarta Utara',
                'jam_operasional' => 'Setiap hari, 06.00 – 23.00 WIB',
                'harga_tiket' => 'Pintu Gerbang Utama Rp 30.000 | Dufan mulai Rp 225.000',
                'gambar' => 'images/informasi/ancol.jpg',
                'wilayah_id' => 5,
                'kategori_id' => 3,
            ],
            [
                'judul' => 'Pelabuhan Sunda Kelapa',
                'deskripsi' => 'Pelabuhan bersejarah cikal bakal Jakarta yang telah aktif sejak abad ke-12. Menampilkan jajaran kapal kayu Pinisi tradisional yang megah bersandar di dermaga.',
                'alamat' => 'Jl. Maritim No. 8, Penjaringan, Jakarta Utara',
                'jam_operasional' => 'Setiap hari, 06.00 – 18.00 WIB',
                'harga_tiket' => 'Tiket masuk Rp 5.000/orang',
                'gambar' => 'images/informasi/sunda-kelapa.jpg',
                'wilayah_id' => 5,
                'kategori_id' => 1,
            ],
            [
                'judul' => 'Pasar Ikan Muara Angke',
                'deskripsi' => 'Pusat pelelangan dan pasar hasil tangkapan laut terbesar di Jakarta. Pengunjung bisa membeli ikan segar langsung dari nelayan dan membakarnya langsung di warung seafood sekitar dermaga.',
                'alamat' => 'Kawasan Pelabuhan Muara Angke, Pluit, Jakarta Utara',
                'jam_operasional' => 'Setiap hari, 04.00 – 23.00 WIB',
                'harga_tiket' => 'Gratis masuk | Harga ikan mulai Rp 25.000/kg',
                'gambar' => 'images/informasi/muara-angke.jpg',
                'wilayah_id' => 5,
                'kategori_id' => 4,
            ],
            [
                'judul' => 'Kelapa Gading Food Street',
                'deskripsi' => 'Sentra kuliner dan gaya hidup kosmopolitan terkemuka di Jakarta Utara dengan kawasan La Piazza, GAFOY, dan deretan restoran masakan Nusantara, Oriental, hingga kafe modern.',
                'alamat' => 'Sentra Kelapa Gading, Kelapa Gading, Jakarta Utara',
                'jam_operasional' => 'Setiap hari, 10.00 – 23.00 WIB',
                'harga_tiket' => 'Gratis masuk',
                'gambar' => 'images/informasi/kelapa-gading.jpg',
                'wilayah_id' => 5,
                'kategori_id' => 4,
            ],
            [
                'judul' => 'Pantai Indah Kapuk',
                'deskripsi' => 'Kawasan konservasi alam hutan bakau seluas 99 hektar di pesisir Jakarta Utara. Menawarkan jembatan kayu di atas perairan mangrove, pondok segitiga ikonik, kano, dan udara segar laut.',
                'alamat' => 'Taman Wisata Alam Mangrove Angke Kapuk, Kamal Muara, Pantai Indah Kapuk, Jakarta Utara',
                'jam_operasional' => 'Setiap hari, 08.00 – 17.30 WIB',
                'harga_tiket' => 'Dewasa Rp 30.000 | Anak-anak Rp 15.000',
                'gambar' => 'images/informasi/pik.jpg',
                'wilayah_id' => 5,
                'kategori_id' => 2,
            ],

            // ---- Kepulauan Seribu ----
            [
                'judul' => 'Pulau Tidung',
                'deskripsi' => 'Pulau wisata bahari favorit berpasir putih yang tersohor dengan Jembatan Cinta merah muda yang menghubungkan Pulau Tidung Besar dan Kecil, spot snorkeling, dan panorama matahari terbit.',
                'alamat' => 'Kelurahan Pulau Tidung, Kepulauan Seribu Selatan',
                'jam_operasional' => 'Setiap hari, 24 Jam',
                'harga_tiket' => 'Gratis masuk pulau | Kapal penyeberangan mulai Rp 50.000',
                'gambar' => 'images/informasi/pulau-tidung.jpg',
                'wilayah_id' => 6,
                'kategori_id' => 2,
            ],
            [
                'judul' => 'Pulau Pramuka',
                'deskripsi' => 'Pusat administratif Kabupaten Kepulauan Seribu sekaligus pusat konservasi penyu sisik langka dan rehabilitasi terumbu karang dengan perairan tenang bergradasi biru kehijauan.',
                'alamat' => 'Kelurahan Pulau Panggang, Kepulauan Seribu Utara',
                'jam_operasional' => 'Setiap hari, 24 Jam',
                'harga_tiket' => 'Gratis masuk pulau | Konservasi Penyu Rp 10.000',
                'gambar' => 'images/informasi/pulau-pramuka.jpg',
                'wilayah_id' => 6,
                'kategori_id' => 2,
            ],
            [
                'judul' => 'Pulau Pari',
                'deskripsi' => 'Pulau berpasir putih halus berbentuk menyerupai ikan pari, terkenal dengan Pantai Pasir Perawan yang tenang, laguna mangrove, jalur bersepeda keliling pulau, dan air laut jernih.',
                'alamat' => 'Kelurahan Pulau Pari, Kepulauan Seribu Selatan',
                'jam_operasional' => 'Setiap hari, 24 Jam',
                'harga_tiket' => 'Pantai Pasir Perawan Rp 10.000',
                'gambar' => 'images/informasi/pulau-pari.jpg',
                'wilayah_id' => 6,
                'kategori_id' => 2,
            ],
            [
                'judul' => 'Pulau Macan',
                'deskripsi' => 'Resor ramah lingkungan (eco-resort) eksklusif dengan pondok panggung kayu tepi pantai, terumbu karang hidup yang sangat sehat, perairan toska bening, serta suasana privat yang menenangkan.',
                'alamat' => 'Kepulauan Seribu Utara, DKI Jakarta',
                'jam_operasional' => 'Setiap hari (reservasi disarankan)',
                'harga_tiket' => 'Paket menginap/day trip sesuai reservasi resor',
                'gambar' => 'images/informasi/pulau-macan.jpg',
                'wilayah_id' => 6,
                'kategori_id' => 2,
            ],
        ];

        foreach ($data as $baris) {
            Informasi::updateOrCreate(['judul' => $baris['judul']], $baris);
        }
    }
}

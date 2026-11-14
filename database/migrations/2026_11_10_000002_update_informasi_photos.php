<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private array $photos = [
        'Monumen Nasional (Monas)' => 'images/wilayah/jakarta-pusat.jpg',
        'Masjid Istiqlal' => 'images/informasi/istiqlal.jpg',
        'Kuliner Jalan Sabang' => 'images/informasi/sate-jalan-sabang.jpg',
        'Kawasan Blok M' => 'images/informasi/blok-m.jpg',
        'Setu Babakan' => 'images/wilayah/jakarta-selatan.jpg',
        'Taman Margasatwa Ragunan' => 'images/informasi/ragunan.jpg',
        'Kota Tua dan Museum Fatahillah' => 'images/wilayah/jakarta-barat.jpg',
        'Kuliner Pecinan Glodok' => 'images/informasi/glodok.jpg',
        'Taman Mini Indonesia Indah (TMII)' => 'images/wilayah/jakarta-timur.jpg',
        'Taman Impian Jaya Ancol' => 'images/wilayah/jakarta-utara.jpg',
        'Pelabuhan Sunda Kelapa' => 'images/informasi/sunda-kelapa.jpg',
        'Pasar Ikan Muara Angke' => 'images/informasi/muara-angke.jpg',
        'Pulau Tidung' => 'images/wilayah/kepulauan-seribu.jpg',
        'Pulau Pramuka' => 'images/informasi/pulau-pramuka.jpg',
    ];

    private array $previousPhotos = [
        'Monumen Nasional (Monas)' => 'https://images.unsplash.com/photo-1555899451-bcef244ea746?auto=format&fit=crop&w=800&q=80',
        'Masjid Istiqlal' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?auto=format&fit=crop&w=800&q=80',
        'Kuliner Jalan Sabang' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80',
        'Kawasan Blok M' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=800&q=80',
        'Setu Babakan' => 'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?auto=format&fit=crop&w=800&q=80',
        'Taman Margasatwa Ragunan' => 'https://images.unsplash.com/photo-1466921583968-f07aa80c526e?auto=format&fit=crop&w=800&q=80',
        'Kota Tua dan Museum Fatahillah' => 'https://images.unsplash.com/photo-1555899451-bcef244ea746?auto=format&fit=crop&w=800&q=80',
        'Kuliner Pecinan Glodok' => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?auto=format&fit=crop&w=800&q=80',
        'Taman Mini Indonesia Indah (TMII)' => 'https://images.unsplash.com/photo-1518684079-3c830dcef090?auto=format&fit=crop&w=800&q=80',
        'Taman Impian Jaya Ancol' => 'https://images.unsplash.com/photo-1605333555543-52467db5d962?auto=format&fit=crop&w=800&q=80',
        'Pelabuhan Sunda Kelapa' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=800&q=80',
        'Pasar Ikan Muara Angke' => 'https://images.unsplash.com/photo-1534482421-64566f976cfa?auto=format&fit=crop&w=800&q=80',
        'Pulau Tidung' => 'https://images.unsplash.com/photo-1580228495570-5b5832a4e21a?auto=format&fit=crop&w=800&q=80',
        'Pulau Pramuka' => 'https://images.unsplash.com/photo-1484291470158-b8f8d608850d?auto=format&fit=crop&w=800&q=80',
    ];

    public function up(): void
    {
        foreach ($this->photos as $title => $photo) {
            DB::table('informasis')
                ->where('judul', $title)
                ->update(['gambar' => $photo]);
        }
    }

    public function down(): void
    {
        foreach ($this->previousPhotos as $title => $photo) {
            DB::table('informasis')
                ->where('judul', $title)
                ->update(['gambar' => $photo]);
        }
    }
};

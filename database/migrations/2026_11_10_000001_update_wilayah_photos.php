<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private array $photos = [
        'Jakarta Pusat' => 'images/wilayah/jakarta-pusat.jpg',
        'Jakarta Selatan' => 'images/wilayah/jakarta-selatan.jpg',
        'Jakarta Barat' => 'images/wilayah/jakarta-barat.jpg',
        'Jakarta Timur' => 'images/wilayah/jakarta-timur.jpg',
        'Jakarta Utara' => 'images/wilayah/jakarta-utara.jpg',
        'Kepulauan Seribu' => 'images/wilayah/kepulauan-seribu.jpg',
    ];

    private array $previousPhotos = [
        'Jakarta Pusat' => 'https://images.unsplash.com/photo-1555899451-bcef244ea746?auto=format&fit=crop&w=800&q=80',
        'Jakarta Selatan' => 'https://images.unsplash.com/photo-1577971132997-c10be9372519?auto=format&fit=crop&w=800&q=80',
        'Jakarta Barat' => 'https://images.unsplash.com/photo-1582967675753-43513b860ee3?auto=format&fit=crop&w=800&q=80',
        'Jakarta Timur' => 'https://images.unsplash.com/photo-1627918512591-62d4c062c3f8?auto=format&fit=crop&w=800&q=80',
        'Jakarta Utara' => 'https://images.unsplash.com/photo-1605333555543-52467db5d962?auto=format&fit=crop&w=800&q=80',
        'Kepulauan Seribu' => 'https://images.unsplash.com/photo-1580228495570-5b5832a4e21a?auto=format&fit=crop&w=800&q=80',
    ];

    public function up(): void
    {
        foreach ($this->photos as $region => $photo) {
            DB::table('wilayahs')
                ->where('nama_wilayah', $region)
                ->update(['gambar' => $photo]);
        }
    }

    public function down(): void
    {
        foreach ($this->previousPhotos as $region => $photo) {
            DB::table('wilayahs')
                ->where('nama_wilayah', $region)
                ->update(['gambar' => $photo]);
        }
    }
};

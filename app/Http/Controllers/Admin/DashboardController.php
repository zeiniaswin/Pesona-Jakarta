<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Wilayah;

/**
 * DashboardController - ringkasan data untuk panel admin.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class DashboardController extends Controller
{
    /**
     * Deskripsi : Menampilkan peringkat wilayah dan 5 informasi terbaru.
     * I.S.      : admin membuka "/admin/dashboard".
     * F.S.      : view `admin.dashboard` tampil.
     */
    public function index()
    {
        // Urutkan wilayah dari yang punya informasi terbanyak (pengurutan array/koleksi)
        $perWilayah = Wilayah::withCount('informasis')->get()->sortByDesc('informasis_count')->values();

        $terbaru = Informasi::with(['wilayah', 'kategori'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('perWilayah', 'terbaru'));
    }
}

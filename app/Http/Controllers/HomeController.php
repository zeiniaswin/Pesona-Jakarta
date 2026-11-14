<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kategori;
use App\Models\Wilayah;
use Illuminate\Http\Request;

/**
 * HomeController - menangani semua halaman publik PesonaJakarta.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class HomeController extends Controller
{
    /**
     * Deskripsi : Menampilkan beranda (6 wilayah, kategori, dan informasi terbaru).
     * I.S.      : pengunjung membuka alamat "/".
     * F.S.      : view `home` tampil dengan data dari database.
     */
    public function index()
    {
        $wilayahs  = Wilayah::orderBy('id')->get();
        $kategoris = Kategori::orderBy('id')->get();
        $terbaru   = Informasi::with(['wilayah', 'kategori'])->latest()->take(6)->get();

        return view('home', compact('wilayahs', 'kategoris', 'terbaru'));
    }

    /**
     * Menampilkan daftar wilayah tanpa konten beranda lainnya.
     */
    public function daftarWilayah()
    {
        $wilayahs = Wilayah::orderBy('id')->get();

        return view('wilayah.index', compact('wilayahs'));
    }

    /**
     * Deskripsi : Menampilkan profil satu wilayah beserta informasi di dalamnya.
     * I.S.      : pengunjung membuka "/wilayah/{id}".
     * F.S.      : view `wilayah.show` tampil (404 otomatis jika id tidak ada).
     */
    public function wilayah(Wilayah $wilayah)
    {
        $daftar = $wilayah->informasis()->with(['wilayah', 'kategori'])->orderBy('judul')->get();

        // Pecah teks "A, B, C" menjadi array agar bisa ditampilkan sebagai label
        $unggulan = array_filter(array_map('trim', explode(',', (string) $wilayah->destinasi_unggulan)));

        return view('wilayah.show', compact('wilayah', 'daftar', 'unggulan'));
    }

    /**
     * Deskripsi : Menampilkan daftar informasi dengan filter kategori, wilayah, dan kata kunci.
     * I.S.      : pengunjung membuka "/informasi" (boleh disertai ?q=&kategori=&wilayah=).
     * F.S.      : view `informasi.index` tampil dengan hasil terfilter, 9 data per halaman.
     */
    public function informasi(Request $request)
    {
        $query = Informasi::with(['wilayah', 'kategori']);

        if ($request->filled('kategori')) {
            $query->where('kategori_id', (int) $request->input('kategori'));
        }
        if ($request->filled('wilayah')) {
            $query->where('wilayah_id', (int) $request->input('wilayah'));
        }
        if ($request->filled('q')) {
            $kata = trim($request->input('q'));
            $query->where(function ($w) use ($kata) {
                $w->where('judul', 'like', "%{$kata}%")
                  ->orWhere('deskripsi', 'like', "%{$kata}%")
                  ->orWhere('alamat', 'like', "%{$kata}%");
            });
        }

        $daftar    = $query->orderBy('judul')->paginate(6)->withQueryString();
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        $wilayahs  = Wilayah::orderBy('id')->get();

        return view('informasi.index', compact('daftar', 'kategoris', 'wilayahs'));
    }

    /**
     * Deskripsi : Menampilkan detail satu informasi dan rekomendasi terkait.
     * I.S.      : pengunjung membuka "/informasi/{id}".
     * F.S.      : view `informasi.show` tampil beserta maksimal 3 informasi sewilayah.
     */
    public function detail(Informasi $informasi)
    {
        $informasi->load(['wilayah', 'kategori']);

        $terkait = Informasi::with(['wilayah', 'kategori'])
            ->where('wilayah_id', $informasi->wilayah_id)
            ->where('id', '!=', $informasi->id)
            ->take(3)
            ->get();

        return view('informasi.show', compact('informasi', 'terkait'));
    }

    /**
     * Deskripsi : Menampilkan halaman Tentang website.
     * I.S.      : pengunjung membuka "/tentang".
     * F.S.      : view `tentang` tampil.
     */
    public function tentang()
    {
        return view('tentang');
    }
}
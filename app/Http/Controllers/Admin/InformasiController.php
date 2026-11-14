<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\PesanValidasi;
use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Kategori;
use App\Models\Wilayah;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

/**
 * Admin\InformasiController - CRUD data informasi wisata/kuliner.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class InformasiController extends Controller
{
    use PesanValidasi;

    /**
     * Deskripsi : Menyusun aturan validasi form informasi.
     * I.S.      : -
     * F.S.      : mengembalikan array aturan validasi.
     */
    private function aturan(): array
    {
        return [
            'judul'           => ['required', 'string', 'max:255'],
            'deskripsi'       => ['required', 'string'],
            'alamat'          => ['required', 'string', 'max:255'],
            'jam_operasional' => ['nullable', 'string', 'max:255'],
            'harga_tiket'     => ['nullable', 'string', 'max:255'],
            'gambar'          => ['nullable', 'url', 'max:255'],
            'wilayah_id'      => ['required', 'exists:wilayahs,id'],
            'kategori_id'     => ['required', 'exists:kategoris,id'],
        ];
    }

    /**
     * Deskripsi : Menyiapkan pilihan dropdown wilayah & kategori untuk form.
     * I.S.      : -
     * F.S.      : mengembalikan array [id => nama] untuk wilayah dan kategori.
     */
    private function pilihan(): array
    {
        return [
            'wilayahOpsi'  => Wilayah::orderBy('id')->pluck('nama_wilayah', 'id')->all(),
            'kategoriOpsi' => Kategori::orderBy('nama_kategori')->pluck('nama_kategori', 'id')->all(),
        ];
    }

    /**
     * Deskripsi : Menampilkan tabel informasi (15 data per halaman).
     * I.S.      : admin membuka "/admin/informasi".
     * F.S.      : view `admin.informasi.index` tampil.
     */
    public function index()
    {
        $daftar = Informasi::with(['wilayah', 'kategori'])->latest()->paginate(15);

        return view('admin.informasi.index', compact('daftar'));
    }

    /**
     * Deskripsi : Menampilkan form tambah informasi.
     * I.S.      : admin klik "Tambah Informasi".
     * F.S.      : form kosong tampil.
     */
    public function create()
    {
        return view('admin.informasi.form', ['informasi' => null] + $this->pilihan());
    }

    /**
     * Deskripsi : Menyimpan informasi baru setelah divalidasi.
     * I.S.      : form tambah dikirim.
     * F.S.      : data masuk database, kembali ke daftar dengan pesan sukses.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->aturan(), $this->pesan());
        Informasi::create($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    /**
     * Deskripsi : Menampilkan form edit informasi.
     * I.S.      : admin klik "Edit".
     * F.S.      : form terisi data lama tampil.
     */
    public function edit(Informasi $informasi)
    {
        return view('admin.informasi.form', compact('informasi') + $this->pilihan());
    }

    /**
     * Deskripsi : Memperbarui informasi setelah divalidasi.
     * I.S.      : form edit dikirim.
     * F.S.      : data berubah, kembali ke daftar dengan pesan sukses.
     */
    public function update(Request $request, Informasi $informasi)
    {
        $data = $request->validate($this->aturan(), $this->pesan());
        $informasi->update($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui!');
    }

    /**
     * Deskripsi : Menghapus satu informasi.
     * I.S.      : admin konfirmasi hapus.
     * F.S.      : data terhapus, atau pesan error jika gagal.
     */
    public function destroy(Informasi $informasi)
    {
        try {
            $informasi->delete();
        } catch (QueryException $e) {
            return back()->with('error', 'Gagal menghapus informasi. Terjadi kesalahan pada database.');
        }

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }
}
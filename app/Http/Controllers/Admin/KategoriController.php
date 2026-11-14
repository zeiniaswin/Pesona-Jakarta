<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\PesanValidasi;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Admin\KategoriController - CRUD data kategori informasi.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class KategoriController extends Controller
{
    use PesanValidasi;

    /**
     * Deskripsi : Menyusun aturan validasi form kategori.
     * I.S.      : $ignoreId berisi id saat edit (null saat tambah).
     * F.S.      : mengembalikan array aturan validasi.
     */
    private function aturan(?int $ignoreId = null): array
    {
        return [
            'nama_kategori' => ['required', 'string', 'max:255', Rule::unique('kategoris', 'nama_kategori')->ignore($ignoreId)],
            'ikon'          => ['required', 'string', 'max:100', 'regex:/^ph-[a-z0-9-]+$/'],
            'deskripsi'     => ['nullable', 'string'],
        ];
    }

    /**
     * Deskripsi : Menampilkan tabel semua kategori.
     * I.S.      : admin membuka "/admin/kategori".
     * F.S.      : view `admin.kategori.index` tampil.
     */
    public function index()
    {
        $kategoris = Kategori::withCount('informasis')->orderBy('id')->get();

        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Deskripsi : Menampilkan form tambah kategori.
     * I.S.      : admin klik "Tambah Kategori".
     * F.S.      : form kosong tampil.
     */
    public function create()
    {
        return view('admin.kategori.form', ['kategori' => null]);
    }

    /**
     * Deskripsi : Menyimpan kategori baru setelah divalidasi.
     * I.S.      : form tambah dikirim.
     * F.S.      : data masuk database, kembali ke daftar dengan pesan sukses.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->aturan(), $this->pesan());
        Kategori::create($data);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Deskripsi : Menampilkan form edit kategori.
     * I.S.      : admin klik "Edit".
     * F.S.      : form terisi data lama tampil.
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.form', compact('kategori'));
    }

    /**
     * Deskripsi : Memperbarui kategori setelah divalidasi.
     * I.S.      : form edit dikirim.
     * F.S.      : data berubah, kembali ke daftar dengan pesan sukses.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $data = $request->validate($this->aturan($kategori->id), $this->pesan());
        $kategori->update($data);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Deskripsi : Menghapus kategori (ditolak jika masih dipakai informasi).
     * I.S.      : admin konfirmasi hapus.
     * F.S.      : data terhapus, atau pesan error jika gagal.
     */
    public function destroy(Kategori $kategori)
    {
        if ($kategori->informasis()->exists()) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih dipakai data informasi.');
        }

        try {
            $kategori->delete();
        } catch (QueryException $e) {
            return back()->with('error', 'Gagal menghapus kategori. Terjadi kesalahan pada database.');
        }

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\PesanValidasi;
use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Admin\WilayahController - CRUD data wilayah.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class WilayahController extends Controller
{
    use PesanValidasi;

    /** Daftar tipe administrasi yang diperbolehkan. */
    private const TIPE = ['Kota Administrasi', 'Kabupaten Administrasi'];

    /**
     * Deskripsi : Menyusun aturan validasi form wilayah.
     * I.S.      : $ignoreId berisi id saat edit (null saat tambah).
     * F.S.      : mengembalikan array aturan validasi.
     */
    private function aturan(?int $ignoreId = null): array
    {
        return [
            'nama_wilayah'       => ['required', 'string', 'max:255', Rule::unique('wilayahs', 'nama_wilayah')->ignore($ignoreId)],
            'tipe'               => ['required', Rule::in(self::TIPE)],
            'deskripsi'          => ['required', 'string'],
            'karakteristik'      => ['required', 'string', 'max:255'],
            'gambar'             => ['nullable', 'url', 'max:255'],
            'luas_wilayah'       => ['nullable', 'string', 'max:255'],
            'jumlah_penduduk'    => ['nullable', 'string', 'max:255'],
            'destinasi_unggulan' => ['nullable', 'string'],
        ];
    }

    /**
     * Deskripsi : Menampilkan tabel semua wilayah.
     * I.S.      : admin membuka "/admin/wilayah".
     * F.S.      : view `admin.wilayah.index` tampil.
     */
    public function index()
    {
        $wilayahs = Wilayah::withCount('informasis')->orderBy('id')->get();

        return view('admin.wilayah.index', compact('wilayahs'));
    }

    /**
     * Deskripsi : Menampilkan form tambah wilayah.
     * I.S.      : admin klik "Tambah Wilayah".
     * F.S.      : form kosong tampil.
     */
    public function create()
    {
        return view('admin.wilayah.form', ['wilayah' => null, 'tipeList' => self::TIPE]);
    }

    /**
     * Deskripsi : Menyimpan wilayah baru setelah divalidasi.
     * I.S.      : form tambah dikirim.
     * F.S.      : data masuk database lalu kembali ke daftar dengan pesan sukses.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->aturan(), $this->pesan());
        Wilayah::create($data);

        return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil ditambahkan!');
    }

    /**
     * Deskripsi : Menampilkan form edit wilayah.
     * I.S.      : admin klik "Edit" pada satu baris.
     * F.S.      : form terisi data lama tampil.
     */
    public function edit(Wilayah $wilayah)
    {
        return view('admin.wilayah.form', ['wilayah' => $wilayah, 'tipeList' => self::TIPE]);
    }

    /**
     * Deskripsi : Memperbarui data wilayah setelah divalidasi.
     * I.S.      : form edit dikirim.
     * F.S.      : data di database berubah, kembali ke daftar dengan pesan sukses.
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $data = $request->validate($this->aturan($wilayah->id), $this->pesan());
        $wilayah->update($data);

        return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil diperbarui!');
    }

    /**
     * Deskripsi : Menghapus wilayah (ditolak jika masih punya informasi).
     * I.S.      : admin konfirmasi hapus.
     * F.S.      : data terhapus, atau pesan error jika gagal.
     */
    public function destroy(Wilayah $wilayah)
    {
        if ($wilayah->informasis()->exists()) {
            return back()->with('error', 'Wilayah tidak dapat dihapus karena masih memiliki data informasi.');
        }

        try {
            $wilayah->delete();
        } catch (QueryException $e) {
            return back()->with('error', 'Gagal menghapus wilayah. Terjadi kesalahan pada database.');
        }

        return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers\Concerns;

/**
 * Trait PesanValidasi - pesan error validasi berbahasa Indonesia
 * yang dipakai bersama oleh semua controller admin.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
trait PesanValidasi
{
    /**
     * Deskripsi : Menyediakan daftar pesan validasi.
     * I.S.      : -
     * F.S.      : mengembalikan array pesan untuk $request->validate().
     */
    protected function pesan(): array
    {
        return [
            'required'   => ':attribute wajib diisi.',
            'string'     => ':attribute harus berupa teks.',
            'max.string' => ':attribute maksimal :max karakter.',
            'url'        => ':attribute harus berupa URL yang valid (diawali http/https).',
            'unique'     => ':attribute sudah digunakan.',
            'exists'     => ':attribute yang dipilih tidak valid.',
            'in'         => ':attribute yang dipilih tidak valid.',
            'regex'      => 'Format :attribute tidak valid.',
        ];
    }
}

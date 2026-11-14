@extends('layouts.admin')

@php $edit = $informasi !== null; @endphp
@section('title', $edit ? 'Edit Informasi' : 'Tambah Informasi')

@section('content')
<a href="{{ route('admin.informasi.index') }}" class="text-sm text-ink/55 hover:text-merah"><i class="ph-bold ph-arrow-left mr-1"></i> Kembali</a>
<h2 class="text-4xl font-display font-extrabold text-ink mt-2 mb-6">{{ $edit ? 'Edit' : 'Tambah' }} Informasi</h2>

<form method="POST" action="{{ $edit ? route('admin.informasi.update', $informasi) : route('admin.informasi.store') }}" class="card space-y-5 max-w-3xl">
    @csrf
    @if($edit) @method('PUT') @endif

    @include('admin.partials.field', ['name' => 'judul', 'label' => 'Judul', 'wajib' => true, 'value' => $informasi->judul ?? ''])

    <div class="grid md:grid-cols-2 gap-5">
        @include('admin.partials.field', ['name' => 'kategori_id', 'label' => 'Kategori', 'wajib' => true, 'type' => 'select', 'options' => $kategoriOpsi, 'value' => $informasi->kategori_id ?? ''])
        @include('admin.partials.field', ['name' => 'wilayah_id', 'label' => 'Wilayah', 'wajib' => true, 'type' => 'select', 'options' => $wilayahOpsi, 'value' => $informasi->wilayah_id ?? ''])
    </div>

    @include('admin.partials.field', ['name' => 'deskripsi', 'label' => 'Deskripsi', 'wajib' => true, 'type' => 'textarea', 'value' => $informasi->deskripsi ?? ''])
    @include('admin.partials.field', ['name' => 'alamat', 'label' => 'Alamat', 'wajib' => true, 'value' => $informasi->alamat ?? ''])

    <div class="grid md:grid-cols-2 gap-5">
        @include('admin.partials.field', ['name' => 'jam_operasional', 'label' => 'Jam Operasional', 'bantuan' => 'Opsional. Contoh: Setiap hari 08.00 - 16.00', 'value' => $informasi->jam_operasional ?? ''])
        @include('admin.partials.field', ['name' => 'harga_tiket', 'label' => 'Harga Tiket', 'bantuan' => 'Opsional. Contoh: Gratis / Rp 20.000', 'value' => $informasi->harga_tiket ?? ''])
    </div>

    @include('admin.partials.field', ['name' => 'gambar', 'label' => 'URL Gambar', 'type' => 'url', 'bantuan' => 'Opsional. Tempel alamat gambar (https://...).', 'value' => $informasi->gambar ?? ''])

    <div class="flex gap-3 pt-2">
        <button class="btn btn-red"><i class="ph-bold ph-floppy-disk"></i> Simpan</button>
        <a href="{{ route('admin.informasi.index') }}" class="btn btn-gray">Batal</a>
    </div>
</form>
@endsection
@extends('layouts.admin')

@php $edit = $wilayah !== null; @endphp
@section('title', $edit ? 'Edit Wilayah' : 'Tambah Wilayah')

@section('content')
<a href="{{ route('admin.wilayah.index') }}" class="text-sm text-ink/55 hover:text-merah"><i class="ph-bold ph-arrow-left mr-1"></i> Kembali</a>
<h2 class="text-4xl font-display font-extrabold text-ink mt-2 mb-6">{{ $edit ? 'Edit' : 'Tambah' }} Wilayah</h2>

<form method="POST" action="{{ $edit ? route('admin.wilayah.update', $wilayah) : route('admin.wilayah.store') }}" class="card space-y-5 max-w-3xl">
    @csrf
    @if($edit) @method('PUT') @endif

    @include('admin.partials.field', ['name' => 'nama_wilayah', 'label' => 'Nama Wilayah', 'wajib' => true, 'value' => $wilayah->nama_wilayah ?? ''])
    @include('admin.partials.field', ['name' => 'tipe', 'label' => 'Tipe Administrasi', 'wajib' => true, 'type' => 'select', 'options' => array_combine($tipeList, $tipeList), 'value' => $wilayah->tipe ?? ''])
    @include('admin.partials.field', ['name' => 'karakteristik', 'label' => 'Karakteristik Singkat', 'wajib' => true, 'value' => $wilayah->karakteristik ?? ''])
    @include('admin.partials.field', ['name' => 'deskripsi', 'label' => 'Deskripsi', 'wajib' => true, 'type' => 'textarea', 'value' => $wilayah->deskripsi ?? ''])
    @include('admin.partials.field', ['name' => 'gambar', 'label' => 'URL Gambar', 'type' => 'url', 'bantuan' => 'Opsional. Tempel alamat gambar (https://...).', 'value' => $wilayah->gambar ?? ''])

    <div class="grid md:grid-cols-2 gap-5">
        @include('admin.partials.field', ['name' => 'luas_wilayah', 'label' => 'Luas Wilayah', 'bantuan' => 'Contoh: 48.13 km²', 'value' => $wilayah->luas_wilayah ?? ''])
        @include('admin.partials.field', ['name' => 'jumlah_penduduk', 'label' => 'Jumlah Penduduk', 'bantuan' => 'Contoh: 1.1 Juta Jiwa', 'value' => $wilayah->jumlah_penduduk ?? ''])
    </div>

    @include('admin.partials.field', ['name' => 'destinasi_unggulan', 'label' => 'Destinasi Unggulan', 'type' => 'textarea', 'bantuan' => 'Pisahkan dengan koma. Contoh: Monas, Masjid Istiqlal', 'value' => $wilayah->destinasi_unggulan ?? ''])

    <div class="flex gap-3 pt-2">
        <button class="btn btn-red"><i class="ph-bold ph-floppy-disk"></i> Simpan</button>
        <a href="{{ route('admin.wilayah.index') }}" class="btn btn-gray">Batal</a>
    </div>
</form>
@endsection

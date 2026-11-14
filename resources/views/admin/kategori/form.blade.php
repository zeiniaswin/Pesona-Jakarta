@extends('layouts.admin')

@php $edit = $kategori !== null; @endphp
@section('title', $edit ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
<a href="{{ route('admin.kategori.index') }}" class="text-sm text-ink/55 hover:text-merah"><i class="ph-bold ph-arrow-left mr-1"></i> Kembali</a>
<h2 class="text-4xl font-display font-extrabold text-ink mt-2 mb-6">{{ $edit ? 'Edit' : 'Tambah' }} Kategori</h2>

<form method="POST" action="{{ $edit ? route('admin.kategori.update', $kategori) : route('admin.kategori.store') }}" class="card space-y-5 max-w-2xl">
    @csrf
    @if($edit) @method('PUT') @endif

    @include('admin.partials.field', ['name' => 'nama_kategori', 'label' => 'Nama Kategori', 'wajib' => true, 'value' => $kategori->nama_kategori ?? ''])
    @include('admin.partials.field', ['name' => 'ikon', 'label' => 'Ikon (Phosphor Icons)', 'wajib' => true, 'bantuan' => 'Awali dengan "ph-". Contoh: ph-fork-knife, ph-bank, ph-leaf (daftar lengkap: phosphoricons.com)', 'value' => $kategori->ikon ?? 'ph-map-pin'])
    @include('admin.partials.field', ['name' => 'deskripsi', 'label' => 'Deskripsi', 'type' => 'textarea', 'value' => $kategori->deskripsi ?? ''])

    <div class="flex gap-3 pt-2">
        <button class="btn btn-red"><i class="ph-bold ph-floppy-disk"></i> Simpan</button>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-gray">Batal</a>
    </div>
</form>
@endsection

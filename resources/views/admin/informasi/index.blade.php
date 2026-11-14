@extends('layouts.admin')

@section('title', 'Kelola Informasi')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
    <div>
        <h2 class="text-4xl font-display font-extrabold text-ink">Kelola Informasi</h2>
        <p class="text-ink/60 text-sm mt-1">Data wisata, budaya, dan kuliner yang tampil di website.</p>
    </div>
    <a href="{{ route('admin.informasi.create') }}" class="btn btn-red"><i class="ph-bold ph-plus"></i> Tambah Informasi</a>
</div>

<div class="card !p-0 overflow-hidden">
    <div class="p-4 border-b border-slate-100">
        <input type="text" data-live-search placeholder="Cari judul, wilayah, kategori (pada halaman ini)..." class="input max-w-md">
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-400 uppercase text-xs tracking-wider">
                    <th class="py-4 px-6">Judul</th>
                    <th class="py-4 px-6">Kategori</th>
                    <th class="py-4 px-6">Wilayah</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($daftar as $item)
                    <tr data-live-item data-live-text="{{ Str::lower($item->judul . ' ' . $item->kategori->nama_kategori . ' ' . $item->wilayah->nama_wilayah . ' ' . $item->alamat) }}" class="hover:bg-slate-50">
                        <td class="py-4 px-6">
                            <p class="font-bold">{{ $item->judul }}</p>
                            <p class="text-xs text-slate-400 max-w-xs truncate">{{ $item->alamat }}</p>
                        </td>
                        <td class="py-4 px-6"><span class="bg-red-50 text-red-700 font-bold px-3 py-1 rounded-full text-xs border border-red-100"><i class="ph-bold {{ $item->kategori->ikon }} mr-1"></i>{{ $item->kategori->nama_kategori }}</span></td>
                        <td class="py-4 px-6 text-slate-600">{{ $item->wilayah->nama_wilayah }}</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('informasi.show', $item) }}" target="_blank" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded-full font-bold text-xs transition"><i class="ph-bold ph-eye"></i></a>
                                <a href="{{ route('admin.informasi.edit', $item) }}" class="bg-amber-100 hover:bg-amber-200 text-amber-800 px-3 py-1.5 rounded-full font-bold text-xs transition"><i class="ph-bold ph-pencil-simple"></i> Edit</a>
                                <form action="{{ route('admin.informasi.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus informasi ini?')">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1.5 rounded-full font-bold text-xs transition"><i class="ph-bold ph-trash"></i> Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="liveEmpty" class="hidden p-8 text-center text-slate-400 text-sm">Tidak ada data yang cocok pada halaman ini.</div>
    @if($daftar->isEmpty())
        <div class="p-8 text-center text-slate-400 text-sm">Belum ada data informasi.</div>
    @endif
    <div class="p-4">{{ $daftar->links() }}</div>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Kelola Wilayah')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
    <div>
        <h2 class="text-4xl font-display font-extrabold text-ink">Kelola Wilayah</h2>
        <p class="text-ink/60 text-sm mt-1">Data karakteristik dan profil wilayah administratif DKI Jakarta.</p>
    </div>
    <a href="{{ route('admin.wilayah.create') }}" class="btn btn-red"><i class="ph-bold ph-plus"></i> Tambah Wilayah</a>
</div>

<div class="card !p-0 overflow-hidden">
    <div class="p-4 border-b border-slate-100">
        <input type="text" data-live-search placeholder="Cari wilayah..." class="input max-w-sm">
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-400 uppercase text-xs tracking-wider">
                    <th class="py-4 px-6">#</th>
                    <th class="py-4 px-6">Nama Wilayah</th>
                    <th class="py-4 px-6">Tipe</th>
                    <th class="py-4 px-6">Karakteristik</th>
                    <th class="py-4 px-6 text-center">Informasi</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($wilayahs as $i => $item)
                    <tr data-live-item data-live-text="{{ Str::lower($item->nama_wilayah . ' ' . $item->tipe . ' ' . $item->karakteristik) }}" class="hover:bg-slate-50">
                        <td class="py-4 px-6 font-bold text-slate-500">{{ $i + 1 }}</td>
                        <td class="py-4 px-6 font-bold">{{ $item->nama_wilayah }}</td>
                        <td class="py-4 px-6"><span class="bg-red-50 text-red-700 font-bold px-3 py-1 rounded-full text-xs border border-red-100">{{ $item->tipe }}</span></td>
                        <td class="py-4 px-6 text-slate-600 max-w-xs truncate">{{ $item->karakteristik }}</td>
                        <td class="py-4 px-6 text-center font-bold">{{ $item->informasis_count }}</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.wilayah.edit', $item) }}" class="bg-amber-100 hover:bg-amber-200 text-amber-800 px-3 py-1.5 rounded-full font-bold text-xs transition"><i class="ph-bold ph-pencil-simple"></i> Edit</a>
                                <form action="{{ route('admin.wilayah.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus wilayah ini?')">
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
    <div id="liveEmpty" class="hidden p-8 text-center text-slate-400 text-sm">Tidak ada wilayah yang cocok.</div>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <p class="text-xs font-extrabold tracking-widest uppercase text-merah">Ringkasan</p>
        <h1 class="font-display font-extrabold text-4xl mt-1">Halo, {{ Str::before(Auth::user()->name, ' ') }}</h1>
        <p class="text-ink/60 text-sm mt-1">Berikut kondisi data PesonaJakarta saat ini.</p>
    </div>
    <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary"><i class="ph-bold ph-plus"></i> Tambah informasi</a>
</div>

<div class="grid lg:grid-cols-2 gap-6">
    <div class="card">
        <h2 class="font-display font-extrabold text-xl">Informasi per wilayah</h2>
        <p class="text-xs text-ink/50 mt-0.5 mb-5">Diurutkan dari yang terbanyak.</p>
        @php $maks = max(1, (int) $perWilayah->max('informasis_count')); @endphp
        <ul class="space-y-4">
            @foreach($perWilayah as $w)
                <li>
                    <div class="flex items-center justify-between text-sm font-bold">
                        <span>{{ $w->nama_wilayah }}</span><span class="text-ink/60">{{ $w->informasis_count }}</span>
                    </div>
                    <div class="h-2 rounded-full bg-paper mt-1.5 overflow-hidden">
                        <div class="h-full rounded-full bg-merah" style="width: {{ round($w->informasis_count / $maks * 100) }}%"></div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="card">
        <h2 class="font-display font-extrabold text-xl mb-4">Informasi terbaru</h2>
        <ul class="divide-y divide-ink/10">
            @forelse($terbaru as $item)
                <li class="py-3 flex items-center gap-3">
                    <span class="w-10 h-10 shrink-0 rounded-xl bg-merah-soft text-merah grid place-items-center"><i class="ph-bold {{ $item->kategori->ikon }}"></i></span>
                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-sm truncate">{{ $item->judul }}</p>
                        <p class="text-xs text-ink/50">{{ $item->kategori->nama_kategori }} &middot; {{ $item->wilayah->nama_wilayah }}</p>
                    </div>
                    <a href="{{ route('admin.informasi.edit', $item) }}" class="w-8 h-8 grid place-items-center rounded-full hover:bg-paper" aria-label="Edit"><i class="ph-bold ph-pencil-simple"></i></a>
                </li>
            @empty
                <li class="py-3 text-sm text-ink/50">Belum ada data.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
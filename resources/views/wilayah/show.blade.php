@extends('layouts.app')

@section('title', $wilayah->nama_wilayah)
@section('meta_description', $wilayah->karakteristik . ' — Temukan destinasi wisata, kuliner, dan budaya di ' . $wilayah->nama_wilayah . '. ' . Str::limit($wilayah->deskripsi, 100))

@section('content')
<section class="max-w-7xl mx-auto px-4 pt-8">
    <nav class="text-sm text-ink/55 flex items-center gap-2" aria-label="Breadcrumb">
        <a href="{{ route('home') }}" class="hover:text-merah">Beranda</a><i class="ph-bold ph-caret-right text-xs"></i>
        <a href="{{ route('wilayah.index') }}" class="hover:text-merah">Wilayah</a><i class="ph-bold ph-caret-right text-xs"></i>
        <span class="font-bold text-ink">{{ $wilayah->nama_wilayah }}</span>
    </nav>

    <div class="grid lg:grid-cols-2 gap-8 items-center mt-6">
        <div class="reveal">
            <span class="inline-block bg-merah-soft text-merah text-xs font-extrabold px-3 py-1 rounded-full">{{ $wilayah->tipe }}</span>
            <h1 class="font-display font-extrabold text-5xl md:text-6xl leading-tight mt-4">{{ $wilayah->nama_wilayah }}</h1>
            <p class="text-lg font-bold text-merah mt-2">{{ $wilayah->karakteristik }}</p>
            <p class="text-ink/70 leading-relaxed mt-3">{{ $wilayah->deskripsi }}</p>

            <div class="grid grid-cols-2 gap-3 mt-5 max-w-md">
                <div class="bg-white border border-ink/10 rounded-2xl p-4">
                    <p class="text-xs font-extrabold uppercase tracking-wider text-ink/50"><i class="ph-bold ph-map-trifold text-merah mr-1"></i>Luas</p>
                    <p class="font-extrabold mt-1">{{ $wilayah->luas_wilayah ?? '-' }}</p>
                </div>
                <div class="bg-white border border-ink/10 rounded-2xl p-4">
                    <p class="text-xs font-extrabold uppercase tracking-wider text-ink/50"><i class="ph-bold ph-users-three text-merah mr-1"></i>Penduduk</p>
                    <p class="font-extrabold mt-1">{{ $wilayah->jumlah_penduduk ?? '-' }}</p>
                </div>
            </div>

            @if(count($unggulan) > 0)
                <p class="text-xs font-extrabold uppercase tracking-wider text-ink/50 mt-6 mb-2">Destinasi unggulan</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($unggulan as $nama)
                        <a href="{{ route('informasi.index', ['q' => $nama]) }}" class="chip"><i class="ph-fill ph-star text-emas"></i>{{ $nama }}</a>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="relative aspect-[4/3] lg:aspect-square rounded-[2rem] overflow-hidden tanpa-gambar reveal" style="--d: 120ms">
            <div class="absolute inset-0 grid place-items-center text-white/30 text-8xl"><i class="ph ph-buildings"></i></div>
            @if($wilayah->gambar)
                <img src="{{ asset($wilayah->gambar) }}" alt="{{ $wilayah->nama_wilayah }}" class="img-fade absolute inset-0 w-full h-full object-cover" onerror="this.remove()">
            @endif
            <div class="absolute bottom-3 right-3 rounded-md bg-black/65 px-2 py-1 text-white">
                @include('partials.kredit-foto-wilayah', ['w' => $wilayah])
            </div>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 mt-12">
    <div class="reveal">
        <p class="text-xs font-extrabold tracking-widest uppercase text-merah">Jelajahi</p>
        <h2 class="font-display font-extrabold text-3xl mt-2">Informasi di {{ $wilayah->nama_wilayah }}</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
        @forelse($daftar as $item)
            @include('partials.kartu-informasi', ['item' => $item, 'd' => ($loop->index % 3) * 90])
        @empty
            <p class="text-ink/60">Belum ada informasi untuk wilayah ini.</p>
        @endforelse
    </div>
</section>
@endsection
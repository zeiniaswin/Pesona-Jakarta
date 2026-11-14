@extends('layouts.app')

@section('title', $informasi->judul)
@section('meta_description', Str::limit(strip_tags($informasi->deskripsi), 155))

@section('content')
<section class="max-w-7xl mx-auto px-4 pt-8">
    <nav class="text-sm text-ink/55 flex items-center gap-2 flex-wrap" aria-label="Breadcrumb">
        <a href="{{ route('home') }}" class="hover:text-merah">Beranda</a><i class="ph-bold ph-caret-right text-xs"></i>
        <a href="{{ route('informasi.index') }}" class="hover:text-merah">Wisata & Kuliner</a><i class="ph-bold ph-caret-right text-xs"></i>
        <span class="font-bold text-ink">{{ $informasi->judul }}</span>
    </nav>

    <div class="grid lg:grid-cols-3 gap-8 mt-6">
        {{-- Konten utama --}}
        <article class="lg:col-span-2 reveal">
            <div class="relative aspect-[16/9] rounded-[2rem] overflow-hidden tanpa-gambar">
                <div class="absolute inset-0 grid place-items-center text-white/30 text-8xl"><i class="ph {{ $informasi->kategori->ikon }}"></i></div>
                @if($informasi->gambar)
                    <img src="{{ Str::startsWith($informasi->gambar, ['http://', 'https://']) ? $informasi->gambar : asset($informasi->gambar) }}" alt="{{ $informasi->judul }}" class="img-fade absolute inset-0 w-full h-full object-cover" onerror="this.remove()">
                @endif
                @if($kreditFoto = (config('photo_credits.wilayah') + config('photo_credits.informasi'))[$informasi->gambar] ?? null)
                    <span class="absolute bottom-3 right-3 rounded-md bg-black/65 px-2 py-1 text-[10px] font-medium text-white">
                        <a href="{{ $kreditFoto['source'] }}" target="_blank" rel="noopener noreferrer" class="hover:underline">
                            Foto: {{ $kreditFoto['author'] }}
                        </a>
                        <span aria-hidden="true">&middot;</span>
                        <a href="{{ $kreditFoto['license_url'] }}" target="_blank" rel="license noopener noreferrer" class="hover:underline">
                            {{ $kreditFoto['license'] }}
                        </a>
                    </span>
                @endif
            </div>

            <div class="flex flex-wrap gap-2 mt-4">
                <span class="inline-flex items-center gap-1.5 bg-merah-soft text-merah text-xs font-extrabold px-3 py-1 rounded-full"><i class="ph-bold {{ $informasi->kategori->ikon }}"></i>{{ $informasi->kategori->nama_kategori }}</span>
                <a href="{{ route('wilayah.show', $informasi->wilayah) }}" class="chip !py-1 !text-xs"><i class="ph-bold ph-map-pin"></i>{{ $informasi->wilayah->nama_wilayah }}</a>
            </div>

            <h1 class="font-display font-extrabold text-4xl md:text-5xl leading-tight mt-3">{{ $informasi->judul }}</h1>
            <p class="text-lg text-ink/75 leading-relaxed mt-3">{{ $informasi->deskripsi }}</p>
        </article>

        {{-- Info ringkas --}}
        <aside class="lg:sticky lg:top-24 self-start reveal" style="--d: 120ms">
            <div class="bg-white border border-ink/10 rounded-3xl p-6 shadow-xl shadow-ink/5">
                <h2 class="font-display font-extrabold text-xl">Info ringkas</h2>
                <dl class="mt-4 space-y-3 text-sm">
                    <div class="flex gap-3">
                        <span class="w-9 h-9 shrink-0 rounded-xl bg-merah-soft text-merah grid place-items-center"><i class="ph-bold ph-map-pin"></i></span>
                        <div><dt class="text-xs font-extrabold uppercase tracking-wider text-ink/50">Alamat</dt><dd class="font-bold mt-0.5">{{ $informasi->alamat }}</dd></div>
                    </div>
                    <div class="flex gap-3">
                        <span class="w-9 h-9 shrink-0 rounded-xl bg-merah-soft text-merah grid place-items-center"><i class="ph-bold ph-clock"></i></span>
                        <div><dt class="text-xs font-extrabold uppercase tracking-wider text-ink/50">Jam operasional</dt><dd class="font-bold mt-0.5">{{ $informasi->jam_operasional ?? 'Belum tersedia' }}</dd></div>
                    </div>
                    <div class="flex gap-3">
                        <span class="w-9 h-9 shrink-0 rounded-xl bg-merah-soft text-merah grid place-items-center"><i class="ph-bold ph-ticket"></i></span>
                        <div><dt class="text-xs font-extrabold uppercase tracking-wider text-ink/50">Harga tiket</dt><dd class="font-bold mt-0.5">{{ $informasi->harga_tiket ?? 'Belum tersedia' }}</dd></div>
                    </div>
                </dl>

                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($informasi->judul . ' ' . $informasi->alamat) }}" target="_blank" rel="noopener" class="btn btn-primary w-full mt-4">
                    <i class="ph-bold ph-navigation-arrow"></i> Buka di Google Maps
                </a>
                <button type="button" data-copy class="btn btn-ghost w-full mt-2">
                    <i class="ph-bold ph-link"></i> <span data-copy-label>Salin tautan</span>
                </button>
            </div>
        </aside>
    </div>
</section>

@if($terkait->isNotEmpty())
    <section class="max-w-7xl mx-auto px-4 mt-12">
        <div class="reveal">
            <p class="text-xs font-extrabold tracking-widest uppercase text-merah">Lihat juga</p>
            <h2 class="font-display font-extrabold text-3xl mt-2">Lainnya di {{ $informasi->wilayah->nama_wilayah }}</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
            @foreach($terkait as $item)
                @include('partials.kartu-informasi', ['item' => $item, 'd' => $loop->index * 90])
            @endforeach
        </div>
    </section>
@endif
@endsection

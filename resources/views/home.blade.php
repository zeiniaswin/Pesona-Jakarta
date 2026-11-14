@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Jelajahi wisata, budaya, dan kuliner Jakarta dari enam wilayah — Pusat, Utara, Selatan, Timur, Barat, dan Kepulauan Seribu. Temukan semua di PesonaJakarta.')

@section('content')

{{-- ===== Hero ===== --}}
<section class="beranda-hero relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-12">
        <div class="max-w-4xl mx-auto text-center reveal">
                <span class="inline-flex items-center gap-2 rounded-full border border-merah/10 bg-white/80 px-3.5 py-2 text-xs font-extrabold tracking-wide text-merah shadow-sm">
                    <i class="ph-fill ph-map-pin"></i> PANDUAN WISATA JAKARTA
                </span>
                <h1 class="font-display font-extrabold text-4xl sm:text-5xl xl:text-6xl leading-[1.08] tracking-tight text-ink mt-4 max-w-4xl mx-auto">
                    Jelajahi Jakarta, <span class="hero-accent">dari pusat kota hingga pulau.</span>
                </h1>
                <p class="text-base md:text-lg text-ink-muted mt-3 max-w-2xl mx-auto leading-relaxed">
                    Temukan tempat bersejarah, destinasi keluarga, dan kuliner khas di enam wilayah DKI Jakarta — semuanya dalam satu tempat.
                </p>

                <form action="{{ route('informasi.index') }}" method="GET"
                      class="beranda-search mt-5 bg-white rounded-2xl p-2 pl-4 flex items-center gap-3 border border-ink/10 max-w-xl mx-auto">
                    <i class="ph-bold ph-magnifying-glass text-xl text-ink-muted"></i>
                    <input type="text" name="q" placeholder="Cari Monas, Kota Tua, kuliner..."
                           class="min-w-0 flex-1 bg-transparent py-2 text-sm focus:outline-none placeholder-ink-muted/60 text-ink"
                           aria-label="Kata kunci">
                    <button class="btn btn-primary !rounded-xl !px-5">Cari</button>
                </form>

                <div class="mt-3 flex flex-wrap items-center justify-center gap-2 text-xs">
                    <span class="font-semibold text-ink-muted">Populer:</span>
                    @foreach(['Monas', 'Kota Tua', 'Ancol', 'Pulau Tidung'] as $kata)
                        <a href="{{ route('informasi.index', ['q' => $kata]) }}"
                           class="chip !py-1 !text-xs">{{ $kata }}</a>
                    @endforeach
                </div>

                <a href="{{ route('wilayah.index') }}" class="inline-flex items-center gap-2 mt-4 text-sm font-extrabold text-ink hover:text-merah transition">
                    Jelajahi enam wilayah <i class="ph-bold ph-arrow-right"></i>
                </a>
        </div>
    </div>
</section>

{{-- ===== Wilayah ===== --}}
<section id="wilayah" class="beranda-section max-w-7xl mx-auto px-4 scroll-mt-24">
    <div class="flex items-end justify-between gap-4 reveal">
        <div>
            <p class="section-label">Temukan sekitar Jakarta</p>
            <h2 class="font-display font-extrabold text-3xl md:text-4xl mt-2 text-ink">
                Pilih wilayah yang ingin dijelajahi
            </h2>
        </div>
        <a href="{{ route('wilayah.index') }}" class="btn btn-ghost hidden sm:inline-flex">
            Semua wilayah <i class="ph-bold ph-arrow-right"></i>
        </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-5">
        @foreach($wilayahs as $w)
            @include('partials.kartu-wilayah', ['w' => $w, 'd' => ($loop->index % 3) * 80])
        @endforeach
    </div>
</section>

{{-- ===== Kategori ===== --}}
<section class="beranda-section max-w-7xl mx-auto px-4">
    <div class="reveal">
        <p class="section-label">Sesuai minatmu</p>
        <h2 class="font-display font-extrabold text-3xl md:text-4xl mt-2 text-ink">Mau cari apa hari ini?</h2>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-5">
        @foreach($kategoris as $k)
            <a href="{{ route('informasi.index', ['kategori' => $k->id]) }}"
               class="group block bg-white border border-ink/8 rounded-2xl p-6
                      hover:border-merah/30 hover:-translate-y-2 hover:shadow-xl hover:shadow-merah/8 transition reveal"
               style="--d: {{ $loop->index * 80 }}ms">
                <span class="w-12 h-12 rounded-2xl bg-merah-soft text-merah grid place-items-center text-2xl
                             group-hover:bg-merah group-hover:text-white transition">
                    <i class="ph-bold {{ $k->ikon }}"></i>
                </span>
                <h3 class="font-bold text-lg mt-3 text-ink">{{ $k->nama_kategori }}</h3>
                <p class="text-sm text-ink-muted mt-1 line-clamp-2">{{ $k->deskripsi }}</p>
                <p class="text-xs font-bold text-merah mt-3 flex items-center gap-1">
                    Jelajahi kategori <i class="ph-bold ph-arrow-right"></i>
                </p>
            </a>
        @endforeach
    </div>
</section>

{{-- ===== Terbaru ===== --}}
<section class="beranda-section max-w-7xl mx-auto px-4 pb-10">
    <div class="flex items-end justify-between gap-4 reveal">
        <div>
            <p class="section-label">Inspirasi perjalanan</p>
            <h2 class="font-display font-extrabold text-3xl md:text-4xl mt-2 text-ink">Informasi pilihan</h2>
        </div>
        <a href="{{ route('informasi.index') }}" class="btn btn-ghost hidden sm:inline-flex">
            Lihat semua <i class="ph-bold ph-arrow-right"></i>
        </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-5">
        @forelse($terbaru as $item)
            @include('partials.kartu-informasi', ['item' => $item, 'd' => ($loop->index % 3) * 80])
        @empty
            <p class="text-ink-muted">Belum ada data informasi.</p>
        @endforelse
    </div>

    <div class="mt-8 text-center sm:hidden reveal">
        <a href="{{ route('informasi.index') }}" class="btn btn-ghost">
            Lihat semua <i class="ph-bold ph-arrow-right"></i>
        </a>
    </div>
</section>

@endsection

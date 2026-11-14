@extends('layouts.app')

@section('title', 'Tentang')
@section('meta_description', 'PesonaJakarta adalah website panduan wisata, budaya, dan kuliner DKI Jakarta yang mencakup enam wilayah administratif.')

@section('content')

{{-- ===== Hero ===== --}}
<section class="max-w-7xl mx-auto px-4 pt-7 pb-5 md:pt-8">
    <nav class="text-sm text-ink/55 flex items-center gap-2 mb-4" aria-label="Breadcrumb">
        <a href="{{ route('home') }}" class="hover:text-merah">Beranda</a>
        <i class="ph-bold ph-caret-right text-xs"></i>
        <span class="font-bold text-ink">Tentang</span>
    </nav>
    <div class="max-w-3xl reveal">
        <span class="inline-flex items-center gap-2 bg-white border border-ink/10 text-xs font-extrabold px-4 py-1.5 rounded-full">
            <span class="w-2 h-2 rounded-full bg-merah"></span> Tentang Website
        </span>
        <h1 class="font-display font-extrabold text-4xl md:text-5xl leading-tight mt-3">
            Satu tempat untuk <span class="text-merah font-extrabold not-italic">jelajahi Jakarta.</span>
        </h1>
        <p class="text-base md:text-lg text-ink/70 mt-3 leading-relaxed">
            PesonaJakarta adalah website informasi pariwisata yang menghimpun data wisata, budaya, dan kuliner dari enam wilayah administratif DKI Jakarta dalam satu platform yang mudah diakses.
        </p>
    </div>
</section>

{{-- ===== Tentang Proyek ===== --}}
<section class="pola border-y border-ink/5">
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-10">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-10 items-center">
            <div class="reveal">
                <p class="text-xs font-extrabold tracking-widest uppercase text-merah">Tentang Proyek</p>
                <h2 class="font-display font-extrabold text-3xl md:text-4xl mt-2">Mengapa PesonaJakarta?</h2>
                <div class="space-y-3 mt-4 text-ink/75 leading-relaxed">
                    <p>Jakarta sebagai ibu kota Indonesia menyimpan kekayaan wisata yang luar biasa — dari monumen bersejarah, kawasan budaya Betawi, hingga wisata bahari di Kepulauan Seribu. Namun informasi tersebut sering tersebar dan sulit ditemukan dalam satu tempat.</p>
                    <p>PesonaJakarta hadir sebagai solusi: sebuah portal informasi terpusat yang memudahkan warga dan wisatawan menemukan destinasi yang tepat berdasarkan wilayah dan kategori yang mereka minati.</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3 reveal" style="--d: 120ms">
                @foreach([['ph-compass', 'Navigasi Mudah', 'Filter berdasarkan wilayah dan kategori.'], ['ph-magnifying-glass', 'Pencarian Cepat', 'Temukan informasi langsung dari search bar.'], ['ph-map-pin', 'Info Lengkap', 'Alamat, jam buka, dan harga tiket tersedia.'], ['ph-arrow-clockwise', 'Selalu Diperbarui', 'Data dikelola lewat panel admin terintegrasi.']] as [$ikon, $judul, $deskripsi])
                    <div class="bg-white/90 border border-ink/8 rounded-2xl p-4 hover:-translate-y-1 hover:shadow-lg hover:shadow-ink/8 transition">
                        <span class="w-10 h-10 rounded-xl bg-merah-soft text-merah grid place-items-center text-xl"><i class="ph-bold {{ $ikon }}"></i></span>
                        <h3 class="font-extrabold mt-3">{{ $judul }}</h3>
                        <p class="text-sm text-ink/60 mt-1 leading-relaxed">{{ $deskripsi }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

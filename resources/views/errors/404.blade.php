@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')
@section('meta_description', 'Halaman yang Anda cari tidak ditemukan. Kembali ke beranda PesonaJakarta.')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-24 flex flex-col items-center text-center">

    {{-- Ilustrasi angka 404 --}}
    <div class="relative select-none mb-8">
        <p class="font-display font-extrabold text-[10rem] md:text-[14rem] leading-none text-ink/5 tracking-tighter">404</p>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <span class="w-20 h-20 rounded-3xl bg-merah-soft text-merah grid place-items-center text-5xl shadow-xl shadow-merah/10">
                <i class="ph-bold ph-map-pin-simple-slash"></i>
            </span>
        </div>
    </div>

    <h1 class="font-display font-extrabold text-3xl md:text-4xl mt-2">
        Destinasi tidak ditemukan
    </h1>
    <p class="text-ink/60 mt-4 max-w-md text-lg">
        Halaman yang kamu cari tidak ada atau mungkin sudah dipindahkan. Yuk kembali jelajahi Jakarta dari beranda.
    </p>

    <div class="flex flex-wrap items-center justify-center gap-3 mt-10">
        <a href="{{ route('home') }}" class="btn btn-primary">
            <i class="ph-bold ph-house"></i> Kembali ke Beranda
        </a>
        <a href="{{ route('informasi.index') }}" class="btn btn-ghost">
            <i class="ph-bold ph-compass"></i> Jelajahi Wisata & Kuliner
        </a>
    </div>

    {{-- Saran pencarian cepat --}}
    <div class="mt-12">
        <p class="text-xs font-extrabold tracking-widest uppercase text-ink/40 mb-4">Atau coba cari langsung</p>
        <form action="{{ route('informasi.index') }}" method="GET" class="bg-white rounded-full p-2 pl-5 flex items-center gap-3 shadow-xl shadow-ink/10 border border-ink/10 max-w-md mx-auto">
            <i class="ph-bold ph-magnifying-glass text-xl text-ink/40"></i>
            <input type="text" name="q" placeholder="Monas, Kota Tua, kuliner..." class="flex-1 bg-transparent py-2 text-sm focus:outline-none placeholder-ink/40" aria-label="Kata kunci">
            <button class="btn btn-primary !py-2 !px-4">Cari</button>
        </form>
    </div>

</section>
@endsection

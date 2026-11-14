@extends('layouts.app')

@section('title', 'Terjadi Kesalahan')
@section('meta_description', 'Terjadi kesalahan pada server. Silakan coba lagi beberapa saat.')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-24 flex flex-col items-center text-center">

    <div class="relative select-none mb-8">
        <p class="font-display font-extrabold text-[10rem] md:text-[14rem] leading-none text-ink/5 tracking-tighter">500</p>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <span class="w-20 h-20 rounded-3xl bg-emas-soft text-emas grid place-items-center text-5xl shadow-xl shadow-emas/10">
                <i class="ph-bold ph-warning-circle"></i>
            </span>
        </div>
    </div>

    <h1 class="font-display font-extrabold text-3xl md:text-4xl mt-2">
        Ada gangguan sementara
    </h1>
    <p class="text-ink/60 mt-4 max-w-md text-lg">
        Server sedang mengalami masalah. Coba muat ulang halaman atau kembali beberapa saat lagi.
    </p>

    <div class="flex flex-wrap items-center justify-center gap-3 mt-10">
        <a href="{{ route('home') }}" class="btn btn-primary">
            <i class="ph-bold ph-house"></i> Kembali ke Beranda
        </a>
        <button onclick="window.location.reload()" class="btn btn-ghost">
            <i class="ph-bold ph-arrow-clockwise"></i> Muat Ulang
        </button>
    </div>

</section>
@endsection

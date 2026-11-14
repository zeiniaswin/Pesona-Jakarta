@extends('layouts.app')

@section('title', 'Akses Ditolak')
@section('meta_description', 'Anda tidak memiliki izin untuk mengakses halaman ini.')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-24 flex flex-col items-center text-center">

    <div class="relative select-none mb-8">
        <p class="font-display font-extrabold text-[10rem] md:text-[14rem] leading-none text-ink/5 tracking-tighter">403</p>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <span class="w-20 h-20 rounded-3xl bg-merah-soft text-merah grid place-items-center text-5xl shadow-xl shadow-merah/10">
                <i class="ph-bold ph-lock-simple"></i>
            </span>
        </div>
    </div>

    <h1 class="font-display font-extrabold text-3xl md:text-4xl mt-2">
        Akses ditolak
    </h1>
    <p class="text-ink/60 mt-4 max-w-md text-lg">
        Kamu tidak memiliki izin untuk membuka halaman ini. Silakan login dengan akun yang sesuai.
    </p>

    <div class="flex flex-wrap items-center justify-center gap-3 mt-10">
        <a href="{{ route('home') }}" class="btn btn-primary">
            <i class="ph-bold ph-house"></i> Kembali ke Beranda
        </a>
        <a href="{{ route('login') }}" class="btn btn-ghost">
            <i class="ph-bold ph-sign-in"></i> Login Admin
        </a>
    </div>

</section>
@endsection

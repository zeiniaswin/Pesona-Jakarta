@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<section class="max-w-5xl mx-auto px-4 pt-12">
    <div class="grid md:grid-cols-2 bg-white border border-ink/10 rounded-[2rem] overflow-hidden shadow-2xl shadow-ink/10 reveal">
        {{-- Panel kiri --}}
        <div class="hidden md:flex flex-col justify-between bg-ink text-white p-10 pola-gelap">
            <span class="w-11 h-11 rounded-xl bg-gradient-to-br from-merah to-merah-dark grid place-items-center text-white shadow-lg shadow-merah/25">
                <i class="ph-fill ph-buildings text-xl" aria-hidden="true"></i>
            </span>
            <div>
                <h2 class="font-display font-extrabold text-4xl leading-tight">Kelola pesona <span class="text-emas font-extrabold not-italic">ibu kota.</span></h2>
                <p class="text-white/65 mt-4 text-sm">Tambah, ubah, dan rapikan data wilayah, kategori, serta informasi wisata dan kuliner.</p>
            </div>
            <p class="text-xs text-white/40">Khusus pengelola PesonaJakarta</p>
        </div>

        {{-- Form --}}
        <div class="p-8 md:p-12">
            <h1 class="font-display font-extrabold text-3xl">Masuk</h1>
            <p class="text-sm text-ink/60 mt-1">Gunakan akun admin untuk membuka panel.</p>

            @if(session('error'))
                <div class="mt-5 bg-merah-soft border border-merah/20 text-merah-dark text-sm font-bold rounded-2xl px-4 py-3"><i class="ph-bold ph-warning mr-1"></i>{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login.proses') }}" class="mt-6 space-y-5">
                @csrf
                <div>
                    <label for="email" class="label">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="input">
                    @error('email')<p class="text-xs text-merah font-bold mt-1.5">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="password" class="label">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="input pr-12">
                        <button type="button" data-toggle-password="password" class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 grid place-items-center text-ink/50 hover:text-ink" aria-label="Tampilkan password">
                            <i class="ph-bold ph-eye"></i>
                        </button>
                    </div>
                    @error('password')<p class="text-xs text-merah font-bold mt-1.5">{{ $message }}</p>@enderror
                </div>
                <button class="btn btn-primary w-full !py-3.5">Masuk ke panel <i class="ph-bold ph-arrow-right"></i></button>
            </form>
        </div>
    </div>
</section>
@endsection

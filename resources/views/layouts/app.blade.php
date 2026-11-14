<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F8F4EC">
    <meta name="description" content="@yield('meta_description', 'Temukan wisata, budaya, dan kuliner terbaik di enam wilayah DKI Jakarta. PesonaJakarta adalah panduan lengkap menjelajahi Jakarta.')">
    <meta property="og:title" content="@yield('title', 'PesonaJakarta') - Wisata & Kuliner DKI Jakarta">
    <meta property="og:description" content="@yield('meta_description', 'Temukan wisata, budaya, dan kuliner terbaik di enam wilayah DKI Jakarta.')">
    <meta property="og:type" content="website">
    <title>@yield('title', 'PesonaJakarta') - Wisata & Kuliner DKI Jakarta</title>
    @include('partials.assets')
</head>
<body class="min-h-screen flex flex-col">

    {{-- ===== Header ===== --}}
    <header data-header class="sticky top-0 z-50 border-b border-ink/8 transition-shadow">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-merah to-merah-dark text-white grid place-items-center shadow-md shadow-merah/30">
                    <i class="ph-fill ph-buildings text-lg"></i>
                </span>
                <span class="font-display font-extrabold text-lg text-ink">Pesona<span class="text-merah">Jakarta</span></span>
            </a>

            <nav class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'aktif' : '' }}">Beranda</a>
                <a href="{{ route('wilayah.index') }}" class="nav-link {{ request()->routeIs('wilayah.*') ? 'aktif' : '' }}">Wilayah</a>
                <a href="{{ route('informasi.index') }}" class="nav-link {{ request()->routeIs('informasi.*') ? 'aktif' : '' }}">Wisata & Kuliner</a>
                <a href="{{ route('tentang') }}" class="nav-link {{ request()->routeIs('tentang') ? 'aktif' : '' }}">Tentang</a>
            </nav>

            <div class="hidden md:flex items-center gap-2">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark text-sm !py-2"><i class="ph-bold ph-squares-four"></i> Panel Admin</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-ghost text-sm !py-2"><i class="ph-bold ph-sign-in"></i> Login</a>
                @endauth
            </div>

            <button id="menuToggle" class="md:hidden w-9 h-9 grid place-items-center rounded-lg hover:bg-paper-soft" aria-label="Buka menu">
                <i class="ph-bold ph-list text-xl"></i>
            </button>
        </div>

        <div id="menuMobile" class="hidden flex-col md:hidden border-t border-ink/8 px-4 py-4 gap-1 bg-white text-sm font-semibold">
            <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg hover:bg-paper-soft">Beranda</a>
            <a href="{{ route('wilayah.index') }}" class="px-3 py-2 rounded-lg hover:bg-paper-soft">Wilayah</a>
            <a href="{{ route('informasi.index') }}" class="px-3 py-2 rounded-lg hover:bg-paper-soft">Wisata & Kuliner</a>
            <a href="{{ route('tentang') }}" class="px-3 py-2 rounded-lg hover:bg-paper-soft">Tentang</a>
            <div class="pt-2 mt-1 border-t border-ink/8">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark w-full mt-1">Panel Admin</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary w-full mt-1">Login Admin</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-1">@yield('content')</main>

    <button id="toTop" class="hidden fixed bottom-5 right-5 z-40 w-11 h-11 rounded-full bg-ink text-white shadow-xl grid place-items-center hover:bg-merah transition" aria-label="Kembali ke atas">
        <i class="ph-bold ph-arrow-up"></i>
    </button>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
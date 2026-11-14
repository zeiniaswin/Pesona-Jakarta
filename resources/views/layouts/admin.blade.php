<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Panel admin PesonaJakarta - kelola data wisata, budaya, dan kuliner DKI Jakarta.">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Dashboard') - Panel Admin PesonaJakarta</title>
    @include('partials.assets')
</head>
<body>
    {{-- Bilah atas (layar kecil) --}}
    <header class="lg:hidden flex items-center justify-between px-4 h-14 bg-ink text-white sticky top-0 z-50">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 font-display font-extrabold text-lg">
            <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-merah to-merah-dark grid place-items-center text-white">
                <i class="ph-fill ph-buildings"></i>
            </span>
            <span>Pesona<span class="text-merah">Jakarta</span></span>
        </a>
        <button id="sidebarToggle" class="w-10 h-10 grid place-items-center rounded-xl hover:bg-white/10" aria-label="Menu"><i class="ph-bold ph-list text-2xl"></i></button>
    </header>

    <div class="lg:flex min-h-screen">
        {{-- Sidebar --}}
        <aside id="sidebar" class="hidden lg:flex flex-col w-full lg:w-64 shrink-0 bg-ink text-white p-5 lg:sticky lg:top-0 lg:h-screen">
            <a href="{{ route('admin.dashboard') }}" class="hidden lg:flex items-center gap-2.5 px-2 py-2">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-merah to-merah-dark grid place-items-center text-white">
                    <i class="ph-fill ph-buildings text-lg"></i>
                </span>
                <span class="font-display font-extrabold text-lg leading-none">Pesona<span class="text-merah">Jakarta</span><span class="block text-[10px] font-sans font-bold tracking-widest uppercase text-white/45 mt-1">Panel Admin</span></span>
            </a>

            <nav class="mt-6 space-y-1.5">
                @foreach([['admin.dashboard', 'Dashboard', 'ph-squares-four'], ['admin.wilayah.index', 'Wilayah', 'ph-map-trifold'], ['admin.kategori.index', 'Kategori', 'ph-stack'], ['admin.informasi.index', 'Informasi', 'ph-info']] as [$rute, $teks, $ikon])
                    @php $aktif = $rute === 'admin.dashboard' ? request()->routeIs('admin.dashboard') : request()->routeIs(Str::beforeLast($rute, '.') . '.*'); @endphp
                    <a href="{{ route($rute) }}" class="sidebar-link {{ $aktif ? 'aktif' : '' }}"><i class="ph-bold {{ $ikon }} text-lg"></i>{{ $teks }}</a>
                @endforeach
            </nav>

            <div class="mt-auto pt-6 space-y-1.5 border-t border-white/10">
                <p class="px-4 text-xs text-white/45 truncate">{{ Auth::user()->name }}</p>
                <a href="{{ route('home') }}" target="_blank" class="sidebar-link"><i class="ph-bold ph-arrow-square-out text-lg"></i>Lihat website</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="sidebar-link w-full text-left"><i class="ph-bold ph-sign-out text-lg"></i>Logout</button>
                </form>
            </div>
        </aside>

        {{-- Konten --}}
        <div class="flex-1 min-w-0">
            <main class="p-5 md:p-10 max-w-6xl">
                @if($errors->any())
                    <div class="bg-merah-soft border border-merah/20 text-merah-dark text-sm rounded-2xl px-5 py-4 mb-6">
                        <p class="font-extrabold mb-1"><i class="ph-bold ph-warning mr-1"></i>Periksa kembali isian Anda:</p>
                        <ul class="list-disc ml-5 font-semibold">
                            @foreach($errors->all() as $pesan)<li>{{ $pesan }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    {{-- Notifikasi (tutup otomatis) --}}
    <div class="fixed top-4 right-4 z-[100] space-y-2 w-[min(22rem,calc(100vw-2rem))]">
        @if(session('success'))
            <div data-toast class="toast cursor-pointer bg-ink text-white rounded-2xl px-5 py-4 text-sm font-bold shadow-2xl flex items-start gap-3">
                <i class="ph-fill ph-check-circle text-emerald-400 text-xl"></i><span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div data-toast class="toast cursor-pointer bg-merah text-white rounded-2xl px-5 py-4 text-sm font-bold shadow-2xl flex items-start gap-3">
                <i class="ph-fill ph-warning-circle text-xl"></i><span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

@extends('layouts.app')

@section('title', 'Wisata & Kuliner')
@section('meta_description', 'Katalog lengkap wisata, budaya, dan kuliner DKI Jakarta. Filter berdasarkan wilayah dan kategori untuk menemukan destinasi yang tepat.')

@section('content')
<section class="beranda-hero">
    <div class="max-w-7xl mx-auto px-4 pt-7 pb-7 md:pt-8 md:pb-8">
        <div class="max-w-3xl reveal">
            <p class="section-label">Jelajahi pilihanmu</p>
            <h1 class="font-display font-extrabold text-4xl md:text-5xl leading-tight mt-2">Wisata & Kuliner</h1>
            <p class="text-ink-muted mt-2 max-w-2xl leading-relaxed">Temukan tempat menarik di Jakarta. Cari langsung atau gunakan filter wilayah dan kategori untuk menemukan destinasi yang sesuai.</p>
        </div>
    </div>
</section>

{{-- ===== Bilah filter (menempel di bawah header) ===== --}}
<div class="sticky top-16 z-40 px-4 -mt-4">
    <div class="max-w-7xl mx-auto rounded-2xl border border-ink/10 bg-white/95 shadow-lg shadow-ink/5 backdrop-blur-md">
        <div class="p-3 md:p-4 space-y-2">
            <form action="{{ route('informasi.index') }}" method="GET" class="flex flex-col md:flex-row gap-3">
                @if(request('kategori'))<input type="hidden" name="kategori" value="{{ request('kategori') }}">@endif

                <div class="relative flex-1">
                    <i class="ph-bold ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-ink/40 text-lg"></i>
                    <input type="text" name="q" value="{{ request('q') }}" data-live-search placeholder="Cari nama, alamat, atau deskripsi..." aria-label="Cari"
                           class="w-full bg-white border border-ink/15 rounded-full pl-11 pr-5 py-3 text-sm focus:outline-none focus:border-merah focus:ring-4 focus:ring-merah/10">
                </div>

                <select name="wilayah" data-autosubmit aria-label="Wilayah" class="bg-white border border-ink/15 rounded-full px-5 py-3 text-sm font-bold focus:outline-none focus:border-merah">
                    <option value="">Semua wilayah</option>
                    @foreach($wilayahs as $w)
                        <option value="{{ $w->id }}" @selected((string) request('wilayah') === (string) $w->id)>{{ $w->nama_wilayah }}</option>
                    @endforeach
                </select>

                <button class="btn btn-primary"><i class="ph-bold ph-magnifying-glass"></i> Cari</button>
            </form>

            {{-- Chip kategori (tautan, mempertahankan kata kunci & wilayah) --}}
            <div class="flex gap-2 overflow-x-auto pb-1">
                <a href="{{ route('informasi.index', request()->except(['page', 'kategori'])) }}" class="chip {{ request('kategori') ? '' : 'is-active' }}">Semua</a>
                @foreach($kategoris as $k)
                    <a href="{{ route('informasi.index', array_merge(request()->except('page'), ['kategori' => $k->id])) }}"
                       class="chip {{ (string) request('kategori') === (string) $k->id ? 'is-active' : '' }}">
                        <i class="ph-bold {{ $k->ikon }}"></i>{{ $k->nama_kategori }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    </div>

<section class="max-w-7xl mx-auto px-4 mt-6">
    <div class="flex items-center justify-between gap-3">
        <p class="text-sm text-ink/60">Menampilkan <span id="liveCount" class="font-extrabold text-ink">{{ $daftar->count() }}</span> dari {{ $daftar->total() }} hasil</p>
        @if(request()->hasAny(['q', 'kategori', 'wilayah']))
            <a href="{{ route('informasi.index') }}" class="text-sm font-extrabold text-merah hover:underline"><i class="ph-bold ph-x-circle mr-1"></i>Hapus filter</a>
        @endif
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @foreach($daftar as $item)
            @include('partials.kartu-informasi', ['item' => $item, 'd' => ($loop->index % 3) * 70])
        @endforeach
    </div>

    @if($daftar->isEmpty())
        <div class="bg-white border border-ink/10 rounded-3xl p-12 text-center mt-6">
            <i class="ph ph-magnifying-glass text-5xl text-ink/30"></i>
            <p class="font-extrabold mt-3">Data tidak ditemukan</p>
            <p class="text-sm text-ink/60 mt-1">Coba ubah kata kunci atau hapus filter.</p>
        </div>
    @endif
    <div id="liveEmpty" class="hidden bg-white border border-ink/10 rounded-3xl p-12 text-center mt-6">
        <i class="ph ph-funnel text-5xl text-ink/30"></i>
        <p class="font-extrabold mt-3">Tidak ada yang cocok pada halaman ini</p>
        <p class="text-sm text-ink/60 mt-1">Tekan Cari untuk mencari di seluruh data.</p>
    </div>

    <div class="mt-8 flex justify-center">{{ $daftar->links() }}</div>
</section>
@endsection
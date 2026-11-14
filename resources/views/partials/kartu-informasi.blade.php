{{-- Kartu satu informasi. Variabel: $item (model Informasi), $d (jeda animasi ms, opsional) --}}
<article data-live-item
   data-live-text="{{ Str::lower($item->judul . ' ' . $item->deskripsi . ' ' . $item->alamat . ' ' . $item->wilayah->nama_wilayah . ' ' . $item->kategori->nama_kategori) }}"
   class="kartu kartu-glow group flex flex-col reveal" style="--d: {{ $d ?? 0 }}ms">

    <div class="gambar relative aspect-[16/10] tanpa-gambar overflow-hidden bg-paper-soft">
        <div class="absolute inset-0 grid place-items-center text-white/20 text-6xl tanpa-gambar">
            <i class="ph {{ $item->kategori->ikon }}"></i>
        </div>
        <a href="{{ route('informasi.show', $item) }}" class="absolute inset-0 block" aria-label="Lihat {{ $item->judul }}">
            @if($item->gambar)
                <img src="{{ Str::startsWith($item->gambar, ['http://', 'https://']) ? $item->gambar : asset($item->gambar) }}" alt="{{ $item->judul }}" loading="lazy"
                     class="img-fade absolute inset-0 w-full h-full object-cover" onerror="this.remove()">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
            <span class="absolute top-3 left-3 badge badge-merah bg-white/95 backdrop-blur-sm">
                <i class="ph-bold {{ $item->kategori->ikon }}"></i>{{ $item->kategori->nama_kategori }}
            </span>
        </a>
        @if($kreditFoto = (config('photo_credits.wilayah') + config('photo_credits.informasi'))[$item->gambar] ?? null)
            <span class="absolute bottom-2 right-2 z-10 rounded-md bg-black/65 px-2 py-1 text-[10px] font-medium text-white">
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

    <a href="{{ route('informasi.show', $item) }}" class="p-4 flex-1 flex flex-col">
        <h3 data-live-title class="font-bold text-base leading-snug text-ink line-clamp-2">{{ $item->judul }}</h3>
        <p class="text-sm text-ink-muted mt-1.5 line-clamp-2 leading-relaxed">{{ $item->deskripsi }}</p>

        @if($item->harga_tiket)
            <p class="text-xs font-semibold text-biru mt-2 flex items-center gap-1">
                <i class="ph-bold ph-ticket"></i> {{ Str::limit($item->harga_tiket, 35) }}
            </p>
        @endif

        <div class="mt-auto pt-3 flex items-center justify-between border-t border-ink/6 mt-3">
            <span class="text-xs font-semibold text-ink-muted flex items-center gap-1">
                <i class="ph-bold ph-map-pin text-merah"></i>{{ $item->wilayah->nama_wilayah }}
            </span>
            <span class="panah w-8 h-8 rounded-full bg-paper-soft grid place-items-center text-sm">
                <i class="ph-bold ph-arrow-right"></i>
            </span>
        </div>
    </a>
</article>

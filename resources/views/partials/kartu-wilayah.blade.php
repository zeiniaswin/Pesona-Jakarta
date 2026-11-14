<article class="kartu kartu-glow group reveal" style="--d: {{ $d ?? 0 }}ms">
    <div class="gambar relative aspect-[4/3] tanpa-gambar overflow-hidden bg-paper-soft">
        <a href="{{ route('wilayah.show', $w) }}" class="absolute inset-0 block" aria-label="Jelajahi {{ $w->nama_wilayah }}">
            <div class="absolute inset-0 grid place-items-center text-white/20 text-6xl">
                <i class="ph ph-buildings"></i>
            </div>
            @if($w->gambar)
                <img src="{{ asset($w->gambar) }}" alt="{{ $w->nama_wilayah }}" loading="lazy"
                     class="img-fade absolute inset-0 w-full h-full object-cover" onerror="this.remove()">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
            <span class="absolute top-3 left-3 font-display font-extrabold text-4xl text-white/80 drop-shadow-sm">
                {{ sprintf('%02d', $loop->iteration) }}
            </span>
            <span class="absolute top-3 right-3 badge badge-merah opacity-0 group-hover:opacity-100 transition">
                {{ $w->tipe }}
            </span>
        </a>
        <div class="absolute bottom-2 right-2 z-10 rounded-md bg-black/65 px-2 py-1 text-white">
            @include('partials.kredit-foto-wilayah', ['w' => $w])
        </div>
    </div>
    <a href="{{ route('wilayah.show', $w) }}" class="block p-4">
        <h2 class="font-display font-extrabold text-xl text-ink">{{ $w->nama_wilayah }}</h2>
        <p class="text-sm text-ink-muted mt-1 line-clamp-2">{{ $w->karakteristik }}</p>
        <div class="flex items-center justify-between mt-3 pt-3 border-t border-ink/6">
            <span class="text-xs font-semibold text-ink-muted">Jelajahi wilayah</span>
            <span class="panah w-8 h-8 rounded-full bg-paper-soft grid place-items-center text-sm">
                <i class="ph-bold ph-arrow-right"></i>
            </span>
        </div>
    </a>
</article>

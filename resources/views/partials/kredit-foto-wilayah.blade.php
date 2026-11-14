@php($kreditFoto = config('photo_credits.wilayah')[$w->gambar] ?? null)
@if($kreditFoto)
    <span class="inline-flex items-center gap-1 text-[10px] font-medium">
        <a href="{{ $kreditFoto['source'] }}" target="_blank" rel="noopener noreferrer"
           class="hover:underline">Foto: {{ $kreditFoto['author'] }}</a>
        <span aria-hidden="true">&middot;</span>
        <a href="{{ $kreditFoto['license_url'] }}" target="_blank" rel="license noopener noreferrer"
           class="hover:underline">{{ $kreditFoto['license'] }}</a>
    </span>
@endif

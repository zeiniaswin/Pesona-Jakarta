{{--
  Komponen satu kolom form (dipakai ulang di semua form admin).
  Variabel: $name, $label, $value (opsional), $type (text|textarea|select|url, default text),
            $options (untuk select: [id => teks]), $wajib (bool), $bantuan (teks bantuan)
--}}
@php
    $type  = $type ?? 'text';
    $nilai = old($name, $value ?? '');
@endphp
<div>
    <label for="{{ $name }}" class="label">{{ $label }}@if(!empty($wajib)) <span class="text-red-500">*</span>@endif</label>

    @if($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="4" class="input">{{ $nilai }}</textarea>
    @elseif($type === 'select')
        <select id="{{ $name }}" name="{{ $name }}" class="input">
            <option value="">-- Pilih --</option>
            @foreach($options as $nilaiOpsi => $teksOpsi)
                <option value="{{ $nilaiOpsi }}" @selected((string) $nilai === (string) $nilaiOpsi)>{{ $teksOpsi }}</option>
            @endforeach
        </select>
    @elseif($type === 'url')
        <input id="{{ $name }}" type="url" name="{{ $name }}" value="{{ $nilai }}" class="input" data-preview-url>
        {{-- Preview gambar muncul otomatis saat URL diisi --}}
        <div data-preview-box class="{{ $nilai ? '' : 'hidden' }} mt-3 relative aspect-video max-w-sm rounded-2xl overflow-hidden border border-ink/10 bg-slate-50">
            <img data-preview-img src="{{ $nilai ?: '' }}" alt="Preview gambar" class="w-full h-full object-cover">
            <span class="absolute bottom-2 left-2 bg-black/60 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Preview</span>
        </div>
    @else
        <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ $nilai }}" class="input">
    @endif
    @if(!empty($bantuan))<p class="text-xs text-slate-400 mt-1">{{ $bantuan }}</p>@endif
    @error($name)<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
</div>

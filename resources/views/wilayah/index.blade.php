@extends('layouts.app')

@section('title', 'Wilayah Jakarta')
@section('meta_description', 'Jelajahi enam wilayah DKI Jakarta dan temukan informasi wisata, budaya, dan kuliner di setiap wilayah.')

@section('content')
<section class="beranda-hero">
    <div class="max-w-7xl mx-auto px-4 pt-7 pb-7 md:pt-8 md:pb-8">
        <div class="max-w-3xl reveal">
            <p class="section-label">Enam wilayah, banyak cerita</p>
            <h1 class="font-display font-extrabold text-4xl md:text-5xl text-ink mt-2">Jelajahi Wilayah Jakarta</h1>
            <p class="text-ink-muted mt-2 leading-relaxed">
                Pilih wilayah untuk melihat destinasi wisata, budaya, dan kuliner yang ada di dalamnya.
            </p>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 pt-5 pb-8">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($wilayahs as $w)
            @include('partials.kartu-wilayah', ['w' => $w, 'd' => ($loop->index % 3) * 80])
        @endforeach
    </div>
</section>
@endsection

@extends('layouts.site')

@section('title', 'Gallery — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="Gallery"
        subtitle="Moments from our programmes and community work."
        icon="fa-solid fa-camera-retro"
        background-image="images/photo-hands-heart.png"
    />

    <div class="mx-auto max-w-6xl space-y-10 px-4 py-14 md:py-20">
        @if ($albums->isEmpty())
            <p class="flex items-center justify-center gap-3 text-center text-stone-600">
                <i class="fa-solid fa-image" aria-hidden="true"></i>
                Gallery albums will be added soon.
            </p>
        @else
            @foreach ($albums as $album)
                <section class="site-gallery-album reveal-on-scroll">
                    <div class="site-gallery-album-header">
                        <h2 class="font-serif text-2xl font-semibold text-trust-900">{{ $album->title }}</h2>
                        @if ($album->short_description)
                            <p class="mt-1 text-sm text-stone-700">{{ $album->short_description }}</p>
                        @endif
                        @if ($album->full_description)
                            <p class="mt-2 text-sm leading-relaxed text-stone-600">{{ $album->full_description }}</p>
                        @endif
                    </div>
                    @if ($album->images->isNotEmpty())
                        <ul class="site-gallery-grid">
                            @foreach ($album->images as $img)
                                <li class="site-gallery-tile">
                                    <button
                                        type="button"
                                        class="site-gallery-image-wrap"
                                        data-gallery-trigger
                                        data-gallery-src="{{ $img->url() }}"
                                        data-gallery-alt="{{ $album->title }} image"
                                    >
                                        <img src="{{ $img->url() }}" alt="{{ $album->title }} image" loading="lazy">
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="px-5 py-4 text-sm text-stone-500">No photos in this album yet.</p>
                    @endif
                </section>
            @endforeach

            <div class="site-gallery-lightbox" data-gallery-lightbox aria-hidden="true">
                <button type="button" class="site-gallery-lightbox__close" data-gallery-close aria-label="Close image viewer">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
                <button type="button" class="site-gallery-lightbox__nav site-gallery-lightbox__nav--prev" data-gallery-prev aria-label="Previous image">
                    <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                </button>
                <img src="" alt="" class="site-gallery-lightbox__image" data-gallery-image>
                <button type="button" class="site-gallery-lightbox__nav site-gallery-lightbox__nav--next" data-gallery-next aria-label="Next image">
                    <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
        @endif
    </div>
@endsection

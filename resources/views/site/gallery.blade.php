@extends('layouts.site')

@section('title', 'Gallery — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="Gallery"
        subtitle="Moments from our programmes and community work."
    />

    <div class="mx-auto max-w-6xl px-4 py-14 md:py-20">
        @if ($images->isEmpty())
            <p class="text-center text-stone-600">Photos will be added soon.</p>
        @else
            <ul class="columns-1 gap-6 space-y-6 sm:columns-2 lg:columns-3">
                @foreach ($images as $img)
                    <li class="break-inside-avoid overflow-hidden rounded-xl border border-warm-200 bg-white shadow-sm">
                        <img src="{{ $img->url() }}" alt="{{ $img->title ?? 'Gallery image' }}" class="w-full object-cover" loading="lazy">
                        @if ($img->title)
                            <p class="p-3 text-sm font-medium text-stone-800">{{ $img->title }}</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

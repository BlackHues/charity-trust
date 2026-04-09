@extends('layouts.admin')

@section('title', 'Gallery albums')

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl font-semibold text-trust-900">Gallery albums</h1>
            <p class="mt-1 text-sm text-stone-600">Create albums, upload multiple photos, and control album order.</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="rounded-xl bg-trust-900 px-4 py-2 text-sm font-semibold text-white hover:bg-trust-700">Add album</a>
    </div>

    @if ($albums->isEmpty())
        <p class="mt-8 text-stone-600">No albums yet.</p>
    @else
        <ul class="mt-8 space-y-4">
            @foreach ($albums as $album)
                @php($cover = $album->coverImage())
                <li class="rounded-xl border border-stone-200 bg-white p-4 shadow-sm">
                    <div class="flex flex-wrap items-start gap-4">
                        <div class="h-24 w-36 overflow-hidden rounded-lg bg-warm-200">
                            @if ($cover)
                                <img src="{{ $cover->url() }}" alt="{{ $album->title }}" class="h-full w-full object-cover">
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="font-semibold text-stone-900">{{ $album->title }}</p>
                            @if ($album->short_description)
                                <p class="mt-1 text-sm text-stone-600">{{ $album->short_description }}</p>
                            @endif
                            <p class="mt-1 text-xs text-stone-500">
                                Album sort: {{ $album->sort_order }} |
                                Photos: {{ $album->images_count }}
                            </p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.gallery.edit', $album) }}" class="rounded-lg border border-stone-300 px-3 py-1.5 text-sm hover:bg-stone-50">Edit</a>
                            <form method="POST" action="{{ route('admin.gallery.destroy', $album) }}" onsubmit="return confirm('Delete this album and all photos?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg border border-red-200 px-3 py-1.5 text-sm text-red-700 hover:bg-red-50">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4">
        <h1 class="font-serif text-2xl font-semibold text-trust-900">Gallery images</h1>
        <a href="{{ route('admin.gallery.create') }}" class="rounded-xl bg-trust-900 px-4 py-2 text-sm font-semibold text-white hover:bg-trust-700">Add image</a>
    </div>

    @if ($images->isEmpty())
        <p class="mt-8 text-stone-600">No images yet.</p>
    @else
        <ul class="mt-8 space-y-4">
            @foreach ($images as $img)
                <li class="flex flex-wrap items-center gap-4 rounded-xl border border-stone-200 bg-white p-4 shadow-sm">
                    <img src="{{ $img->url() }}" alt="" class="h-20 w-28 rounded-lg object-cover">
                    <div class="min-w-0 flex-1">
                        <p class="font-medium text-stone-900">{{ $img->title ?: '(no title)' }}</p>
                        <p class="text-sm text-stone-500">Sort: {{ $img->sort_order }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.gallery.edit', $img) }}" class="rounded-lg border border-stone-300 px-3 py-1.5 text-sm hover:bg-stone-50">Edit</a>
                        <form method="POST" action="{{ route('admin.gallery.destroy', $img) }}" onsubmit="return confirm('Delete this image?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-lg border border-red-200 px-3 py-1.5 text-sm text-red-700 hover:bg-red-50">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

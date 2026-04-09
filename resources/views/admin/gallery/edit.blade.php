@extends('layouts.admin')

@section('title', 'Edit gallery album')

@section('content')
    <h1 class="font-serif text-2xl font-semibold text-trust-900">Edit gallery album</h1>

    <form method="POST" action="{{ route('admin.gallery.update', $album) }}" enctype="multipart/form-data" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid gap-4 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-stone-700">Album title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $album->title) }}" required
                       class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
            </div>
            <div class="md:col-span-2">
                <label for="short_description" class="block text-sm font-medium text-stone-700">Short description (optional)</label>
                <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $album->short_description) }}"
                       class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
            </div>
            <div class="md:col-span-2">
                <label for="full_description" class="block text-sm font-medium text-stone-700">Full description (optional)</label>
                <textarea name="full_description" id="full_description" rows="4"
                          class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">{{ old('full_description', $album->full_description) }}</textarea>
            </div>
            <div>
                <label for="sort_order" class="block text-sm font-medium text-stone-700">Album sort order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $album->sort_order) }}" min="0"
                       class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
            </div>
            <div>
                <label for="images" class="block text-sm font-medium text-stone-700">Add more photos</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple
                       class="mt-1 w-full text-sm text-stone-600">
            </div>
        </div>

        <div>
            <h2 class="text-base font-semibold text-stone-900">Album photos</h2>
            @if ($album->images->isEmpty())
                <p class="mt-2 text-sm text-stone-500">No photos in this album yet.</p>
            @else
                <ul class="mt-3 space-y-3">
                    @foreach ($album->images as $image)
                        <li class="rounded-lg border border-stone-200 bg-white p-3">
                            <div class="flex flex-wrap items-center gap-4">
                                <img src="{{ $image->url() }}" alt="" class="h-20 w-28 rounded object-cover">
                                <div>
                                    <label for="sort_{{ $image->id }}" class="block text-xs font-medium text-stone-600">Photo sort order</label>
                                    <input type="number"
                                           id="sort_{{ $image->id }}"
                                           name="image_sort_order[{{ $image->id }}]"
                                           min="0"
                                           value="{{ old('image_sort_order.'.$image->id, $image->sort_order) }}"
                                           class="mt-1 w-28 rounded border border-stone-300 px-2 py-1 text-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
                                </div>
                                <label class="inline-flex items-center gap-2 text-sm text-red-700">
                                    <input type="checkbox" name="delete_image_ids[]" value="{{ $image->id }}" class="rounded border-stone-300">
                                    Remove this photo
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded-xl bg-trust-900 px-4 py-2 text-sm font-semibold text-white hover:bg-trust-700">Update album</button>
            <a href="{{ route('admin.gallery.index') }}" class="rounded-xl border border-stone-300 px-4 py-2 text-sm hover:bg-stone-50">Back</a>
        </div>
    </form>
@endsection

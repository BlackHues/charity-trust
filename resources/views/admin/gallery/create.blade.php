@extends('layouts.admin')

@section('title', 'Add gallery album')

@section('content')
    <h1 class="font-serif text-2xl font-semibold text-trust-900">Add gallery album</h1>

    <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="mt-8 space-y-6">
        @csrf
        <div class="grid gap-4 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-stone-700">Album title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
            </div>
            <div class="md:col-span-2">
                <label for="short_description" class="block text-sm font-medium text-stone-700">Short description (optional)</label>
                <input type="text" name="short_description" id="short_description" value="{{ old('short_description') }}"
                       class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
            </div>
            <div class="md:col-span-2">
                <label for="full_description" class="block text-sm font-medium text-stone-700">Full description (optional)</label>
                <textarea name="full_description" id="full_description" rows="4"
                          class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">{{ old('full_description') }}</textarea>
            </div>
            <div>
                <label for="sort_order" class="block text-sm font-medium text-stone-700">Album sort order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                       class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
            </div>
            <div>
                <label for="images" class="block text-sm font-medium text-stone-700">Upload photos (multiple)</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple required
                       class="mt-1 w-full text-sm text-stone-600">
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="rounded-xl bg-trust-900 px-4 py-2 text-sm font-semibold text-white hover:bg-trust-700">Create album</button>
            <a href="{{ route('admin.gallery.index') }}" class="rounded-xl border border-stone-300 px-4 py-2 text-sm hover:bg-stone-50">Cancel</a>
        </div>
    </form>
@endsection

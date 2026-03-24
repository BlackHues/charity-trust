@extends('layouts.admin')

@section('title', 'Edit gallery image')

@section('content')
    <h1 class="font-serif text-2xl font-semibold text-trust-900">Edit gallery image</h1>
    <form method="POST" action="{{ route('admin.gallery.update', $image) }}" enctype="multipart/form-data" class="mt-8 max-w-lg space-y-4">
        @csrf
        @method('PUT')
        <div class="rounded-lg border border-stone-200 p-2">
            <img src="{{ $image->url() }}" alt="" class="max-h-48 rounded object-contain">
        </div>
        <div>
            <label for="title" class="block text-sm font-medium text-stone-700">Title (optional)</label>
            <input type="text" name="title" id="title" value="{{ old('title', $image->title) }}"
                   class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-stone-700">Replace image (optional)</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="mt-1 w-full text-sm text-stone-600">
        </div>
        <div>
            <label for="sort_order" class="block text-sm font-medium text-stone-700">Sort order</label>
            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $image->sort_order) }}" min="0"
                   class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
        </div>
        <div class="flex gap-3">
            <button type="submit" class="rounded-xl bg-trust-900 px-4 py-2 text-sm font-semibold text-white hover:bg-trust-700">Update</button>
            <a href="{{ route('admin.gallery.index') }}" class="rounded-xl border border-stone-300 px-4 py-2 text-sm hover:bg-stone-50">Cancel</a>
        </div>
    </form>
@endsection

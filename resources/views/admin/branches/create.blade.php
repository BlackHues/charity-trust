@extends('layouts.admin')

@section('title', 'Add branch')

@section('content')
    <h1 class="font-serif text-2xl font-semibold text-trust-900">Add branch</h1>
    <form method="POST" action="{{ route('admin.branches.store') }}" class="mt-8 max-w-xl space-y-4">
        @csrf
        <div>
            <label for="label" class="block text-sm font-medium text-stone-700">Label</label>
            <input type="text" name="label" id="label" value="{{ old('label') }}" required
                   class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
        </div>
        <div>
            <label for="address_lines" class="block text-sm font-medium text-stone-700">Address (one line per row)</label>
            <textarea name="address_lines" id="address_lines" rows="5" required
                      class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">{{ old('address_lines') }}</textarea>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_main" id="is_main" value="1" {{ old('is_main') ? 'checked' : '' }}
                   class="h-4 w-4 rounded border-stone-300 text-trust-600 focus:ring-trust-500">
            <label for="is_main" class="text-sm font-medium text-stone-700">Use as main address in footer</label>
        </div>
        <div>
            <label for="sort_order" class="block text-sm font-medium text-stone-700">Sort order</label>
            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                   class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
        </div>
        <div class="flex gap-3">
            <button type="submit" class="rounded-xl bg-trust-900 px-4 py-2 text-sm font-semibold text-white hover:bg-trust-700">Save</button>
            <a href="{{ route('admin.branches.index') }}" class="rounded-xl border border-stone-300 px-4 py-2 text-sm hover:bg-stone-50">Cancel</a>
        </div>
    </form>
@endsection


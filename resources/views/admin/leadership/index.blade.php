@extends('layouts.admin')

@section('title', 'Leadership')

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4">
        <h1 class="font-serif text-2xl font-semibold text-trust-900">Leadership team</h1>
        <a href="{{ route('admin.leadership.create') }}" class="rounded-xl bg-trust-900 px-4 py-2 text-sm font-semibold text-white hover:bg-trust-700">Add member</a>
    </div>

    @if ($members->isEmpty())
        <p class="mt-8 text-stone-600">No members yet.</p>
    @else
        <ul class="mt-8 space-y-4">
            @foreach ($members as $member)
                <li class="flex flex-wrap items-center gap-4 rounded-xl border border-stone-200 bg-white p-4 shadow-sm">
                    <div class="h-20 w-20 shrink-0 overflow-hidden rounded-lg bg-warm-200">
                        @if ($member->imageUrl())
                            <img src="{{ $member->imageUrl() }}" alt="" class="h-full w-full object-cover">
                        @endif
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="font-medium text-stone-900">{{ $member->name }}</p>
                        @if ($member->qualifications)
                            <p class="text-sm text-stone-600">{{ $member->qualifications }}</p>
                        @endif
                        <p class="text-sm text-trust-800">{{ $member->designation }}</p>
                        <p class="text-xs text-stone-500">Sort: {{ $member->sort_order }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.leadership.edit', $member) }}" class="rounded-lg border border-stone-300 px-3 py-1.5 text-sm hover:bg-stone-50">Edit</a>
                        <form method="POST" action="{{ route('admin.leadership.destroy', $member) }}" onsubmit="return confirm('Delete this member?');">
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

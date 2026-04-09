@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="font-serif text-2xl font-semibold text-trust-900">Dashboard</h1>
    <p class="mt-2 text-stone-600">Manage gallery albums/photos, branches, and leadership team details.</p>

    <div class="mt-10 grid gap-6 sm:grid-cols-3">
        <a href="{{ route('admin.gallery.index') }}" class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm transition hover:border-trust-500/30">
            <h2 class="font-semibold text-trust-900">Gallery</h2>
            <p class="mt-2 text-3xl font-bold text-stone-800">{{ $galleryAlbumCount }}</p>
            <p class="mt-1 text-sm text-stone-600">albums</p>
            <p class="text-xs text-stone-500">{{ $galleryPhotoCount }} photos total</p>
        </a>
        <a href="{{ route('admin.leadership.index') }}" class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm transition hover:border-trust-500/30">
            <h2 class="font-semibold text-trust-900">Leadership</h2>
            <p class="mt-2 text-3xl font-bold text-stone-800">{{ $leadershipCount }}</p>
            <p class="mt-1 text-sm text-stone-600">members</p>
        </a>
        <a href="{{ route('admin.branches.index') }}" class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm transition hover:border-trust-500/30">
            <h2 class="font-semibold text-trust-900">Branches</h2>
            <p class="mt-2 text-3xl font-bold text-stone-800">{{ $branchCount }}</p>
            <p class="mt-1 text-sm text-stone-600">locations</p>
        </a>
    </div>
@endsection

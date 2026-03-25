<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">
</head>
<body class="min-h-screen bg-stone-100 text-stone-800 antialiased">
    @auth
        <header class="border-b border-stone-200 bg-white">
            <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-between gap-4 px-4 py-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 font-semibold text-trust-900">
                    <img src="{{ asset('images/logo.png') }}" width="140" height="60" class="h-10 w-auto object-contain" alt="">
                    <span>Admin</span>
                </a>
                <nav class="flex flex-wrap items-center gap-4 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="text-stone-600 hover:text-trust-900">Dashboard</a>
                    <a href="{{ route('admin.gallery.index') }}" class="text-stone-600 hover:text-trust-900">Gallery</a>
                    <a href="{{ route('admin.leadership.index') }}" class="text-stone-600 hover:text-trust-900">Leadership</a>
                    <a href="{{ route('home') }}" class="text-stone-600 hover:text-trust-900" target="_blank" rel="noopener">View site</a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-stone-600 hover:text-red-700">Log out</button>
                    </form>
                </nav>
            </div>
        </header>
    @endauth

    <main class="mx-auto max-w-5xl px-4 py-8">
        @if (session('status'))
            <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-900">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>

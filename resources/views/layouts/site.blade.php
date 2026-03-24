<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mahavidhya Charitable Trust — education, healthcare, and social welfare for underprivileged communities in Tamil Nadu.">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|fraunces:500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-warm-100 text-stone-800 antialiased">
    @php
        $isHome = request()->routeIs('home');
    @endphp
    <header id="site-header" class="site-header sticky top-0 z-50 border-b border-warm-200/80 bg-warm-100/95 backdrop-blur-sm @if ($isHome) site-header--home @endif">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 md:flex-nowrap">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-trust-700 focus-visible:ring-offset-2">
                <img src="{{ asset('images/logo.png') }}"
                     width="260"
                     height="114"
                     class="site-header-logo"
                     alt="Maha Vidhya Charitable Trust — goddess Saraswati on a lotus flanked by elephants, Est. 2017">
                <span class="sr-only">{{ config('app.name') }}</span>
            </a>
            <input type="checkbox" id="nav-toggle" class="peer sr-only" aria-hidden="true">
            <label for="nav-toggle" class="inline-flex cursor-pointer items-center justify-center rounded-lg border border-trust-700/20 px-3 py-2 text-sm font-medium text-trust-900 md:hidden">
                Menu
            </label>
            <nav class="hidden w-full basis-full flex-col gap-1 peer-checked:flex md:flex md:w-auto md:basis-auto md:flex-row md:items-center md:gap-1 md:peer-checked:flex">
                @php
                    $links = [
                        ['route' => 'home', 'label' => 'Home'],
                        ['route' => 'about', 'label' => 'About'],
                        ['route' => 'services', 'label' => 'Services'],
                        ['route' => 'join-us', 'label' => 'Join Us'],
                        ['route' => 'leadership', 'label' => 'Leadership Team'],
                        ['route' => 'gallery', 'label' => 'Gallery'],
                        ['route' => 'donate', 'label' => 'Donate'],
                        ['route' => 'contact', 'label' => 'Reach Us'],
                    ];
                @endphp
                @foreach ($links as $link)
                    <a href="{{ route($link['route']) }}"
                       class="rounded-lg px-3 py-2 text-sm font-medium transition hover:bg-trust-900/5 {{ request()->routeIs($link['route']) ? 'bg-trust-900/10 text-trust-900' : 'text-stone-700' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-16 border-t border-warm-200 bg-trust-900 text-stone-200">
        <div class="mx-auto max-w-6xl space-y-6 px-4 py-12">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logo.png') }}" width="120" height="52" class="h-12 w-auto max-w-[120px] object-contain drop-shadow-md" alt="" role="presentation">
                    <p class="font-serif text-lg font-semibold text-white">{{ config('app.name') }}</p>
                </div>
                <div class="flex flex-wrap gap-4 text-sm">
                    <a href="tel:+91{{ config('site.whatsapp') }}" class="underline decoration-trust-500 underline-offset-4 hover:text-white">Call {{ config('site.whatsapp') }}</a>
                    <a href="https://wa.me/91{{ config('site.whatsapp') }}" class="underline decoration-trust-500 underline-offset-4 hover:text-white" rel="noopener noreferrer" target="_blank">WhatsApp</a>
                    <a href="{{ config('site.map_url') }}" class="underline decoration-trust-500 underline-offset-4 hover:text-white" rel="noopener noreferrer" target="_blank">Map</a>
                </div>
            </div>
            <p class="text-sm text-stone-400">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

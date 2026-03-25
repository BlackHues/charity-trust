<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Maha Vidhya Charitable Trust — education, healthcare, and social welfare for underprivileged communities in Tamil Nadu.">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|fraunces:500,600,700|montserrat:500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-warm-100 text-stone-800 antialiased">
    <header id="site-header" class="site-header sticky top-0 z-50 border-b border-warm-200/80 bg-warm-100/95 backdrop-blur-sm">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-x-6 gap-y-3 px-4 py-0 md:flex-nowrap md:gap-x-8">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-trust-700 focus-visible:ring-offset-2">
                <img src="{{ asset('images/logo.png') }}"
                     width="300"
                     height="132"
                     class="site-header-logo"
                     alt="Maha Vidhya Charitable Trust — goddess Saraswati on a lotus flanked by elephants, Est. 2017">
                <span class="sr-only">{{ config('app.name') }}</span>
            </a>
            <input type="checkbox" id="nav-toggle" class="peer sr-only" aria-hidden="true">
            <label for="nav-toggle" class="site-nav-font inline-flex cursor-pointer items-center justify-center rounded-lg border border-trust-700/20 bg-white/60 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-trust-900 shadow-sm transition hover:border-trust-700/35 hover:bg-white md:hidden">
                Menu
            </label>
            <nav class="hidden w-full basis-full flex-col gap-1 pt-3 peer-checked:flex md:flex md:w-auto md:basis-auto md:flex-row md:items-center md:gap-1 md:pt-0 md:peer-checked:flex" aria-label="Main">
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
                       class="site-nav-link {{ request()->routeIs($link['route']) ? 'site-nav-link--active text-trust-900' : 'text-stone-600 hover:text-trust-900' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>
    </header>

    <main class="site-main">
        @yield('content')
    </main>

    <footer class="mt-16 border-t border-warm-200 bg-trust-900 text-stone-200">
        @php
            $mainAddress = config('site.addresses')[0] ?? null;
        @endphp
        <div class="mx-auto max-w-6xl space-y-6 px-4 py-12">
            <div class="flex flex-col gap-6 md:flex-row md:items-start md:justify-between md:gap-8">
                <div class="w-full max-w-md space-y-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/logo.png') }}" width="120" height="52" class="h-12 w-auto max-w-[120px] object-contain drop-shadow-md" alt="" role="presentation">
                        <p class="font-serif text-lg font-semibold text-white">{{ config('app.name') }}</p>
                    </div>
                    @if ($mainAddress)
                        <div class="flex gap-3 text-sm">
                            <i class="fa-solid fa-location-dot mt-0.5 shrink-0 text-trust-500" aria-hidden="true"></i>
                            <div>
                                <p class="font-semibold text-white">{{ $mainAddress['label'] }}</p>
                                <p class="mt-1 leading-relaxed text-stone-400">
                                    <span class="font-medium text-stone-200">{{ config('app.name') }}</span><br>
                                    @foreach ($mainAddress['lines'] as $line)
                                        {{ $line }}@if (! $loop->last)<br>@endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    @endif
                    <div class="site-footer-map overflow-hidden rounded-lg border border-trust-600/35 bg-stone-900/40 shadow-inner" aria-label="Main branch — Gudiyatham on Google Maps">
                        <div class="relative h-44 w-full sm:h-48">
                            <iframe
                                src="{{ config('site.map_embed_url') }}"
                                class="absolute inset-0 h-full w-full border-0"
                                width="448"
                                height="336"
                                allowfullscreen=""
                                allow="fullscreen"
                                loading="eager"
                                referrerpolicy="strict-origin-when-cross-origin"
                                title="Google Map — 44 Melpatti Road, Gudiyatham"
                            ></iframe>
                        </div>
                        <p class="border-t border-trust-600/25 px-2 py-1.5 text-center text-[0.65rem] text-stone-400">
                            <a href="{{ config('site.map_url') }}" class="text-trust-400 underline decoration-trust-500/60 underline-offset-2 hover:text-white" rel="noopener noreferrer" target="_blank">Open map in Google Maps</a>
                        </p>
                    </div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-2 md:pt-1" aria-label="Call and messaging">
                    <a
                        href="tel:+91{{ preg_replace('/\D/', '', config('site.whatsapp')) }}"
                        class="site-contact-fab site-contact-fab--phone"
                        title="Call {{ config('site.whatsapp') }}"
                    >
                        <span class="sr-only">Call {{ config('site.whatsapp') }}</span>
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                    </a>
                    <a
                        href="https://wa.me/91{{ preg_replace('/\D/', '', config('site.whatsapp')) }}"
                        class="site-contact-fab site-contact-fab--whatsapp"
                        rel="noopener noreferrer"
                        target="_blank"
                        title="WhatsApp {{ config('site.whatsapp') }}"
                    >
                        <span class="sr-only">WhatsApp {{ config('site.whatsapp') }}</span>
                        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                    </a>
                    <a
                        href="{{ route('contact') }}"
                        class="site-contact-fab"
                        title="Reach us"
                    >
                        <span class="sr-only">Reach us</span>
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <p class="text-sm text-stone-400">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>

    @if (request()->routeIs('home'))
        @php
            $waDigits = preg_replace('/\D/', '', config('site.whatsapp'));
        @endphp
        <div class="site-contact-fabs" role="region" aria-label="Quick call and WhatsApp">
            <a
                href="tel:+91{{ $waDigits }}"
                class="site-contact-fab site-contact-fab--phone"
                title="Call {{ config('site.whatsapp') }}"
            >
                <span class="sr-only">Call {{ config('site.whatsapp') }}</span>
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
            </a>
            <a
                href="https://wa.me/91{{ $waDigits }}"
                class="site-contact-fab site-contact-fab--whatsapp"
                rel="noopener noreferrer"
                target="_blank"
                title="WhatsApp {{ config('site.whatsapp') }}"
            >
                <span class="sr-only">Open WhatsApp chat with {{ config('site.whatsapp') }}</span>
                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
            </a>
        </div>
    @endif
</body>
</html>

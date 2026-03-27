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
    @php
        $mainNavLinks = [
            ['route' => 'home', 'label' => 'Home'],
            ['route' => 'about', 'label' => 'About'],
            ['route' => 'services', 'label' => 'Services'],
            ['route' => 'join-us', 'label' => 'Join us'],
            ['route' => 'leadership', 'label' => 'Leadership Team'],
            ['route' => 'gallery', 'label' => 'Gallery'],
            ['route' => 'donate', 'label' => 'Donate'],
            ['route' => 'contact', 'label' => 'Contact'],
        ];
    @endphp
    <header id="site-header" class="site-header sticky top-0 z-50 border-b border-warm-200/80 bg-warm-100/95 backdrop-blur-sm">
        <div class="relative z-[100] mx-auto flex max-w-6xl items-center justify-between gap-x-4 px-4 py-0 md:gap-x-8">
            <a href="{{ route('home') }}" class="flex min-w-0 shrink-0 items-center rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-trust-700 focus-visible:ring-offset-2">
                <img src="{{ asset('images/logo.png') }}"
                     width="300"
                     height="132"
                     class="site-header-logo"
                     alt="Maha Vidhya Charitable Trust — goddess Saraswati on a lotus flanked by elephants, Est. 2017">
                <span class="sr-only">{{ config('app.name') }}</span>
            </a>
            <nav class="site-nav-desktop hidden min-w-0 flex-1 items-center justify-end gap-1 2xl:flex" aria-label="Main">
                @foreach ($mainNavLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       class="site-nav-link {{ request()->routeIs($link['route']) ? 'site-nav-link--active text-trust-900' : 'text-stone-600 hover:text-trust-900' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>
            <button
                type="button"
                class="site-nav-burger 2xl:hidden"
                data-site-nav-toggle
                aria-expanded="false"
                aria-controls="site-nav-drawer"
                aria-label="Open menu"
            >
                <span class="site-nav-burger-box" aria-hidden="true">
                    <span class="site-nav-burger-line"></span>
                    <span class="site-nav-burger-line"></span>
                    <span class="site-nav-burger-line"></span>
                </span>
            </button>
        </div>
        <div class="site-nav-backdrop" data-site-nav-backdrop aria-hidden="true"></div>
        <aside
            id="site-nav-drawer"
            class="site-nav-drawer"
            aria-label="Main"
            aria-hidden="true"
            data-site-nav-drawer
        >
            <div class="site-nav-drawer-inner">
                <div class="site-nav-drawer-head">
                    <span class="site-nav-drawer-title">Menu</span>
                    <button
                        type="button"
                        class="site-nav-drawer-close"
                        data-site-nav-close
                        aria-label="Close menu"
                    >
                        <i class="fa-solid fa-xmark text-lg" aria-hidden="true"></i>
                    </button>
                </div>
                <nav class="site-nav-drawer-nav" aria-label="Main">
                    @foreach ($mainNavLinks as $link)
                        <a
                            href="{{ route($link['route']) }}"
                            class="site-nav-drawer-link {{ request()->routeIs($link['route']) ? 'site-nav-drawer-link--active' : '' }}"
                            data-site-nav-drawer-link
                        >
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>
    </header>

    <main class="site-main">
        @yield('content')
    </main>

    <footer class="mt-16 border-t border-warm-200 bg-trust-900 text-stone-200">
        @php
            $mainAddress = config('site.addresses')[0] ?? null;
            $waDigits = preg_replace('/\D/', '', config('site.whatsapp'));
            $secDigits = preg_replace('/\D/', '', (string) config('site.phone_secondary'));
            $footerSocial = collect(config('site.social', []))
                ->filter(fn ($url) => is_string($url) && $url !== '')
                ->all();
            $socialIcons = [
                'facebook' => ['icon' => 'fa-brands fa-facebook-f', 'label' => 'Facebook'],
                'instagram' => ['icon' => 'fa-brands fa-instagram', 'label' => 'Instagram'],
                'youtube' => ['icon' => 'fa-brands fa-youtube', 'label' => 'YouTube'],
                'x' => ['icon' => 'fa-brands fa-x-twitter', 'label' => 'X'],
                'linkedin' => ['icon' => 'fa-brands fa-linkedin-in', 'label' => 'LinkedIn'],
            ];
        @endphp
        <div class="mx-auto max-w-6xl px-4 py-12">
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-12 lg:gap-10">
                <div class="space-y-4 sm:col-span-2 lg:col-span-5">
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
                                loading="lazy"
                                referrerpolicy="strict-origin-when-cross-origin"
                                title="Google Map — 44 Melpatti Road, Gudiyatham"
                            ></iframe>
                        </div>
                        <p class="border-t border-trust-600/25 px-2 py-1.5 text-center text-[0.65rem] text-stone-400">
                            <a href="{{ config('site.map_url') }}" class="text-trust-400 underline decoration-trust-500/60 underline-offset-2 hover:text-white" rel="noopener noreferrer" target="_blank">Open map in Google Maps</a>
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <h2 class="site-footer-heading">Quick links</h2>
                    <ul class="mt-4 space-y-2.5 text-sm">
                        @foreach ($mainNavLinks as $item)
                            <li>
                                <a href="{{ route($item['route']) }}" class="text-stone-400 transition hover:text-white {{ request()->routeIs($item['route']) ? 'font-medium text-trust-400' : '' }}">
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col gap-8 sm:col-span-2 lg:col-span-4">
                    <div>
                        <h2 class="site-footer-heading">Connect</h2>
                        <ul class="mt-4 space-y-3 text-sm" aria-label="Phone and messaging">
                            <li>
                                <a href="tel:+91{{ $waDigits }}" class="group inline-flex w-full max-w-xs items-start gap-3 rounded-lg text-left text-stone-300 transition hover:text-white">
                                    <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-trust-600/40 bg-trust-800/50 text-trust-400 transition group-hover:border-trust-500/55 group-hover:bg-trust-800">
                                        <i class="fa-solid fa-phone text-sm" aria-hidden="true"></i>
                                    </span>
                                    <span class="min-w-0 pt-0.5">
                                        <span class="block text-[0.65rem] font-semibold uppercase tracking-wider text-trust-500/90">Call</span>
                                        <span class="text-stone-200">+91 {{ config('site.whatsapp') }}</span>
                                    </span>
                                </a>
                            </li>
                            @if ($secDigits !== '')
                                <li>
                                    <a href="tel:+91{{ $secDigits }}" class="group inline-flex w-full max-w-xs items-start gap-3 rounded-lg text-left text-stone-300 transition hover:text-white">
                                        <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-trust-600/40 bg-trust-800/50 text-trust-400 transition group-hover:border-trust-500/55 group-hover:bg-trust-800">
                                            <i class="fa-solid fa-headset text-sm" aria-hidden="true"></i>
                                        </span>
                                        <span class="min-w-0 pt-0.5">
                                            <span class="block text-[0.65rem] font-semibold uppercase tracking-wider text-trust-500/90">Additional line</span>
                                            <span class="text-stone-200">+91 {{ config('site.phone_secondary') }}</span>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="https://wa.me/91{{ $waDigits }}" class="group inline-flex w-full max-w-xs items-start gap-3 rounded-lg text-left text-stone-300 transition hover:text-white" rel="noopener noreferrer" target="_blank">
                                    <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-trust-600/40 bg-trust-800/50 text-trust-400 transition group-hover:border-trust-500/55 group-hover:bg-trust-800">
                                        <i class="fa-brands fa-whatsapp text-base" aria-hidden="true"></i>
                                    </span>
                                    <span class="min-w-0 pt-0.5">
                                        <span class="block text-[0.65rem] font-semibold uppercase tracking-wider text-trust-500/90">WhatsApp</span>
                                        <span class="text-stone-200">+91 {{ config('site.whatsapp') }}</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" class="group inline-flex w-full max-w-xs items-start gap-3 rounded-lg text-left text-stone-300 transition hover:text-white">
                                    <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-trust-600/40 bg-trust-800/50 text-trust-400 transition group-hover:border-trust-500/55 group-hover:bg-trust-800">
                                        <i class="fa-solid fa-envelope text-sm" aria-hidden="true"></i>
                                    </span>
                                    <span class="min-w-0 pt-0.5">
                                        <span class="block text-[0.65rem] font-semibold uppercase tracking-wider text-trust-500/90">Email &amp; locations</span>
                                        <span class="text-stone-200">Contact page</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    @if (count($footerSocial) > 0)
                        <div>
                            <h2 class="site-footer-heading">Follow us</h2>
                            <ul class="mt-4 flex flex-wrap gap-2.5" role="list">
                                @foreach ($footerSocial as $platform => $url)
                                    @php $meta = $socialIcons[$platform] ?? ['icon' => 'fa-solid fa-link', 'label' => ucfirst((string) $platform)]; @endphp
                                    <li>
                                        <a
                                            href="{{ $url }}"
                                            class="site-footer-social"
                                            rel="noopener noreferrer"
                                            target="_blank"
                                            title="{{ $meta['label'] }}"
                                        >
                                            <span class="sr-only">{{ $meta['label'] }}</span>
                                            <i class="{{ $meta['icon'] }} text-base" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-10 border-t border-trust-700/50 pt-8">
                <p class="text-sm text-stone-400">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
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

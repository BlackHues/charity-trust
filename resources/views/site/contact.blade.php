@extends('layouts.site')

@section('title', 'Reach Us — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="Reach us"
        subtitle="Locations across Tamil Nadu"
        icon="fa-solid fa-location-dot"
    />

    <div class="mx-auto max-w-3xl space-y-10 px-4 py-14 md:py-20">
        <div class="rounded-2xl border border-trust-900/10 bg-trust-900 p-8 text-white">
            <h2 class="inline-flex items-center gap-3 font-serif text-xl font-semibold">
                <i class="fa-solid fa-user-group" aria-hidden="true"></i>
                Connect
            </h2>
            <div class="mt-4 flex flex-wrap items-center gap-2" aria-label="Connect">
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
                    href="tel:+91{{ preg_replace('/\D/', '', config('site.phone_secondary')) }}"
                    class="site-contact-fab"
                    title="Additional line {{ config('site.phone_secondary') }}"
                >
                    <span class="sr-only">Call additional {{ config('site.phone_secondary') }}</span>
                    <i class="fa-solid fa-headset" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        @foreach (config('site.addresses') as $block)
            <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
                <h2 class="font-serif text-lg font-semibold text-trust-900">{{ $block['label'] }}</h2>
                <p class="mt-3 text-stone-700">
                    <span class="font-medium text-stone-900">{{ config('app.name') }}</span><br>
                    @foreach ($block['lines'] as $line)
                        {{ $line }}@if (! $loop->last)<br>@endif
                    @endforeach
                </p>
            </div>
        @endforeach
    </div>
@endsection

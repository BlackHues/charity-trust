@extends('layouts.site')

@section('title', 'Reach Us — '.config('app.name'))

@section('content')
    <x-site-inner-hero title="Reach us" subtitle="Locations across Tamil Nadu" />

    <div class="mx-auto max-w-3xl space-y-10 px-4 py-14 md:py-20">
        <div class="rounded-2xl border border-trust-900/10 bg-trust-900 p-8 text-white">
            <h2 class="font-serif text-xl font-semibold">Connect</h2>
            <ul class="mt-4 space-y-2 text-sm text-white/90">
                <li>
                    <a href="tel:+91{{ config('site.whatsapp') }}" class="underline decoration-trust-500 underline-offset-4 hover:text-white">Call / WhatsApp: {{ config('site.whatsapp') }}</a>
                </li>
                <li>
                    <a href="https://wa.me/91{{ config('site.whatsapp') }}" class="underline decoration-trust-500 underline-offset-4 hover:text-white" rel="noopener noreferrer" target="_blank">Open WhatsApp chat</a>
                </li>
                <li>Additional contact: {{ config('site.phone_secondary') }}</li>
            </ul>
            <a href="{{ config('site.map_url') }}" class="mt-6 inline-flex rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-trust-900 transition hover:bg-warm-100" rel="noopener noreferrer" target="_blank">Open map (Chennai)</a>
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

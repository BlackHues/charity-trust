@extends('layouts.site')

@section('title', 'Leadership Team — '.config('app.name'))

@section('content')
    <x-site-inner-hero title="Leadership team" subtitle="Board of trustees">
        <div class="mx-auto flex w-full max-w-lg flex-wrap justify-center gap-3 text-sm sm:gap-4">
            <a href="tel:+91{{ config('site.whatsapp') }}" class="rounded-full bg-white px-5 py-2 font-semibold text-trust-900 shadow-sm transition hover:bg-warm-100">Click to call</a>
            <a href="https://wa.me/91{{ config('site.whatsapp') }}" class="rounded-full border-2 border-white/50 bg-white/10 px-5 py-2 font-semibold text-white backdrop-blur-sm transition hover:bg-white/20" rel="noopener noreferrer" target="_blank">WhatsApp {{ config('site.whatsapp') }}</a>
        </div>
    </x-site-inner-hero>

    <div class="mx-auto max-w-6xl px-4 py-14 md:py-20">
        @if ($members->isEmpty())
            <p class="text-center text-stone-600">Leadership information will be updated soon.</p>
        @else
            <ul class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($members as $member)
                    <li class="overflow-hidden rounded-2xl border border-warm-200 bg-white shadow-sm">
                        <div class="aspect-[4/3] bg-warm-200">
                            @if ($member->imageUrl())
                                <img src="{{ $member->imageUrl() }}" alt="" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full items-center justify-center font-serif text-4xl font-semibold text-trust-700/40">
                                    {{ \Illuminate\Support\Str::substr($member->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h2 class="font-serif text-lg font-semibold text-trust-900">{{ $member->name }}</h2>
                            @if ($member->qualifications)
                                <p class="mt-1 text-sm text-stone-600">{{ $member->qualifications }}</p>
                            @endif
                            <p class="mt-2 text-sm font-medium text-trust-700">{{ $member->designation }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

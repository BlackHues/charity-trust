@props([
    'title',
    'subtitle' => null,
    'backgroundImage' => null,
    'icon' => null,
])

@php
    $backgroundImageUrl = null;
    if (filled($backgroundImage)) {
        if (str_starts_with($backgroundImage, 'http://') || str_starts_with($backgroundImage, 'https://')) {
            $backgroundImageUrl = $backgroundImage;
        } elseif (file_exists(public_path($backgroundImage))) {
            $backgroundImageUrl = asset($backgroundImage);
        }
    }
    $hasBackgroundImage = $backgroundImageUrl !== null;
@endphp

<section {{ $attributes->class([
    'relative isolate flex min-h-[20rem] flex-col items-center justify-center overflow-hidden px-4 py-10 text-white sm:min-h-[22rem] sm:py-12 md:min-h-[28rem] md:py-14 lg:min-h-[32rem] lg:py-16 xl:min-h-[34rem]',
    $hasBackgroundImage ? 'bg-trust-900' : 'bg-gradient-to-br from-trust-900 via-zinc-950 to-black',
]) }}>
    @if ($hasBackgroundImage)
        <div class="pointer-events-none absolute inset-0 z-0">
            <img
                src="{{ $backgroundImageUrl }}"
                alt=""
                class="h-full w-full object-cover object-center"
                width="1920"
                height="1080"
                decoding="async"
                fetchpriority="high"
            >
        </div>
        <div class="pointer-events-none absolute inset-0 z-[1] bg-gradient-to-br from-trust-900/90 via-trust-900/82 to-black/88"></div>
        <div class="pointer-events-none absolute inset-0 z-[1] bg-black/30"></div>
    @endif
    <div class="relative z-10 mx-auto w-full max-w-6xl px-4 text-center">
        <h1 class="font-serif text-4xl font-semibold tracking-tight md:text-5xl">
            @if (filled($icon))
                <span class="inline-flex items-center gap-3">
                    <i class="{{ $icon }} text-white/90" aria-hidden="true"></i>
                    <span>{{ $title }}</span>
                </span>
            @else
                {{ $title }}
            @endif
        </h1>
        @if (filled($subtitle))
            <p class="mx-auto mt-4 max-w-3xl text-pretty text-lg leading-relaxed text-white md:mt-5 md:text-xl">{{ $subtitle }}</p>
        @endif
        @unless ($slot->isEmpty())
            <div class="mt-8 flex w-full flex-col items-center gap-4 text-white [&_p]:text-white">
                {{ $slot }}
            </div>
        @endunless
    </div>
</section>

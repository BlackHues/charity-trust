@extends('layouts.site')

@section('title', 'Home — '.config('app.name'))

@section('content')
    <section class="relative flex min-h-[calc(100svh-4rem-4rem)] flex-col justify-center overflow-hidden bg-gradient-to-br from-trust-900 via-trust-700 to-trust-500 px-4 py-6 text-white md:min-h-[calc(100svh-4.25rem-4rem)] md:py-8">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="relative mx-auto flex w-full max-w-7xl flex-col justify-center text-center">
            <div class="mb-4 flex w-full justify-center px-2 sm:mb-5 sm:px-4">
                <img src="{{ asset('images/logo.png') }}" width="360" height="158" class="home-hero-logo shrink-0 drop-shadow-lg" alt="" role="presentation">
            </div>
            <div class="mx-auto max-w-3xl">
                <h1 class="text-balance font-serif text-3xl font-semibold leading-tight md:text-4xl lg:text-[2.5rem]">
                    Hope, education, and care for every life we touch
                </h1>
                <p class="mt-4 text-sm leading-relaxed text-white/90 md:mt-5 md:text-base">
                    Maha Vidhya Charitable Trust works to enrich the lives of underprivileged people through education, mentorship, and access to quality healthcare.
                </p>
                <div class="mt-6 flex flex-wrap items-center justify-center gap-3 md:mt-8 md:gap-4">
                    <a href="{{ route('donate') }}" class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-trust-900 shadow-lg transition hover:bg-warm-100 md:px-6 md:py-3">
                        <i class="fa-solid fa-heart" aria-hidden="true"></i>
                        <span>Support our work</span>
                    </a>
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-2 rounded-xl border-2 border-white/40 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/10 md:px-6 md:py-3">
                        <i class="fa-solid fa-book-open" aria-hidden="true"></i>
                        <span>Learn about us</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 py-16 md:py-20">
        <div class="mx-auto flex max-w-3xl flex-col items-center text-center">
            <h2 class="inline-flex items-center gap-3 font-serif text-3xl font-semibold text-trust-900 md:text-4xl">
                <i class="fa-solid fa-user-group text-trust-500" aria-hidden="true"></i>
                Who we are
            </h2>
            <p class="mt-5 max-w-2xl text-pretty leading-relaxed text-stone-700 md:mt-6">
                We stand for the right of every child to be educated, live healthy, and lead a happy life. Through programmes in villages and support for unemployed youth, we help people become self-reliant and strengthen their families and communities.
            </p>
            <a href="{{ route('about') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-trust-700 underline decoration-trust-500 underline-offset-4 hover:text-trust-900 md:mt-8">
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                Read our full story
            </a>

            <figure class="group mt-12 w-full max-w-[min(100%,14rem)] sm:max-w-[15rem] md:mt-14 md:max-w-[17rem]">
                <div
                    class="relative mx-auto aspect-[3/4] w-full overflow-hidden rounded-2xl border border-warm-200 bg-warm-100 shadow-[0_24px_60px_-16px_rgb(15_61_58_/_22%)] ring-1 ring-trust-900/[0.06]"
                >
                    <div
                        class="pointer-events-none absolute inset-0 z-0 bg-gradient-to-br from-trust-500/15 via-transparent to-trust-900/10 opacity-90 transition duration-500 group-hover:opacity-100"
                        aria-hidden="true"
                    ></div>
                    <img
                        src="{{ asset('images/home-about-care.png') }}"
                        width="800"
                        height="1067"
                        class="relative z-[1] h-full w-full object-cover object-[center_28%] transition duration-700 ease-out motion-reduce:transition-none group-hover:scale-[1.02] motion-reduce:group-hover:scale-100"
                        alt="A young child and caring adult together outdoors, reflecting protection and family support"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
                <figcaption class="mx-auto mt-5 max-w-[16rem] px-1 md:mt-6 md:max-w-xs">
                    <p class="font-serif text-lg font-semibold leading-snug text-trust-900 md:text-xl">
                        Care in every generation
                    </p>
                    <p class="mt-2 text-sm leading-relaxed text-stone-600 md:text-base">
                        Protection, trust, and hope—values we bring to every family and community we serve.
                    </p>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="border-y border-warm-200 bg-white py-16">
        <div class="mx-auto max-w-6xl px-4">
            <h2 class="text-center font-serif text-3xl font-semibold text-trust-900">
                <span class="inline-flex items-center justify-center gap-3">
                    <i class="fa-solid fa-hands-helping text-trust-500" aria-hidden="true"></i>
                    How we help
                </span>
            </h2>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['Education', 'Formal and non-formal learning, health and legal awareness, and support for competitive exams.', 'fa-solid fa-graduation-cap'],
                    ['Health', 'Patient support, nutrition, medicines, lab tests, ambulance when needed, and blood donation.', 'fa-solid fa-heart-pulse'],
                    ['Social welfare', 'Workshops, women’s skill programmes, and links to employment and cottage industries.', 'fa-solid fa-hand-holding-heart'],
                    ['Relief & environment', 'Disaster rehabilitation, shelter, essentials, tree planting, and water conservation.', 'fa-solid fa-leaf'],
                ] as $card)
                    <a href="{{ route('services') }}" class="group rounded-2xl border border-warm-200 bg-warm-100 p-6 transition hover:border-trust-500/30 hover:shadow-md">
                        <h3 class="inline-flex items-center gap-3 font-serif text-lg font-semibold text-trust-900 group-hover:text-trust-700">
                            <i class="{{ $card[2] }} text-trust-500 transition group-hover:text-trust-700" aria-hidden="true"></i>
                            {{ $card[0] }}
                        </h3>
                        <p class="mt-2 text-sm leading-relaxed text-stone-600">{{ $card[1] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 py-16 text-center">
        <h2 class="inline-flex items-center gap-3 font-serif text-3xl font-semibold text-trust-900">
            <i class="fa-solid fa-users text-trust-500" aria-hidden="true"></i>
            Get involved
        </h2>
        <p class="mx-auto mt-4 max-w-2xl text-stone-700">
            Volunteer with us, become a member, or sponsor an initiative. Every contribution helps us reach more families.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="{{ route('join-us') }}" class="inline-flex items-center gap-2 rounded-xl bg-trust-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-trust-700">
                <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
                Join us
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-xl border border-trust-900/20 px-6 py-3 text-sm font-semibold text-trust-900 transition hover:bg-trust-900/5">
                <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                Reach us
            </a>
        </div>
    </section>
@endsection

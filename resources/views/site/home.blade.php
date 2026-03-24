@extends('layouts.site')

@section('title', 'Home — '.config('app.name'))

@section('content')
    <section class="relative overflow-hidden bg-gradient-to-br from-trust-900 via-trust-700 to-trust-500 px-4 py-20 text-white md:py-28">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="relative mx-auto w-full max-w-7xl text-center">
            <div class="mb-10 flex w-full justify-center px-2 sm:px-4">
                <img src="{{ asset('images/logo.png') }}" width="960" height="427" class="home-hero-logo shrink-0 drop-shadow-lg" alt="" role="presentation">
            </div>
            <div class="mx-auto max-w-3xl">
                <h1 class="font-serif text-4xl font-semibold leading-tight md:text-5xl">
                    Hope, education, and care for every life we touch
                </h1>
                <p class="mt-6 text-lg text-white/90 md:text-xl">
                    Maha Vidhya Charitable Trust works to enrich the lives of underprivileged people through education, mentorship, and access to quality healthcare.
                </p>
                <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ route('donate') }}" class="rounded-xl bg-white px-6 py-3 text-sm font-semibold text-trust-900 shadow-lg transition hover:bg-warm-100">
                        Support our work
                    </a>
                    <a href="{{ route('about') }}" class="rounded-xl border-2 border-white/40 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        Learn about us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 py-16 md:py-20">
        <div class="grid gap-12 md:grid-cols-2 md:items-center">
            <div>
                <h2 class="font-serif text-3xl font-semibold text-trust-900 md:text-4xl">Who we are</h2>
                <p class="mt-4 leading-relaxed text-stone-700">
                    We stand for the right of every child to be educated, live healthy, and lead a happy life. Through programmes in villages and support for unemployed youth, we help people become self-reliant and strengthen their families and communities.
                </p>
                <a href="{{ route('about') }}" class="mt-6 inline-flex text-sm font-semibold text-trust-700 underline decoration-trust-500 underline-offset-4 hover:text-trust-900">
                    Read our full story →
                </a>
            </div>
            <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
                <h3 class="font-serif text-xl font-semibold text-trust-900">Mission</h3>
                <p class="mt-3 text-stone-700 leading-relaxed">
                    To ensure quality of life and maximise opportunity by providing medical care, food, education, and decent accommodation—helping people return to normal life with dignity and social respect.
                </p>
                <h3 class="mt-8 font-serif text-xl font-semibold text-trust-900">Vision</h3>
                <p class="mt-3 text-stone-700 leading-relaxed">
                    To uplift economically marginalised people by meeting essential needs and improving access to a better quality of life.
                </p>
            </div>
        </div>
    </section>

    <section class="border-y border-warm-200 bg-white py-16">
        <div class="mx-auto max-w-6xl px-4">
            <h2 class="text-center font-serif text-3xl font-semibold text-trust-900">How we help</h2>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['Education', 'Formal and non-formal learning, health and legal awareness, and support for competitive exams.'],
                    ['Health', 'Patient support, nutrition, medicines, lab tests, ambulance when needed, and blood donation.'],
                    ['Social welfare', 'Workshops, women’s skill programmes, and links to employment and cottage industries.'],
                    ['Relief & environment', 'Disaster rehabilitation, shelter, essentials, tree planting, and water conservation.'],
                ] as $card)
                    <a href="{{ route('services') }}" class="group rounded-2xl border border-warm-200 bg-warm-100 p-6 transition hover:border-trust-500/30 hover:shadow-md">
                        <h3 class="font-serif text-lg font-semibold text-trust-900 group-hover:text-trust-700">{{ $card[0] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-stone-600">{{ $card[1] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 py-16 text-center">
        <h2 class="font-serif text-3xl font-semibold text-trust-900">Get involved</h2>
        <p class="mx-auto mt-4 max-w-2xl text-stone-700">
            Volunteer with us, become a member, or sponsor an initiative. Every contribution helps us reach more families.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="{{ route('join-us') }}" class="rounded-xl bg-trust-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-trust-700">Join us</a>
            <a href="{{ route('contact') }}" class="rounded-xl border border-trust-900/20 px-6 py-3 text-sm font-semibold text-trust-900 transition hover:bg-trust-900/5">Reach us</a>
        </div>
    </section>
@endsection

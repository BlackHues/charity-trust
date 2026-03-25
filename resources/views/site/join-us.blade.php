@extends('layouts.site')

@section('title', 'Join Us — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="Join us"
        subtitle="Volunteer, become a member, or sponsor our work."
        icon="fa-solid fa-user-plus"
    />

    <div class="mx-auto grid max-w-6xl gap-8 px-4 py-14 md:grid-cols-3 md:py-20">
        <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
            <h2 class="inline-flex items-center gap-3 font-serif text-xl font-semibold text-trust-900">
                <i class="fa-solid fa-user-check text-trust-500" aria-hidden="true"></i>
                Be a volunteer
            </h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                If you are interested in helping underprivileged people at a time convenient for you, you can join us as a volunteer.
            </p>
        </div>
        <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
            <h2 class="inline-flex items-center gap-3 font-serif text-xl font-semibold text-trust-900">
                <i class="fa-solid fa-id-badge text-trust-500" aria-hidden="true"></i>
                Be a member
            </h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                You can be part of a noble cause and spread a few smiles in the lives of underprivileged people through membership.
            </p>
        </div>
        <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
            <h2 class="inline-flex items-center gap-3 font-serif text-xl font-semibold text-trust-900">
                <i class="fa-solid fa-hand-holding-heart text-trust-500" aria-hidden="true"></i>
                Be a sponsor
            </h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                You can sponsor our initiatives to empower underprivileged people in society by contributing money, essential goods, valuable references, and more.
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-3xl px-4 pb-16 text-center">
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-xl bg-trust-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-trust-700">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
            Contact us to get started
        </a>
    </div>
@endsection

@extends('layouts.site')

@section('title', 'Join Us — '.config('app.name'))

@section('content')
    <div class="border-b border-warm-200 bg-white px-4 py-14 md:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="font-serif text-4xl font-semibold text-trust-900 md:text-5xl">Join us</h1>
            <p class="mt-4 text-lg text-stone-600">Volunteer, become a member, or sponsor our work.</p>
        </div>
    </div>

    <div class="mx-auto grid max-w-6xl gap-8 px-4 py-14 md:grid-cols-3 md:py-20">
        <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
            <h2 class="font-serif text-xl font-semibold text-trust-900">Be a volunteer</h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                If you are interested in helping underprivileged people at a time convenient for you, you can join us as a volunteer.
            </p>
        </div>
        <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
            <h2 class="font-serif text-xl font-semibold text-trust-900">Be a member</h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                You can be part of a noble cause and spread a few smiles in the lives of underprivileged people through membership.
            </p>
        </div>
        <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
            <h2 class="font-serif text-xl font-semibold text-trust-900">Be a sponsor</h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                You can sponsor our initiatives to empower underprivileged people in society by contributing money, essential goods, valuable references, and more.
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-3xl px-4 pb-16 text-center">
        <a href="{{ route('contact') }}" class="inline-flex rounded-xl bg-trust-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-trust-700">Contact us to get started</a>
    </div>
@endsection

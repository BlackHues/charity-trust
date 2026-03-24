@extends('layouts.site')

@section('title', 'Donate — '.config('app.name'))

@section('content')
    <div class="border-b border-warm-200 bg-white px-4 py-14 md:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="font-serif text-4xl font-semibold text-trust-900 md:text-5xl">Donate</h1>
            <p class="mt-6 text-xl leading-relaxed text-stone-700">
                Support us today to create more smiles tomorrow.
            </p>
            <p class="mt-4 text-lg text-stone-600">
                Join us in helping the needy through your generous contributions.
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-3xl space-y-8 px-4 py-14 md:py-20">
        <div class="rounded-2xl border border-warm-200 bg-white p-8 text-center shadow-sm">
            <p class="leading-relaxed text-stone-700">
                Your donation helps us provide food, shelter, medical support, education, and relief when communities need it most. For bank details or in-kind contributions, please reach out using the contact numbers on our Reach Us page.
            </p>
            <a href="{{ route('contact') }}" class="mt-8 inline-flex rounded-xl bg-trust-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-trust-700">Reach us</a>
        </div>
    </div>
@endsection

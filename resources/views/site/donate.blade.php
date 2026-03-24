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
        <div class="rounded-2xl border border-warm-200 bg-white p-6 text-center shadow-sm md:p-10">
            <h2 class="font-serif text-2xl font-semibold text-trust-900 md:text-3xl">Donate with UPI</h2>
            <p class="mt-3 text-stone-600">Scan the QR code with any UPI app (Google Pay, PhonePe, BHIM, etc.).</p>
            <div class="mx-auto mt-8 max-w-md">
                <img src="{{ asset('images/donation-upi-qr.png') }}"
                     class="mx-auto w-full rounded-lg border border-warm-200 bg-white shadow-sm"
                     alt="UPI QR code and payment details for Maha Vidhya Charitable Trust"
                     decoding="async">
            </div>
            <p class="mt-6 text-sm text-stone-500">UPI ID</p>
            <p class="mt-1 font-mono text-base font-medium text-trust-900 select-all md:text-lg">23612026031100001@cbin</p>
        </div>

        <div class="rounded-2xl border border-warm-200 bg-white p-8 text-center shadow-sm">
            <p class="leading-relaxed text-stone-700">
                Your donation helps us provide food, shelter, medical support, education, and relief when communities need it most. For bank details or in-kind contributions, please reach out using the contact numbers on our Reach Us page.
            </p>
            <a href="{{ route('contact') }}" class="mt-8 inline-flex rounded-xl bg-trust-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-trust-700">Reach us</a>
        </div>
    </div>
@endsection

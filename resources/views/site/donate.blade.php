@extends('layouts.site')

@section('title', 'Donate — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="Donate"
        subtitle="Support us today to create more smiles tomorrow."
        background-image="images/banner-about-community.png"
    />

    <div class="mx-auto max-w-3xl space-y-8 px-4 py-14 md:py-20">
        <div class="rounded-2xl border border-warm-200 bg-white p-6 text-center shadow-sm md:p-10">
            <h2 class="font-serif text-2xl font-semibold text-trust-900 md:text-3xl">Donate with UPI</h2>
            <p class="mt-3 text-stone-600">Scan the QR code with any UPI app (Google Pay, PhonePe, BHIM, etc.).</p>
            @php
                $qrFromEnv = config('site.donation_qr_url');
                $qrAsset = asset('images/donation-upi-qr.png');
                $qrLocalPath = public_path('images/donation-upi-qr.png');
                $qrSrc = $qrFromEnv ?: (file_exists($qrLocalPath) ? $qrAsset : null);
            @endphp
            <div class="mx-auto mt-8 max-w-md">
                @if ($qrSrc)
                    <img src="{{ $qrSrc }}"
                         class="mx-auto w-full max-w-sm rounded-lg border border-warm-200 bg-white p-2 shadow-sm"
                         alt="UPI QR code for Maha Vidhya Charitable Trust"
                         width="320"
                         height="320"
                         decoding="async">
                @else
                    <div class="rounded-lg border border-dashed border-warm-300 bg-warm-50 px-6 py-8 text-sm text-stone-600">
                        <p class="text-stone-800">Use the UPI ID below in your app, or contact us if you need a QR to scan.</p>
                    </div>
                @endif
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

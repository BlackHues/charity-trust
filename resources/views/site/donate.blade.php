@extends('layouts.site')

@section('title', 'Donate — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="Donate"
        subtitle="Support us today to create more smiles tomorrow."
        background-image="images/banner-about-community.png"
        icon="fa-solid fa-hand-holding-dollar"
    />

    <div class="mx-auto max-w-3xl space-y-8 px-4 py-14 md:py-20">
        <div class="rounded-2xl border border-warm-200 bg-white p-6 text-center shadow-sm md:p-10">
            <h2 class="inline-flex items-center gap-3 font-serif text-2xl font-semibold text-trust-900 md:text-3xl">
                <i class="fa-solid fa-qrcode text-trust-500" aria-hidden="true"></i>
                Donate with UPI
            </h2>
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
            <div class="mx-auto mt-8 max-w-lg rounded-xl border border-trust-500/25 bg-trust-900/[0.03] px-4 py-4 text-left text-sm leading-relaxed text-stone-700 md:px-5">
                <p class="inline-flex items-start gap-2 font-semibold text-trust-900">
                    <i class="fa-solid fa-landmark mt-0.5 shrink-0 text-trust-500" aria-hidden="true"></i>
                    <span>12A &amp; 80G registration</span>
                </p>
                <p class="mt-2 text-pretty">
                    Maha Vidhya Charitable Trust is a 12A &amp; 80G registered NGO. Tax Exemption Allowed under Section 80G Exemption Order No. URNO. AAFTM3843EF20261/80G Order Date 07-02-2026. Income Tax Department Government of India.
                </p>
            </div>
            <p class="mt-6 inline-flex items-center gap-2 text-sm text-stone-500">
                <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                UPI ID
            </p>
            <p class="mt-1 font-mono text-base font-medium text-trust-900 select-all md:text-lg">23612026031100001@cbin</p>
        </div>

        <div class="rounded-2xl border border-warm-200 bg-white p-8 text-center shadow-sm">
            <p class="leading-relaxed text-stone-700">
                Your donation helps us provide food, shelter, medical support, education, and relief when communities need it most. For bank details or in-kind contributions, please reach out using the contact numbers on our Reach Us page.
            </p>
            <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center gap-2 rounded-xl bg-trust-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-trust-700">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                Reach us
            </a>
        </div>
    </div>
@endsection

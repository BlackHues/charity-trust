@extends('layouts.site')

@section('title', 'About — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="About us"
        subtitle="Maha Vidhya Charitable Trust"
        icon="fa-solid fa-book-open"
    />

    <article class="relative mx-auto max-w-3xl space-y-8 px-4 py-14 leading-relaxed text-stone-700 md:py-20">
        <div aria-hidden="true" class="pointer-events-none absolute -top-6 -left-6 h-28 w-28 opacity-10">
            <svg viewBox="0 0 100 100" class="h-full w-full">
                <defs>
                    <linearGradient id="g" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0" stop-color="#2d8a82" stop-opacity="0.9" />
                        <stop offset="1" stop-color="#0f3d3a" stop-opacity="0.9" />
                    </linearGradient>
                </defs>
                <path fill="url(#g)" d="M50 12c9 14 26 17 38 26-10 10-15 26-10 42-16-4-26-1-28-8-2 7-12 4-28 8 5-16 0-32-10-42 12-9 29-12 38-26z" />
            </svg>
        </div>

        <p>
            Maha Vidhya Charitable Trust is a nonprofit charitable trust that works to enrich the lives of underprivileged people through education, mentorship, and access to quality healthcare. The Trust was started with the noble intent of preserving the rights of each and every child to be educated, live healthy and happy lives. We continuously engage in various programmes and activities to promote the welfare of the socially and economically downtrodden people especially in the village and to help the unemployed youth in all possible ways in order to make themselves reliant and self-supportive.
        </p>
        <p>
            Maha Vidhya Charitable Trust prides itself in offering a corner where people can seek peace and kindness by remaining a flicker of hope—a source of shelter and solace for patients and their loved ones seeking better treatment in best hospitals with focus on a deep commitment to find innovative solutions to major problems related to eradication of hunger and alleviation of human suffering from diseases. We also stand to promote formal and non-formal education, health education, consumer education, environmental education, technical legal education and help the poor students for preparing the competitive examinations. Also, we provide relief to the persons affected by natural calamities and to undertake rehabilitation programmes for the affected people.
        </p>
        <p>
            Maha Vidhya Charitable Trust constantly works to empower economically disadvantaged people by addressing their fundamental needs and ensuring free access to essential services. We are committed to providing comprehensive support, including nutritious food, safe and secure shelter, dependable ambulance services, and vital pharmaceutical aid. Through these initiatives, we aim to create a healthier, more equitable environment where individuals can prioritise recovery and well-being without financial barriers. By fostering a culture of care and compassion, we strive to transform lives and promote a sustainable, healthier future for all.
        </p>

        <div class="grid gap-4 md:grid-cols-2">
            <div class="group rounded-2xl border border-warm-200 bg-white/80 p-6 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-4">
                    <span class="mt-1 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-trust-900/10 text-trust-700 transition group-hover:bg-trust-700 group-hover:text-white">
                        <i class="fa-solid fa-graduation-cap text-lg" aria-hidden="true"></i>
                    </span>
                    <div>
                        <h3 class="font-serif text-lg font-semibold text-trust-900">Education</h3>
                        <p class="mt-2 text-sm leading-relaxed text-stone-600">Formal and non-formal learning, mentorship, and support for competitive exams.</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-warm-200 bg-white/80 p-6 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-4">
                    <span class="mt-1 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-trust-900/10 text-trust-700 transition group-hover:bg-trust-700 group-hover:text-white">
                        <i class="fa-solid fa-kit-medical text-lg" aria-hidden="true"></i>
                    </span>
                    <div>
                        <h3 class="font-serif text-lg font-semibold text-trust-900">Health Care</h3>
                        <p class="mt-2 text-sm leading-relaxed text-stone-600">Patient support, medicines, lab tests, ambulance, and blood donation for the needy.</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-warm-200 bg-white/80 p-6 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-4">
                    <span class="mt-1 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-trust-900/10 text-trust-700 transition group-hover:bg-trust-700 group-hover:text-white">
                        <i class="fa-solid fa-people-group text-lg" aria-hidden="true"></i>
                    </span>
                    <div>
                        <h3 class="font-serif text-lg font-semibold text-trust-900">Social Welfare</h3>
                        <p class="mt-2 text-sm leading-relaxed text-stone-600">Women and child empowerment through skills, workshops, and opportunities.</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-warm-200 bg-white/80 p-6 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-4">
                    <span class="mt-1 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-trust-900/10 text-trust-700 transition group-hover:bg-trust-700 group-hover:text-white">
                        <i class="fa-solid fa-leaf text-lg" aria-hidden="true"></i>
                    </span>
                    <div>
                        <h3 class="font-serif text-lg font-semibold text-trust-900">Relief & Environment</h3>
                        <p class="mt-2 text-sm leading-relaxed text-stone-600">Disaster rehabilitation, essentials, tree planting, and rainwater conservation.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div class="group rounded-2xl border border-warm-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-4">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-trust-900/10 text-trust-700 transition group-hover:bg-trust-700 group-hover:text-white">
                        <i class="fa-solid fa-bullseye text-lg" aria-hidden="true"></i>
                    </span>
                    <div>
                        <h2 class="font-serif text-2xl font-semibold text-trust-900">Mission</h2>
                        <p class="mt-3 text-stone-700">
                            To ensure quality of life and maximising opportunity to which is to be achieved by providing them medical care, food, education and decent accommodation and bring them back to normal life to enable them to lead a healthy and socially respectable life.
                        </p>
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-warm-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-4">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-trust-900/10 text-trust-700 transition group-hover:bg-trust-700 group-hover:text-white">
                        <i class="fa-solid fa-eye text-lg" aria-hidden="true"></i>
                    </span>
                    <div>
                        <h2 class="font-serif text-2xl font-semibold text-trust-900">Vision</h2>
                        <p class="mt-3 text-stone-700">
                            To uplift the lives of economically marginalised people by providing essential support for essential life needs and enhance them to access quality life standards.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection

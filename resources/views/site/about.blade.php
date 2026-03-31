@extends('layouts.site')

@section('title', 'About — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="About us"
        subtitle="Maha Vidhya Charitable Trust"
        icon="fa-solid fa-book-open"
        background-image="images/photo-hands-reach-heart.png"
    />

    {{-- Vision & mission: same width as hero + article (max-w-6xl); extra top space below banner --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-warm-100/40 via-white to-warm-50/20 px-4" aria-labelledby="about-vision-mission-heading">
        {{-- Same inset as <x-site-inner-hero> (section px-4 + inner max-w-6xl px-4) --}}
        <div class="mx-auto flex w-full max-w-6xl flex-col gap-10 px-5 py-16 sm:gap-12 sm:px-6 sm:py-20 md:gap-14 md:px-8 md:pt-28 md:pb-24 lg:gap-16">
            <header class="mx-auto max-w-3xl space-y-4 px-1 text-center sm:space-y-5 md:space-y-6">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-trust-700">Our purpose</p>
                <h2 id="about-vision-mission-heading" class="font-serif text-3xl font-semibold tracking-tight text-trust-900 md:text-4xl lg:text-[2.35rem]">
                    Vision &amp; mission
                </h2>
                <p class="text-base leading-relaxed text-stone-600 md:text-lg md:leading-relaxed">
                    The principles that guide every programme we run across Tamil Nadu.
                </p>
                <div class="mx-auto flex justify-center gap-1.5 pt-1" aria-hidden="true">
                    <span class="h-1 w-8 rounded-full bg-trust-700"></span>
                    <span class="h-1 w-3 rounded-full bg-trust-500/70"></span>
                    <span class="h-1 w-3 rounded-full bg-trust-500/45"></span>
                </div>
            </header>

            <div class="grid grid-cols-2 gap-4 sm:gap-5 md:grid-cols-3 md:gap-6 lg:gap-7">
                <figure class="col-span-2 overflow-hidden rounded-2xl shadow-[0_20px_50px_-24px_rgba(15,61,58,0.35)] md:col-span-2 md:row-span-2">
                    <img
                        src="{{ asset('images/photo-children-circle-unity.png') }}"
                        width="1200"
                        height="640"
                        class="aspect-[21/11] max-h-[min(22rem,50vw)] w-full object-cover sm:max-h-none sm:aspect-[16/9] md:aspect-[2/1] md:max-h-[20rem] lg:max-h-[22rem]"
                        alt="Children together — unity and community"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
                <figure class="overflow-hidden rounded-2xl shadow-[0_16px_40px_-20px_rgba(15,61,58,0.3)]">
                    <img
                        src="{{ asset('images/photo-child-toy-house.png') }}"
                        width="560"
                        height="560"
                        class="aspect-[4/5] h-full min-h-[10rem] w-full object-cover sm:min-h-[12rem] md:aspect-square md:min-h-0"
                        alt="Hope and a safe home for every child"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
                <figure class="overflow-hidden rounded-2xl shadow-[0_16px_40px_-20px_rgba(15,61,58,0.3)]">
                    <img
                        src="{{ asset('images/photo-community-tree-planting.png') }}"
                        width="560"
                        height="560"
                        class="aspect-[4/5] h-full min-h-[10rem] w-full object-cover sm:min-h-[12rem] md:aspect-square md:min-h-0"
                        alt="Volunteers and children planting trees together"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
            </div>

            <div class="grid grid-cols-1 items-stretch gap-6 sm:gap-7 md:gap-8 lg:grid-cols-2 lg:gap-10">
                <div class="relative flex min-h-full flex-col overflow-hidden rounded-2xl bg-gradient-to-br from-trust-900 via-trust-700 to-[#0a2e2c] p-8 text-white shadow-lg sm:p-9 md:p-10">
                    <div class="absolute -right-12 -top-12 h-40 w-40 rounded-full bg-white/10 blur-2xl" aria-hidden="true"></div>
                    <div class="relative flex flex-1 flex-col justify-start">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-white/15 text-white md:h-12 md:w-12">
                                <i class="fa-solid fa-eye text-base md:text-lg" aria-hidden="true"></i>
                            </span>
                            <h3 class="font-serif text-xl font-semibold sm:text-2xl md:text-[1.65rem]">Vision</h3>
                        </div>
                        <p class="mt-3 text-[1.02rem] leading-relaxed text-white/95 md:mt-3.5 md:text-[1.0625rem] md:leading-[1.65]">
                            To uplift the lives of economically marginalised people by providing essential support for essential life needs and enhance them to access quality life standards.
                        </p>
                    </div>
                </div>
                <div class="relative flex min-h-full flex-col overflow-hidden rounded-2xl bg-white p-8 shadow-[0_12px_40px_-20px_rgba(15,61,58,0.12)] sm:p-9 md:p-10">
                    <div class="absolute -bottom-8 right-0 h-32 w-32 rounded-full bg-trust-500/[0.07] blur-2xl" aria-hidden="true"></div>
                    <div class="relative flex flex-1 flex-col justify-start">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-stone-100 text-stone-900 md:h-12 md:w-12">
                                <i class="fa-solid fa-bullseye text-base md:text-lg" aria-hidden="true"></i>
                            </span>
                            <h3 class="font-serif text-xl font-semibold text-trust-900 sm:text-2xl md:text-[1.65rem]">Mission</h3>
                        </div>
                        <p class="mt-3 text-[1.02rem] leading-relaxed text-stone-700 md:mt-3.5 md:text-[1.0625rem] md:leading-[1.65]">
                            To ensure quality of life and maximising opportunity to which is to be achieved by providing them medical care, food, education and decent accommodation and bring them back to normal life to enable them to lead a healthy and socially respectable life.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="px-4">
    <article class="relative mx-auto w-full max-w-6xl space-y-8 px-4 py-12 text-[1.0625rem] leading-[1.75] text-stone-700 md:py-20 md:text-lg md:leading-relaxed">
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

        <figure class="w-full overflow-hidden rounded-2xl shadow-[0_24px_55px_-28px_rgba(15,61,58,0.22)]">
            <img
                src="{{ asset('images/photo-meals-children.png') }}"
                width="896"
                height="560"
                class="aspect-[16/10] w-full object-cover"
                alt="Volunteers serving meals to children in a community programme"
                loading="lazy"
                decoding="async"
            >
        </figure>

        <p>
            Maha Vidhya Charitable Trust prides itself in offering a corner where people can seek peace and kindness by remaining a flicker of hope—a source of shelter and solace for patients and their loved ones seeking better treatment in best hospitals with focus on a deep commitment to find innovative solutions to major problems related to eradication of hunger and alleviation of human suffering from diseases. We also stand to promote formal and non-formal education, health education, consumer education, environmental education, technical legal education and help the poor students for preparing the competitive examinations. Also, we provide relief to the persons affected by natural calamities and to undertake rehabilitation programmes for the affected people.
        </p>
        <p>
            Maha Vidhya Charitable Trust constantly works to empower economically disadvantaged people by addressing their fundamental needs and ensuring free access to essential services. We are committed to providing comprehensive support, including nutritious food, safe and secure shelter, dependable ambulance services, and vital pharmaceutical aid. Through these initiatives, we aim to create a healthier, more equitable environment where individuals can prioritise recovery and well-being without financial barriers. By fostering a culture of care and compassion, we strive to transform lives and promote a sustainable, healthier future for all.
        </p>

        <div class="grid w-full grid-cols-2 gap-3 sm:gap-4 md:grid-cols-4">
            <figure class="overflow-hidden rounded-xl shadow-[0_12px_32px_-16px_rgba(15,61,58,0.25)]">
                <img src="{{ asset('images/photo-classroom-teacher.png') }}" width="320" height="240" class="aspect-[4/3] h-full w-full object-cover" alt="Teacher supporting students in the classroom" loading="lazy" decoding="async">
            </figure>
            <figure class="overflow-hidden rounded-xl shadow-[0_12px_32px_-16px_rgba(15,61,58,0.25)]">
                <img src="{{ asset('images/photo-pottery-boy.png') }}" width="320" height="240" class="aspect-[4/3] h-full w-full object-cover" alt="Child learning pottery and creative skills" loading="lazy" decoding="async">
            </figure>
            <figure class="overflow-hidden rounded-xl shadow-[0_12px_32px_-16px_rgba(15,61,58,0.25)]">
                <img src="{{ asset('images/photo-schoolyard-friends.png') }}" width="320" height="240" class="aspect-[4/3] h-full w-full object-cover" alt="School children in the community" loading="lazy" decoding="async">
            </figure>
            <figure class="overflow-hidden rounded-xl shadow-[0_12px_32px_-16px_rgba(15,61,58,0.25)]">
                <img src="{{ asset('images/photo-student-tree-planting.png') }}" width="320" height="240" class="aspect-[4/3] h-full w-full object-cover" alt="Student taking part in tree planting" loading="lazy" decoding="async">
            </figure>
        </div>

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
    </article>
    </div>
@endsection

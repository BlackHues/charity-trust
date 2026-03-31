@extends('layouts.site')

@section('title', 'Services — '.config('app.name'))

@section('content')
    <x-site-inner-hero
        title="Our services"
        subtitle="Education, health, social welfare, rehabilitation, and the environment."
        icon="fa-solid fa-hands-holding-circle"
        background-image="images/photo-meals-children.png"
    />

    <div class="px-4">
    <div class="mx-auto max-w-6xl space-y-14 px-4 py-14 md:space-y-16 md:py-20">
        <section id="education" class="scroll-mt-24">
            <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-10">
                <div class="order-2 lg:order-1">
                    <h2 class="flex items-center gap-3 font-serif text-2xl font-semibold text-trust-900">
                        <i class="fa-solid fa-graduation-cap text-trust-500" aria-hidden="true"></i>
                        Education
                    </h2>
                    <p class="mt-4 leading-relaxed text-stone-700">
                        Maha Vidhya Charitable Trust focuses on the empowerment of society by providing quality education to the underprivileged free of cost. We promote formal and non-formal education, health education, consumer education, environmental education, technical legal education, and help poor students prepare for competitive examinations. By getting proper education and appropriate skills development they can build a good career, become breadwinners for their families, and strengthen the pillars of society. We produce, collect, preserve, and share educational and development resource materials for development education programmes in India, especially for downtrodden and poor communities, women, and weaker sectors.
                    </p>
                </div>
                <figure class="order-1 overflow-hidden rounded-2xl lg:order-2">
                    <img
                        src="{{ asset('images/photo-classroom-teacher.png') }}"
                        width="720"
                        height="480"
                        class="aspect-[4/3] w-full object-cover"
                        alt="Teacher supporting students in the classroom"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
            </div>
        </section>

        <section id="health" class="scroll-mt-24">
            <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-10">
                <figure class="overflow-hidden rounded-2xl">
                    <img
                        src="{{ asset('images/photo-pediatric-care.png') }}"
                        width="720"
                        height="480"
                        class="aspect-[4/3] w-full object-cover"
                        alt="Healthcare professional caring for a child"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
                <div>
                    <h2 class="flex items-center gap-3 font-serif text-2xl font-semibold text-trust-900">
                        <i class="fa-solid fa-heart-pulse text-trust-500" aria-hidden="true"></i>
                        Health
                    </h2>
                    <p class="mt-4 leading-relaxed text-stone-700">
                        The life of an individual is a constant reconciliation with the space between ill health and good health. When it comes to fatal diseases, it is not just the patient who suffers, but also their families and loved ones. We take care of helpless bed-ridden patients with no bystanders and limited means. We locate such patients in wards and casualty, provide physical support, proper food, supplement medicines, conduct lab tests, and on recovery provide free ambulance to take them back home. Blood donation for poor patients, especially those without relatives’ support, is also arranged. We conduct health awareness and orientation programmes for children and adults across different areas.
                    </p>
                </div>
            </div>
        </section>

        <section id="social-welfare" class="scroll-mt-24">
            <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-10">
                <div class="order-2 lg:order-1">
                    <h2 class="flex items-center gap-3 font-serif text-2xl font-semibold text-trust-900">
                        <i class="fa-solid fa-hand-holding-heart text-trust-500" aria-hidden="true"></i>
                        Social welfare
                    </h2>
                    <p class="mt-4 leading-relaxed text-stone-700">
                        We constantly organise events and activities for social welfare through workshops, seminars, and camps. We believe social strengthening is achieved through women and child empowerment, and hence we conduct soft and hard skills development programmes for housewives and other unemployed women. With the support of small and large companies we create job and self-employment opportunities for women according to their natural and earned skills. We also generate part-time job opportunities, financial aid for cottage industries, and home-based work across various sectors.
                    </p>
                </div>
                <figure class="order-1 overflow-hidden rounded-2xl lg:order-2">
                    <img
                        src="{{ asset('images/photo-pottery-boy.png') }}"
                        width="720"
                        height="480"
                        class="aspect-[4/3] w-full object-cover"
                        alt="Child learning skills through a creative workshop"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
            </div>
        </section>

        <section id="rehabilitation" class="scroll-mt-24">
            <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-10">
                <figure class="overflow-hidden rounded-2xl">
                    <img
                        src="{{ asset('images/photo-meals-children.png') }}"
                        width="720"
                        height="480"
                        class="aspect-[4/3] w-full object-cover"
                        alt="Relief support — food and essentials for those in need"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
                <div>
                    <h2 class="flex items-center gap-3 font-serif text-2xl font-semibold text-trust-900">
                        <i class="fa-solid fa-person-circle-check text-trust-500" aria-hidden="true"></i>
                        Rehabilitation
                    </h2>
                    <p class="mt-4 leading-relaxed text-stone-700">
                        We provide programmes to rebuild the lives of people affected by natural calamities such as flood, earthquake, thunderstorm, and fire accidents. We arrange shelters with quality facilities and food, and essentials such as clothes, sanitary napkins, and other life necessities. We provide assistance with documentation for government benefits, with support from registered legal and financial experts.
                    </p>
                </div>
            </div>
        </section>

        <section id="environment" class="scroll-mt-24">
            <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-10">
                <div class="order-2 lg:order-1">
                    <h2 class="flex items-center gap-3 font-serif text-2xl font-semibold text-trust-900">
                        <i class="fa-solid fa-leaf text-trust-500" aria-hidden="true"></i>
                        Environment
                    </h2>
                    <p class="mt-4 leading-relaxed text-stone-700">
                        Maha Vidhya Charitable Trust is actively engaged in protecting against environmental hazards through awareness campaigns and group initiatives. We promote organic farming and rainwater conservation with water management clubs, biodiversity conservation of medicinal plants, animals, and birds, and planting tree species to help address global warming and improve the environment.
                    </p>
                </div>
                <figure class="order-1 overflow-hidden rounded-2xl lg:order-2">
                    <img
                        src="{{ asset('images/photo-afforestation-children.png') }}"
                        width="720"
                        height="480"
                        class="aspect-[4/3] w-full object-cover"
                        alt="Children planting trees for the environment"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
            </div>
        </section>
    </div>
    </div>
@endsection

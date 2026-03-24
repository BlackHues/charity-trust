@extends('layouts.site')

@section('title', 'Services — '.config('app.name'))

@section('content')
    <div class="border-b border-warm-200 bg-white px-4 py-14 md:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="font-serif text-4xl font-semibold text-trust-900 md:text-5xl">Our services</h1>
            <p class="mt-4 text-lg text-stone-600">Education, health, social welfare, rehabilitation, and the environment.</p>
        </div>
    </div>

    <div class="mx-auto max-w-3xl space-y-12 px-4 py-14 md:py-20">
        <section id="education" class="scroll-mt-24">
            <h2 class="font-serif text-2xl font-semibold text-trust-900">Education</h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                Mahavidhya Charitable Trust focuses on the empowerment of society by providing quality education to the underprivileged free of cost. We promote formal and non-formal education, health education, consumer education, environmental education, technical legal education, and help poor students prepare for competitive examinations. By getting proper education and appropriate skills development they can build a good career, become breadwinners for their families, and strengthen the pillars of society. We produce, collect, preserve, and share educational and development resource materials for development education programmes in India, especially for downtrodden and poor communities, women, and weaker sectors.
            </p>
        </section>

        <section id="health" class="scroll-mt-24">
            <h2 class="font-serif text-2xl font-semibold text-trust-900">Health</h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                The life of an individual is a constant reconciliation with the space between ill health and good health. When it comes to fatal diseases, it is not just the patient who suffers, but also their families and loved ones. We take care of helpless bed-ridden patients with no bystanders and limited means. We locate such patients in wards and casualty, provide physical support, proper food, supplement medicines, conduct lab tests, and on recovery provide free ambulance to take them back home. Blood donation for poor patients, especially those without relatives’ support, is also arranged. We conduct health awareness and orientation programmes for children and adults across different areas.
            </p>
        </section>

        <section id="social-welfare" class="scroll-mt-24">
            <h2 class="font-serif text-2xl font-semibold text-trust-900">Social welfare</h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                We constantly organise events and activities for social welfare through workshops, seminars, and camps. We believe social strengthening is achieved through women and child empowerment, and hence we conduct soft and hard skills development programmes for housewives and other unemployed women. With the support of small and large companies we create job and self-employment opportunities for women according to their natural and earned skills. We also generate part-time job opportunities, financial aid for cottage industries, and home-based work across various sectors.
            </p>
        </section>

        <section id="rehabilitation" class="scroll-mt-24">
            <h2 class="font-serif text-2xl font-semibold text-trust-900">Rehabilitation</h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                We provide programmes to rebuild the lives of people affected by natural calamities such as flood, earthquake, thunderstorm, and fire accidents. We arrange shelters with quality facilities and food, and essentials such as clothes, sanitary napkins, and other life necessities. We provide assistance with documentation for government benefits, with support from registered legal and financial experts.
            </p>
        </section>

        <section id="environment" class="scroll-mt-24">
            <h2 class="font-serif text-2xl font-semibold text-trust-900">Environment</h2>
            <p class="mt-4 leading-relaxed text-stone-700">
                Mahavidhya Charitable Trust is actively engaged in protecting against environmental hazards through awareness campaigns and group initiatives. We promote organic farming and rainwater conservation with water management clubs, biodiversity conservation of medicinal plants, animals, and birds, and planting tree species to help address global warming and improve the environment.
            </p>
        </section>
    </div>
@endsection

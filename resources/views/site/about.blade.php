@extends('layouts.site')

@section('title', 'About — '.config('app.name'))

@section('content')
    <div class="border-b border-warm-200 bg-white px-4 py-14 md:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="font-serif text-4xl font-semibold text-trust-900 md:text-5xl">About us</h1>
            <p class="mt-4 text-lg text-stone-600">Mahavidhya Charitable Trust</p>
        </div>
    </div>

    <article class="mx-auto max-w-3xl space-y-8 px-4 py-14 leading-relaxed text-stone-700 md:py-20">
        <p>
            Mahavidhya Charitable Trust is a nonprofit charitable trust that works to enrich the lives of underprivileged people through education, mentorship, and access to quality healthcare. The Trust was started with the noble intent of preserving the rights of each and every child to be educated, live healthy and happy lives. We continuously engage in various programmes and activities to promote the welfare of the socially and economically downtrodden people especially in the village and to help the unemployed youth in all possible ways in order to make themselves reliant and self-supportive.
        </p>
        <p>
            Mahavidhya Charitable Trust prides itself in offering a corner where people can seek peace and kindness by remaining a flicker of hope—a source of shelter and solace for patients and their loved ones seeking better treatment in best hospitals with focus on a deep commitment to find innovative solutions to major problems related to eradication of hunger and alleviation of human suffering from diseases. We also stand to promote formal and non-formal education, health education, consumer education, environmental education, technical legal education and help the poor students for preparing the competitive examinations. Also, we provide relief to the persons affected by natural calamities and to undertake rehabilitation programmes for the affected people.
        </p>
        <p>
            Mahavidhya Charitable Trust constantly works to empower economically disadvantaged people by addressing their fundamental needs and ensuring free access to essential services. We are committed to providing comprehensive support, including nutritious food, safe and secure shelter, dependable ambulance services, and vital pharmaceutical aid. Through these initiatives, we aim to create a healthier, more equitable environment where individuals can prioritise recovery and well-being without financial barriers. By fostering a culture of care and compassion, we strive to transform lives and promote a sustainable, healthier future for all.
        </p>

        <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
            <h2 class="font-serif text-2xl font-semibold text-trust-900">Mission</h2>
            <p class="mt-4">
                To ensure quality of life and maximising opportunity to which is to be achieved by providing them medical care, food, education and decent accommodation and bring them back to normal life to enable them to lead a healthy and socially respectable life.
            </p>
        </div>

        <div class="rounded-2xl border border-warm-200 bg-white p-8 shadow-sm">
            <h2 class="font-serif text-2xl font-semibold text-trust-900">Vision</h2>
            <p class="mt-4">
                To uplift the lives of economically marginalised people by providing essential support for essential life needs and enhance them to access quality life standards.
            </p>
        </div>
    </article>
@endsection

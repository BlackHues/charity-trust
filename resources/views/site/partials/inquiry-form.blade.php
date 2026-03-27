@php
    $typeOptions = [
        'join' => 'Want to join',
        'volunteer' => 'Volunteer',
        'sponsor' => 'Sponsor / Donor',
        'institution' => 'Educational Institution',
        'enquiry' => 'General Enquiry',
    ];
    $selectedType = old('inquiry_type', $selectedType ?? 'enquiry');
@endphp

<div class="rounded-2xl border border-warm-200 bg-white p-6 shadow-sm md:p-8" data-inquiry-form-wrapper>
    <h2 class="inline-flex items-center gap-3 font-serif text-xl font-semibold text-trust-900">
        <i class="fa-solid fa-file-signature text-trust-500" aria-hidden="true"></i>
        {{ $title ?? 'Send an enquiry' }}
    </h2>
    <p class="mt-2 text-sm text-stone-600">{{ $subtitle ?? 'Share your details and we will get back to you soon.' }}</p>

    @if (session('status'))
        <div class="mt-5 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-5 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
            {{ $errors->first('form') ?? 'Please check the form fields and submit again.' }}
        </div>
    @endif

    <form method="POST" action="{{ route('inquiry.submit') }}" class="mt-6 space-y-4" data-inquiry-form>
        @csrf
        <input type="hidden" name="source_page" value="{{ $sourcePage ?? request()->path() }}">

        <div>
            <label for="inquiry_type" class="text-sm font-semibold text-stone-700">I am interested in</label>
            <select id="inquiry_type" name="inquiry_type" class="mt-1.5 w-full rounded-xl border border-warm-200 bg-warm-100 px-4 py-2.5 text-sm text-stone-800 focus:border-trust-500 focus:outline-none" data-inquiry-type>
                @foreach ($typeOptions as $value => $label)
                    <option value="{{ $value }}" @selected($selectedType === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('inquiry_type')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="name" class="text-sm font-semibold text-stone-700">Name</label>
                <input id="name" name="name" type="text" required value="{{ old('name') }}" class="mt-1.5 w-full rounded-xl border border-warm-200 bg-warm-100 px-4 py-2.5 text-sm text-stone-800 focus:border-trust-500 focus:outline-none">
                @error('name')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="phone" class="text-sm font-semibold text-stone-700">Contact number</label>
                <input id="phone" name="phone" type="text" required value="{{ old('phone') }}" class="mt-1.5 w-full rounded-xl border border-warm-200 bg-warm-100 px-4 py-2.5 text-sm text-stone-800 focus:border-trust-500 focus:outline-none">
                @error('phone')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label for="email" class="text-sm font-semibold text-stone-700">Email (optional)</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" class="mt-1.5 w-full rounded-xl border border-warm-200 bg-warm-100 px-4 py-2.5 text-sm text-stone-800 focus:border-trust-500 focus:outline-none">
            @error('email')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div data-show-for="institution" class="hidden">
            <label for="institution_name" class="text-sm font-semibold text-stone-700">Institution name</label>
            <input id="institution_name" name="institution_name" type="text" value="{{ old('institution_name') }}" class="mt-1.5 w-full rounded-xl border border-warm-200 bg-warm-100 px-4 py-2.5 text-sm text-stone-800 focus:border-trust-500 focus:outline-none">
            @error('institution_name')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div data-show-for="sponsor donor" class="hidden">
            <label for="sponsorship_interest" class="text-sm font-semibold text-stone-700">What would you like to sponsor?</label>
            <select id="sponsorship_interest" name="sponsorship_interest" class="mt-1.5 w-full rounded-xl border border-warm-200 bg-warm-100 px-4 py-2.5 text-sm text-stone-800 focus:border-trust-500 focus:outline-none">
                <option value="">Select one</option>
                <option value="Education support" @selected(old('sponsorship_interest') === 'Education support')>Education support</option>
                <option value="Medical support" @selected(old('sponsorship_interest') === 'Medical support')>Medical support</option>
                <option value="Food / essentials" @selected(old('sponsorship_interest') === 'Food / essentials')>Food / essentials</option>
                <option value="General donation" @selected(old('sponsorship_interest') === 'General donation')>General donation</option>
            </select>
            @error('sponsorship_interest')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="message" class="text-sm font-semibold text-stone-700">Message (optional)</label>
            <textarea id="message" name="message" rows="4" class="mt-1.5 w-full rounded-xl border border-warm-200 bg-warm-100 px-4 py-2.5 text-sm text-stone-800 focus:border-trust-500 focus:outline-none" placeholder="Tell us briefly how you want to connect...">{{ old('message') }}</textarea>
            @error('message')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-trust-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-trust-700">
            <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
            Submit request
        </button>
    </form>
</div>

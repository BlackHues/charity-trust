@extends('layouts.admin')

@section('title', 'Log in')

@section('content')
    <div class="mx-auto max-w-md rounded-2xl border border-stone-200 bg-white p-8 shadow-sm">
        <div class="mb-6 flex justify-center">
            <img src="{{ asset('images/logo.png') }}" width="280" height="120" class="h-24 w-auto max-w-full object-contain" alt="Maha Vidhya Charitable Trust">
        </div>
        <h1 class="font-serif text-2xl font-semibold text-trust-900">Admin login</h1>
        <p class="mt-2 text-sm text-stone-600">{{ config('app.name') }}</p>
        <form method="POST" action="{{ url('/admin/login') }}" class="mt-8 space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-stone-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="username"
                       class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 text-stone-900 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-stone-700">Password</label>
                <input type="password" name="password" id="password" required autocomplete="current-password"
                       class="mt-1 w-full rounded-lg border border-stone-300 px-3 py-2 text-stone-900 shadow-sm focus:border-trust-500 focus:outline-none focus:ring-1 focus:ring-trust-500">
            </div>
            <label class="flex items-center gap-2 text-sm text-stone-600">
                <input type="checkbox" name="remember" value="1" class="rounded border-stone-300 text-trust-700 focus:ring-trust-500">
                Remember me
            </label>
            <button type="submit" class="w-full rounded-xl bg-trust-900 py-2.5 text-sm font-semibold text-white transition hover:bg-trust-700">
                Log in
            </button>
        </form>
    </div>
@endsection

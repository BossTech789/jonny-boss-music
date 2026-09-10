@extends('layouts.admin')

@section('title', 'Settings')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-8">

        <p class="text-sm text-gray-500">
            Website configuration
        </p>

        <h1 class="text-3xl font-black">
            Site Settings
        </h1>

    </div>


    <form
        method="POST"
        action="{{ route('admin.settings.update') }}"
        class="bg-white rounded-2xl border shadow-sm p-6 space-y-6"
    >

        @csrf
        @method('PUT')


        <div>

            <label class="block text-sm font-semibold mb-2">
                Artist Name
            </label>

            <input
                type="text"
                name="artist_name"
                value="{{ old('artist_name', $settings['artist_name'] ?? 'Jonny Boss') }}"
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Artist Email
            </label>

            <input
                type="email"
                name="artist_email"
                value="{{ old('artist_email', $settings['artist_email'] ?? '') }}"
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Footer Text
            </label>

            <textarea
                name="footer_text"
                rows="4"
                class="w-full rounded-xl border-gray-300"
            >{{ old('footer_text', $settings['footer_text'] ?? '') }}</textarea>

        </div>


        <div class="flex justify-end">

            <button
                type="submit"
                class="bg-black text-white rounded-xl px-6 py-3 font-bold"
            >
                Save Settings
            </button>

        </div>

    </form>

</div>

@endsection

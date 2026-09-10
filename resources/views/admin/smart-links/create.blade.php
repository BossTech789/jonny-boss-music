@extends('layouts.admin')

@section('title', 'Create Smart Link')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-8">

        <a
            href="{{ route('admin.smart-links.index') }}"
            class="text-sm text-gray-500"
        >
            ← Back to Smart Links
        </a>

        <h1 class="text-3xl font-black mt-3">
            Create Smart Link
        </h1>

        <p class="text-gray-500 mt-1">
            Create a public landing page for a music release.
        </p>

    </div>


    <form
        method="POST"
        action="{{ route('admin.smart-links.store') }}"
        class="bg-white rounded-2xl border shadow-sm p-6 space-y-6"
    >

        @csrf


        <div>

            <label class="block text-sm font-semibold mb-2">
                Music Release *
            </label>

            <select
                name="music_id"
                required
                class="w-full rounded-xl border-gray-300"
            >

                <option value="">
                    Select a release
                </option>

                @foreach($musics as $music)

                    <option
                        value="{{ $music->id }}"
                        @selected(old('music_id') == $music->id)
                    >
                        {{ $music->title }} — {{ $music->artist }}
                    </option>

                @endforeach

            </select>

            <p class="text-xs text-gray-500 mt-2">
                The cover, artist, title, and streaming links come automatically from this music release.
            </p>

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                URL Slug *
            </label>

            <div class="flex">

                <span class="bg-gray-100 border border-r-0 rounded-l-xl px-4 flex items-center text-gray-500">
                    /listen/
                </span>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug') }}"
                    required
                    class="flex-1 rounded-r-xl border-gray-300"
                    placeholder="fear"
                >

            </div>

            <p class="text-xs text-gray-500 mt-2">
                Use letters, numbers, hyphens, and underscores.
            </p>

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Headline
            </label>

            <input
                type="text"
                name="headline"
                value="{{ old('headline') }}"
                class="w-full rounded-xl border-gray-300"
                placeholder="Listen to FEAR"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Description
            </label>

            <textarea
                name="description"
                rows="5"
                class="w-full rounded-xl border-gray-300"
                placeholder="Out now on all platforms."
            >{{ old('description') }}</textarea>

        </div>


        <div>

            <label class="inline-flex items-center gap-3">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    checked
                    class="rounded border-gray-300"
                >

                <span class="font-semibold">
                    Publish Smart Link
                </span>

            </label>

        </div>


        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.smart-links.index') }}"
                class="px-5 py-3 rounded-xl border font-semibold"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-black text-white font-bold"
            >
                Create Smart Link
            </button>

        </div>

    </form>

</div>

@endsection

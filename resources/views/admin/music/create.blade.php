@extends('layouts.admin')

@section('title', 'Add Music')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-8">

        <a
            href="{{ route('admin.music.index') }}"
            class="text-sm text-gray-500 hover:text-black"
        >
            ← Back to Music
        </a>

        <h1 class="text-3xl font-black mt-3">
            Add Music Release
        </h1>

        <p class="text-gray-500 mt-1">
            Add a single, EP, album, or other release.
        </p>

    </div>


    <form
        method="POST"
        action="{{ route('admin.music.store') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        <!-- Basic information -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">

            <h2 class="text-xl font-black mb-6">
                Release Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold mb-2">
                        Title *
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full rounded-xl border-gray-300"
                        placeholder="FEAR"
                    >

                </div>


                <div>

                    <label class="block text-sm font-semibold mb-2">
                        Artist *
                    </label>

                    <input
                        type="text"
                        name="artist"
                        value="{{ old('artist', 'Jonny Boss') }}"
                        required
                        class="w-full rounded-xl border-gray-300"
                    >

                </div>


                <div>

                    <label class="block text-sm font-semibold mb-2">
                        Type
                    </label>

                    <select
                        name="type"
                        class="w-full rounded-xl border-gray-300"
                    >

                        <option value="">
                            Select type
                        </option>

                        <option value="Single">
                            Single
                        </option>

                        <option value="EP">
                            EP
                        </option>

                        <option value="Album">
                            Album
                        </option>

                        <option value="Mixtape">
                            Mixtape
                        </option>

                    </select>

                </div>


                <div>

                    <label class="block text-sm font-semibold mb-2">
                        Release Year
                    </label>

                    <input
                        type="number"
                        name="year"
                        value="{{ old('year') }}"
                        min="1900"
                        max="2100"
                        class="w-full rounded-xl border-gray-300"
                    >

                </div>


                <div>

                    <label class="block text-sm font-semibold mb-2">
                        Cover Artwork
                    </label>

                    <input
                        type="file"
                        name="image"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full rounded-xl border border-gray-300 p-3"
                    >

                    <p class="text-xs text-gray-500 mt-2">
                        JPG, PNG or WebP. Maximum 5MB.
                    </p>

                </div>

            </div>

        </div>


        <!-- Streaming -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">

            <h2 class="text-xl font-black mb-2">
                Streaming Links
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Add the official links for this release.
            </p>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Spotify
                    </label>

                    <input
                        type="url"
                        name="spotify_link"
                        value="{{ old('spotify_link') }}"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="https://open.spotify.com/..."
                    >
                </div>


                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Apple Music
                    </label>

                    <input
                        type="url"
                        name="apple_link"
                        value="{{ old('apple_link') }}"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="https://music.apple.com/..."
                    >
                </div>


                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Audiomack
                    </label>

                    <input
                        type="url"
                        name="audiomack_link"
                        value="{{ old('audiomack_link') }}"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="https://audiomack.com/..."
                    >
                </div>


                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Amazon Music
                    </label>

                    <input
                        type="url"
                        name="amazon_link"
                        value="{{ old('amazon_link') }}"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="https://music.amazon.com/..."
                    >
                </div>


                <div>
                    <label class="block text-sm font-semibold mb-2">
                        YouTube Music
                    </label>

                    <input
                        type="url"
                        name="youtudemusic_link"
                        value="{{ old('youtudemusic_link') }}"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="https://music.youtube.com/..."
                    >
                </div>


                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Boomplay
                    </label>

                    <input
                        type="url"
                        name="boomplay_link"
                        value="{{ old('boomplay_link') }}"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="https://www.boomplay.com/..."
                    >
                </div>

            </div>

        </div>


        <!-- Submit -->
        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.music.index') }}"
                class="px-5 py-3 rounded-xl border font-semibold"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-black text-white font-bold"
            >
                Save Release
            </button>

        </div>

    </form>

</div>

@endsection

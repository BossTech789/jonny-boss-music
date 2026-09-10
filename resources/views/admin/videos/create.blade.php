@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">
        Add New Video
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.videos.store') }}"
        method="POST"
        class="space-y-6"
    >

        @csrf

        {{-- Video Title --}}
        <div>
            <label
                for="title"
                class="block font-semibold mb-2"
            >
                Video Title
            </label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                class="w-full border p-2 rounded"
                placeholder="Enter video title"
                required
            >
        </div>


        {{-- YouTube ID --}}
        <div>
            <label
                for="youtube_id"
                class="block font-semibold mb-2"
            >
                YouTube Video ID
            </label>

            <input
                type="text"
                id="youtube_id"
                name="youtube_id"
                value="{{ old('youtube_id') }}"
                class="w-full border p-2 rounded"
                placeholder="e.g. ZT-ee5PMdWQ"
                required
            >

            <p class="text-sm text-gray-500 mt-1">
                Enter only the YouTube video ID, not the full URL.
            </p>
        </div>


        {{-- Music Foreign Key --}}
        <div>
            <label
                for="music_id"
                class="block font-semibold mb-2"
            >
                Select Music
            </label>

            <select
                id="music_id"
                name="music_id"
                class="w-full border p-2 rounded"
            >

                <option value="">
                    -- Select Music --
                </option>

                @foreach ($musics as $music)

                    <option
                        value="{{ $music->id }}"
                        {{ old('music_id') == $music->id ? 'selected' : '' }}
                    >
                        {{ $music->title }}
                        @if($music->artist)
                            — {{ $music->artist }}
                        @endif
                    </option>

                @endforeach

            </select>

            <p class="text-sm text-gray-500 mt-1">
                Select the music release this video belongs to.
            </p>
        </div>


        {{-- Submit --}}
        <div class="flex gap-3">

            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700"
            >
                Add Video
            </button>

            <a
                href="{{ route('admin.videos.index') }}"
                class="bg-gray-500 text-white px-5 py-2 rounded hover:bg-gray-600"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection

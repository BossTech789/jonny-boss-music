@extends('layouts.admin')

@section('title', 'Edit Video')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-8">

        <a
            href="{{ route('admin.videos.index') }}"
            class="text-sm text-gray-500"
        >
            ← Back to Videos
        </a>

        <h1 class="text-3xl font-black mt-3">
            Edit Video
        </h1>

    </div>


    <form
        method="POST"
        action="{{ route('admin.videos.update', $video) }}"
        class="bg-white rounded-2xl border shadow-sm p-6 space-y-6"
    >

        @csrf
        @method('PUT')


        <div>

            <label class="block text-sm font-semibold mb-2">
                Video Title *
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title', $video->title) }}"
                required
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                YouTube Video ID *
            </label>

            <input
                type="text"
                name="youtube_id"
                value="{{ old('youtube_id', $video->youtube_id) }}"
                required
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Related Music
            </label>

            <select
                name="music_id"
                class="w-full rounded-xl border-gray-300"
            >

                <option value="">
                    -- No music selected --
                </option>

                @foreach($musics as $music)

                    <option
                        value="{{ $music->id }}"
                        @selected(old('music_id', $video->music_id) == $music->id)
                    >
                        {{ $music->title }} — {{ $music->artist }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="aspect-video bg-black rounded-2xl overflow-hidden">

            <iframe
                src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                class="w-full h-full"
                title="{{ $video->title }}"
                allowfullscreen>
            </iframe>

        </div>


        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.videos.index') }}"
                class="px-5 py-3 rounded-xl border font-semibold"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-black text-white font-bold"
            >
                Update Video
            </button>

        </div>

    </form>

</div>

@endsection

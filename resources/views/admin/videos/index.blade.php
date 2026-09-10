@extends('layouts.admin')

@section('title', 'Videos')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>

            <p class="text-sm text-gray-500">
                YouTube videos
            </p>

            <h1 class="text-3xl font-black">
                Videos
            </h1>

        </div>

        <a
            href="{{ route('admin.videos.create') }}"
            class="bg-black text-white rounded-xl px-5 py-3 font-semibold"
        >
            + Add Video
        </a>

    </div>


    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">

        @if($videos->count())

            <div class="divide-y">

                @foreach($videos as $video)

                    <div class="p-6 flex flex-col md:flex-row md:items-center justify-between gap-5">

                        <div class="flex items-center gap-5">

                            <div class="w-28 aspect-video bg-black rounded-xl overflow-hidden">

                                <iframe
                                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                                    class="w-full h-full"
                                    title="{{ $video->title }}"
                                    loading="lazy"
                                    allowfullscreen>
                                </iframe>

                            </div>


                            <div>

                                <h2 class="font-bold">
                                    {{ $video->title }}
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $video->music?->title ?? 'No music linked' }}
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    YouTube ID: {{ $video->youtube_id }}
                                </p>

                            </div>

                        </div>


                        <div class="flex items-center gap-4">

                            <a
                                href="{{ route('admin.videos.edit', $video) }}"
                                class="font-semibold text-sm"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="{{ route('admin.videos.destroy', $video) }}"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="text-red-600 font-semibold text-sm"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


            <div class="p-5 border-t">
                {{ $videos->links() }}
            </div>

        @else

            <div class="p-12 text-center">

                <div class="text-5xl">
                    ▶
                </div>

                <h2 class="font-black text-xl mt-4">
                    No videos yet
                </h2>

                <p class="text-gray-500 mt-2">
                    Add your first YouTube video.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection

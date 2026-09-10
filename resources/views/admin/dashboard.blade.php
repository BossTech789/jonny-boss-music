
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <p class="text-sm text-gray-500">
                Welcome back
            </p>

            <h1 class="text-3xl font-black">
                Artist Dashboard
            </h1>
        </div>

        <a
            href="{{ route('home') }}"
            target="_blank"
            class="inline-flex items-center justify-center rounded-xl bg-black text-white px-5 py-3 font-semibold hover:bg-gray-800"
        >
            View Website
        </a>

    </div>


    <!-- Statistics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <div class="bg-white rounded-2xl p-6 shadow-sm border">

            <p class="text-sm text-gray-500">
                Music Releases
            </p>

            <p class="text-4xl font-black mt-2">
                {{ $stats['music'] }}
            </p>

            <a
                href="{{ route('admin.music.index') }}"
                class="inline-block mt-4 text-sm font-semibold"
            >
                Manage Music →
            </a>

        </div>


        <div class="bg-white rounded-2xl p-6 shadow-sm border">

            <p class="text-sm text-gray-500">
                Videos
            </p>

            <p class="text-4xl font-black mt-2">
                {{ $stats['videos'] }}
            </p>

            <a
                href="{{ route('admin.videos.index') }}"
                class="inline-block mt-4 text-sm font-semibold"
            >
                Manage Videos →
            </a>

        </div>


        <div class="bg-white rounded-2xl p-6 shadow-sm border">

            <p class="text-sm text-gray-500">
                Smart Links
            </p>

            <p class="text-4xl font-black mt-2">
                {{ $stats['smart_links'] }}
            </p>

            <a
                href="{{ route('admin.smart-links.index') }}"
                class="inline-block mt-4 text-sm font-semibold"
            >
                Manage Links →
            </a>

        </div>


        <div class="bg-white rounded-2xl p-6 shadow-sm border">

            <p class="text-sm text-gray-500">
                Active Fans
            </p>

            <p class="text-4xl font-black mt-2">
                {{ $stats['subscribers'] }}
            </p>

            <a
                href="{{ route('admin.subscribers.index') }}"
                class="inline-block mt-4 text-sm font-semibold"
            >
                View Fans →
            </a>

        </div>

    </div>


    <!-- Recent music -->
    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">

        <div class="p-6 border-b flex items-center justify-between">

            <h2 class="font-black text-xl">
                Recent Releases
            </h2>

            <a
                href="{{ route('admin.music.create') }}"
                class="bg-black text-white rounded-lg px-4 py-2 text-sm font-semibold"
            >
                + Add Music
            </a>

        </div>


        @if($latestMusic->count())

            <div class="divide-y">

                @foreach($latestMusic as $music)

                    <div class="p-5 flex items-center gap-4">

                        @if($music->image)

                            <img
                                src="{{ asset('storage/' . $music->image) }}"
                                alt="{{ $music->title }}"
                                class="w-16 h-16 rounded-xl object-cover"
                            >

                        @else

                            <div class="w-16 h-16 rounded-xl bg-gray-200 flex items-center justify-center">
                                🎵
                            </div>

                        @endif


                        <div class="flex-1">

                            <h3 class="font-bold">
                                {{ $music->title }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                {{ $music->artist }}
                                @if($music->type)
                                    · {{ $music->type }}
                                @endif
                            </p>

                        </div>


                        <a
                            href="{{ route('admin.music.edit', $music) }}"
                            class="text-sm font-semibold"
                        >
                            Edit
                        </a>

                    </div>

                @endforeach

            </div>

        @else

            <div class="p-10 text-center text-gray-500">
                No music releases yet.
            </div>

        @endif

    </div>


    <!-- Recent videos -->
    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="font-black text-xl">
                Recent Videos
            </h2>

        </div>


        @if($latestVideos->count())

            <div class="divide-y">

                @foreach($latestVideos as $video)

                    <div class="p-5 flex items-center justify-between gap-4">

                        <div>

                            <h3 class="font-bold">
                                {{ $video->title }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                {{ $video->music?->title ?? 'No music linked' }}
                            </p>

                        </div>

                        <a
                            href="{{ route('admin.videos.edit', $video) }}"
                            class="text-sm font-semibold"
                        >
                            Edit
                        </a>

                    </div>

                @endforeach

            </div>

        @else

            <div class="p-10 text-center text-gray-500">
                No videos yet.
            </div>

        @endif

    </div>

</div>

@endsection

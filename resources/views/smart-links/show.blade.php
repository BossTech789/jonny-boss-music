<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $smartLink->headline ?? $smartLink->music->title }}
        — {{ $smartLink->music->artist }}
    </title>

    <meta
        name="description"
        content="{{ $smartLink->description ?? 'Listen now on all platforms.' }}"
    >

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="min-h-screen bg-black text-white">

<div class="min-h-screen flex items-center justify-center px-5 py-12">

    <main class="w-full max-w-xl text-center">


        <!-- Cover -->
        @if($smartLink->music->image)

            <img
                src="{{ asset('storage/' . $smartLink->music->image) }}"
                alt="{{ $smartLink->music->title }}"
                class="w-64 h-64 sm:w-80 sm:h-80 object-cover rounded-2xl mx-auto shadow-2xl"
            >

        @endif


        <!-- Artist -->
        <p class="mt-8 uppercase tracking-[0.3em] text-sm text-gray-400">
            {{ $smartLink->music->artist }}
        </p>


        <!-- Title -->
        <h1 class="text-4xl sm:text-5xl font-black mt-3">
            {{ $smartLink->music->title }}
        </h1>


        @if($smartLink->music->type)

            <p class="text-gray-400 mt-2">
                {{ $smartLink->music->type }}
            </p>

        @endif


        @if($smartLink->headline)

            <p class="text-lg mt-5 font-semibold">
                {{ $smartLink->headline }}
            </p>

        @endif


        @if($smartLink->description)

            <p class="text-gray-400 mt-3">
                {{ $smartLink->description }}
            </p>

        @endif


        <!-- Streaming buttons -->
        <div class="mt-8 space-y-3">


            @if($smartLink->music->spotify_link)

                <a
                    href="{{ $smartLink->music->spotify_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block w-full rounded-xl bg-white text-black px-6 py-4 font-bold hover:bg-gray-200"
                >
                    Listen on Spotify
                </a>

            @endif


            @if($smartLink->music->apple_link)

                <a
                    href="{{ $smartLink->music->apple_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block w-full rounded-xl bg-white text-black px-6 py-4 font-bold hover:bg-gray-200"
                >
                    Listen on Apple Music
                </a>

            @endif


            @if($smartLink->music->audiomack_link)

                <a
                    href="{{ $smartLink->music->audiomack_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block w-full rounded-xl bg-white text-black px-6 py-4 font-bold hover:bg-gray-200"
                >
                    Listen on Audiomack
                </a>

            @endif


            @if($smartLink->music->amazon_link)

                <a
                    href="{{ $smartLink->music->amazon_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block w-full rounded-xl bg-white text-black px-6 py-4 font-bold hover:bg-gray-200"
                >
                    Listen on Amazon Music
                </a>

            @endif


            @if($smartLink->music->youtudemusic_link)

                <a
                    href="{{ $smartLink->music->youtudemusic_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block w-full rounded-xl bg-white text-black px-6 py-4 font-bold hover:bg-gray-200"
                >
                    Listen on YouTube Music
                </a>

            @endif


            @if($smartLink->music->boomplay_link)

                <a
                    href="{{ $smartLink->music->boomplay_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block w-full rounded-xl bg-white text-black px-6 py-4 font-bold hover:bg-gray-200"
                >
                    Listen on Boomplay
                </a>

            @endif

        </div>


        <!-- Videos -->
        @if($smartLink->music->videos->count())

            <section class="mt-12 text-left">

                <h2 class="text-2xl font-black mb-5">
                    Watch
                </h2>


                <div class="space-y-8">

                    @foreach($smartLink->music->videos as $video)

                        <div>

                            <div class="aspect-video rounded-2xl overflow-hidden bg-gray-900">

                                <iframe
                                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                                    title="{{ $video->title }}"
                                    class="w-full h-full"
                                    loading="lazy"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>

                            </div>


                            <h3 class="font-bold mt-3">
                                {{ $video->title }}
                            </h3>

                        </div>

                    @endforeach

                </div>

            </section>

        @endif


        <footer class="mt-12 text-sm text-gray-500">
            © {{ date('Y') }} {{ $smartLink->music->artist }}
        </footer>

    </main>

</div>

</body>

</html>

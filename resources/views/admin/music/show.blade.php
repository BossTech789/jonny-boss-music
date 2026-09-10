@extends('layouts.admin')

@section('title', $music->title)

@section('content')

<div class="admin-container">

    <div class="page-header">

        <div>
            <h1>{{ $music->title }}</h1>

            <p>
                {{ $music->artist }}
            </p>
        </div>

        <div class="action-buttons">

            <a
                href="{{ route('admin.music.edit', $music) }}"
                class="btn btn-edit"
            >
                Edit
            </a>

            <a
                href="{{ route('admin.music.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>


    <div class="music-details">

        @if($music->image)

            <img
                src="{{ asset('storage/' . $music->image) }}"
                alt="{{ $music->title }}"
                class="music-cover"
            >

        @endif


        <div class="music-information">

            <h2>
                {{ $music->title }}
            </h2>

            <p>
                <strong>Artist:</strong>
                {{ $music->artist }}
            </p>

            @if($music->type)

                <p>
                    <strong>Type:</strong>
                    {{ $music->type }}
                </p>

            @endif

            @if($music->year)

                <p>
                    <strong>Year:</strong>
                    {{ $music->year }}
                </p>

            @endif


            <h3>Streaming Links</h3>

            @if($music->spotify_link)
                <a href="{{ $music->spotify_link }}" target="_blank">
                    Spotify
                </a>
            @endif

            @if($music->apple_link)
                <a href="{{ $music->apple_link }}" target="_blank">
                    Apple Music
                </a>
            @endif

            @if($music->audiomack_link)
                <a href="{{ $music->audiomack_link }}" target="_blank">
                    Audiomack
                </a>
            @endif

            @if($music->amazon_link)
                <a href="{{ $music->amazon_link }}" target="_blank">
                    Amazon Music
                </a>
            @endif

            @if($music->youtudemusic_link)
                <a href="{{ $music->youtudemusic_link }}" target="_blank">
                    YouTube Music
                </a>
            @endif

            @if($music->boomplay_link)
                <a href="{{ $music->boomplay_link }}" target="_blank">
                    Boomplay
                </a>
            @endif

        </div>

    </div>


    @if($music->videos->count())

        <div class="related-videos">

            <h2>Related Videos</h2>

            @foreach($music->videos as $video)

                <div class="video-item">

                    <h3>
                        {{ $video->title }}
                    </h3>

                    <a
                        href="https://www.youtube.com/watch?v={{ $video->youtube_id }}"
                        target="_blank"
                    >
                        Watch Video
                    </a>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection

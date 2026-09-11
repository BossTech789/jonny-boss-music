@extends('layouts.frontend')

@section('title', 'Music | Jonny Boss')

@section('content')

<section class="music-page">

```
<div class="section-heading">

    <p class="section-label">
        DISCOGRAPHY
    </p>

    <h2>
        All Music
    </h2>

    <p>
        Explore the complete Jonny Boss music collection.
    </p>

</div>


<div class="music-grid">

    @forelse($musics as $song)

        <article class="music-card">

            <div class="music-image">

                @if($song->image)

                    <img
                        src="{{ asset('storage/' . $song->image) }}"
                        alt="{{ $song->title }}"
                        loading="lazy"
                    >

                @else

                    <img
                        src="{{ asset('images/default-music.jpg') }}"
                        alt="{{ $song->title }}"
                        loading="lazy"
                    >

                @endif

            </div>


            <div class="music-card-content">

                @if($song->type)

                    <p class="card-type">
                        {{ $song->type }}
                    </p>

                @endif


                <h3>
                    {{ $song->title }}
                </h3>


                <p class="artist">
                    {{ $song->artist }}
                </p>


                <div class="music-links">

                    @if($song->spotify_link)

                        <a
                            href="{{ $song->spotify_link }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Spotify
                        </a>

                    @endif


                    @if($song->apple_link)

                        <a
                            href="{{ $song->apple_link }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Apple Music
                        </a>

                    @endif


                    @if($song->audiomack_link)

                        <a
                            href="{{ $song->audiomack_link }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Audiomack
                        </a>

                    @endif


                    @if($song->amazon_link)

                        <a
                            href="{{ $song->amazon_link }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Amazon
                        </a>

                    @endif


                    @if($song->youtudemusic_link)

                        <a
                            href="{{ $song->youtudemusic_link }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            YouTube Music
                        </a>

                    @endif


                    @if($song->boomplay_link)

                        <a
                            href="{{ $song->boomplay_link }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Boomplay
                        </a>

                    @endif

                </div>

            </div>

        </article>

    @empty

        <div class="empty-content">

            <p>
                No music has been released yet.
            </p>

        </div>

    @endforelse

</div>
```

</section>

@endsection

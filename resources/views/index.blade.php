@extends('layouts.frontend')

@section('title', 'Jonny Boss | Official Website')

@section('content')

{{-- =====================================================
HERO
===================================================== --}}

<section class="hero">

```
<div class="hero-overlay"></div>

<div class="hero-content">

    <p class="hero-small">
        OFFICIAL WEBSITE
    </p>

    <h1>
        JONNY BOSS
    </h1>

    <p>
        Real music. Real emotion.
    </p>

    <div class="hero-buttons">

        <a href="{{ route('music') }}" class="btn btn-primary">
            Explore Music
        </a>

        <a href="{{ route('video') }}" class="btn btn-outline">
            Watch Videos
        </a>

    </div>

</div>
```

</section>

{{-- =====================================================
MUSIC
===================================================== --}}

<section class="music-section home-section">

```
<div class="section-heading">

    <p class="section-label">
        MUSIC
    </p>

    <h2>
        Latest Music
    </h2>

    <p>
        Discover the latest music from Jonny Boss.
    </p>

</div>


<div class="music-grid">

    @forelse($music as $song)

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


                @if($song->artist)

                    <p class="artist">
                        {{ $song->artist }}
                    </p>

                @endif


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


<div class="section-button">

    <a
        href="{{ route('music') }}"
        class="btn btn-outline"
    >
        View All Music
    </a>

</div>
```

</section>

{{-- =====================================================
VIDEOS
===================================================== --}}

<section class="video-section home-section">

```
<div class="section-heading">

    <p class="section-label">
        VIDEOS
    </p>

    <h2>
        Latest Videos
    </h2>

    <p>
        Watch the latest videos from Jonny Boss.
    </p>

</div>


<div class="video-grid">

    @forelse($videos as $video)

        <article class="video-card">

            <div class="video-image">

                @if($video->music && $video->music->image)

                    <img
                        src="{{ asset('storage/' . $video->music->image) }}"
                        alt="{{ $video->title }}"
                        loading="lazy"
                    >

                @else

                    <img
                        src="{{ asset('images/default-image.png') }}"
                        alt="{{ $video->title }}"
                        loading="lazy"
                    >

                @endif


                <a
                    href="https://www.youtube.com/watch?v={{ $video->youtube_id }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="video-play"
                    aria-label="Watch {{ $video->title }} on YouTube"
                >
                    ▶
                </a>

            </div>


            <div class="video-card-content">

                <p class="card-type">
                    Music Video
                </p>


                <h3>
                    {{ $video->title }}
                </h3>


                @if($video->music && $video->music->artist)

                    <p class="artist">
                        {{ $video->music->artist }}
                    </p>

                @endif

            </div>

        </article>

    @empty

        <div class="empty-content">

            <p>
                No videos available yet.
            </p>

        </div>

    @endforelse

</div>


<div class="section-button">

    <a
        href="{{ route('video') }}"
        class="btn btn-outline"
    >
        View All Videos
    </a>

</div>
```

</section>


{{-- =====================================================
NEWSLETTER
===================================================== --}}

<section class="newsletter-section" id="newsletter-section">

```
<div class="newsletter-container">

    <div class="section-heading">

        <p class="section-label">
            NEWSLETTER
        </p>

        <h2>
            Stay Updated
        </h2>

        <p>
            Subscribe to receive new music, videos and updates
            from Jonny Boss.
        </p>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-error">
            {{ session('error') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-error">

            @foreach($errors->all() as $error)

                <p>
                    {{ $error }}
                </p>

            @endforeach

        </div>

    @endif


    <form
        action="{{ url('/subscribe') }}"
        method="POST"
        class="newsletter-form"
    >

        @csrf

        <div class="form-group">

            <label for="newsletter-name">
                Name
            </label>

            <input
                type="text"
                id="newsletter-name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Your name"
            >

        </div>


        <div class="form-group">

            <label for="newsletter-email">
                Email Address
            </label>

            <input
                type="email"
                id="newsletter-email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Your email address"
                required
            >

        </div>


        <button
            type="submit"
            class="btn btn-primary"
        >
            Subscribe
        </button>

    </form>

</div>
```

</section>

@endsection


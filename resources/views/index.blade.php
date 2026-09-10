@extends('layouts.frontend')

@section('title', 'Jonny Boss | Official Website')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}

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

        <a href="{{ route('music') }}"
           class="btn btn-primary">
            Explore Music
        </a>

        <a href="{{ route('video') }}"
           class="btn btn-outline">
            Watch Videos
        </a>

    </div>

</div>
```

</section>

{{-- =========================
MUSIC SECTION
========================= --}}

<section class="home-section music-section">

```
<div class="section-heading">

    <p class="section-label">
        LATEST RELEASES
    </p>

    <h2>
        Music
    </h2>

    <p>
        Listen to the latest releases from Jonny Boss.
    </p>

</div>


{{-- MUSIC CARDS --}}
<div class="home-grid music-grid">

    @forelse($music as $song)

        <article class="music-card">

            <div class="music-image">

                @if($song->image)

                    <img
                        src="{{ asset('storage/' . $song->image) }}"
                        alt="{{ $song->title }}"
                    >

                @else

                    <img
                        src="{{ asset('images/default-music.jpg') }}"
                        alt="{{ $song->title }}"
                    >

                @endif

            </div>


            <div class="music-card-content">

                <p class="card-type">
                    {{ $song->type }}
                </p>

                <h3>
                    {{ $song->title }}
                </h3>

                <p class="artist">
                    {{ $song->artist }}
                </p>


                <div class="music-links">

                    @if($song->spotify_link)

                        <a href="{{ $song->spotify_link }}"
                           target="_blank">
                            Spotify
                        </a>

                    @endif

                    @if($song->apple_link)

                        <a href="{{ $song->apple_link }}"
                           target="_blank">
                            Apple Music
                        </a>

                    @endif

                    @if($song->audiomack_link)

                        <a href="{{ $song->apple_link }}"
                           target="_blank">
                            AudioMack
                        </a>

                    @endif

                </div>

            </div>

        </article>

    @empty

        <div class="empty-content">

            <p>
                No music available yet.
            </p>

        </div>

    @endforelse

</div>


{{-- VIEW ALL MUSIC --}}
<div class="section-button">

    <a href="{{ route('music') }}"
       class="btn btn-primary">

        View All Music

    </a>

</div>
```

</section>

{{-- =========================
VIDEO SECTION
========================= --}}

<section class="home-section video-section">

```
<div class="section-heading">

    <p class="section-label">
        WATCH
    </p>

    <h2>
        Videos
    </h2>

    <p>
        Watch official music videos and visual content.
    </p>

</div>


{{-- VIDEO CARDS --}}
<div class="home-grid video-grid">

    @forelse($videos as $video)

    <article class="video-card">

        <div class="video-image">

            {{-- Use the related music cover image --}}
            @if($video->music && $video->music->image)

                <img
                    src="{{ asset('storage/' . $video->music->image) }}"
                    alt="{{ $video->title }}"
                >

            @else

                <div class="video-placeholder">
                    VIDEO
                </div>

            @endif


            {{-- Play button --}}
            @if($video->youtube_id)

                <a
                    href="https://www.youtube.com/watch?v={{ $video->youtube_id }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="play-button"
                    aria-label="Watch {{ $video->title }}"
                >
                    ▶
                </a>

            @endif

        </div>


        <div class="video-card-content">

            <p class="card-type">
                Music Video
            </p>

            <h3>
                {{ $video->title }}
            </h3>




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


{{-- VIEW ALL VIDEOS --}}
<div class="section-button">

    <a href="{{ route('video') }}"
       class="btn btn-primary">

        View All Videos

    </a>

</div>
```

</section>

{{-- =========================
NEWSLETTER
========================= --}}

<section class="contact"
         id="contact-section">

```
<div class="section-heading">

    <p class="section-label">
        STAY CONNECTED
    </p>

    <h2>
        Newsletter
    </h2>

    <p>
        Sign up for exclusive updates, first access
        to tickets, and more from Jonny Boss.
    </p>

</div>


<form action="{{ route('subscribe') }}"
      method="POST"
      class="newsletter-form">

    @csrf

    <input
        type="text"
        name="name"
        placeholder="Your Name"
        value="{{ old('name') }}"
        required
    >

    <input
        type="email"
        name="email"
        placeholder="Your Email"
        value="{{ old('email') }}"
        required
    >

    <button type="submit">
        Subscribe
    </button>

</form>
```

</section>

@endsection

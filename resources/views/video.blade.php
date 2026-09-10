@extends('layouts.frontend')

@section('title', 'Videos | Jonny Boss')

@section('content')

<section class="video-page">

    <div class="section-heading">

        <p class="section-label">
            WATCH
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

                <div class="video-wrapper">

                    @if($video->youtube_id)

                        <iframe
                            src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                            title="{{ $video->title }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>

                    @else

                        <div class="video-placeholder">
                            VIDEO
                        </div>

                    @endif

                </div>


                <div class="video-info">

                    <h3>
                        {{ $video->title }}
                    </h3>

                    @if($video->music)

                        <p>
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

</section>

@endsection

<!DOCTYPE html>

<html lang="en">


<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link rel="icon"
          href="{{ asset('assets/favicon.png') }}?v=2"
          type="image/png">

    <link rel="shortcut icon"
          href="{{ asset('assets/favicon.png') }}?v=2"
          type="image/png">

    <meta name="description"
          content="Jonny Boss - Official Music Website">

    <meta name="author"
          content="Jonny Boss">

    <title>
        @yield('title', 'Jonny Boss | Official Website')
    </title>

    @vite('resources/css/frontend.css')

    @stack('styles')

</head>

<body>
    
{{-- =====================================================
     HEADER
====================================================== --}}

<header class="site-header">

    <div class="header-container">

        {{-- LOGO --}}

        <a
            href="{{ route('home') }}"
            class="logo"
            aria-label="Jonny Boss Home"
        >
            JB
        </a>


        {{-- MOBILE MENU BUTTON --}}

        <button
            type="button"
            class="hamburger"
            id="hamburger"
            aria-label="Toggle navigation menu"
            aria-controls="mainNav"
            aria-expanded="false"
        >

            <span></span>
            <span></span>
            <span></span>

        </button>


        {{-- NAVIGATION --}}

        <nav
            class="main-nav"
            id="mainNav"
            aria-label="Main navigation"
        >

            <ul class="nav-list">

                <li>
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('music') }}">
                        Music
                    </a>
                </li>

                <li>
                    <a href="{{ route('video') }}">
                        Videos
                    </a>
                </li>

                <li>
                    <a href="{{ route('home') }}#newsletter-section">
                        Newsletter
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</header>


{{-- =====================================================
     MAIN CONTENT
====================================================== --}}

<main>

    @yield('content')

</main>


{{-- =====================================================
     FOOTER
====================================================== --}}

<footer class="site-footer">

    <div class="footer-content">

        <div class="footer-social">

            <a
                href="https://www.facebook.com/realjonnyboss1"
                target="_blank"
                rel="noopener noreferrer"
            >
                Facebook
            </a>


            <a
                href="https://twitter.com/realjonnyboss"
                target="_blank"
                rel="noopener noreferrer"
            >
                X
            </a>


            <a
                href="https://www.instagram.com/realjonnyboss/"
                target="_blank"
                rel="noopener noreferrer"
            >
                Instagram
            </a>


            <a
                href="https://www.youtube.com/@realjonnyboss"
                target="_blank"
                rel="noopener noreferrer"
            >
                YouTube
            </a>


            <a
                href="https://open.spotify.com/artist/7qy2Fy69zpEJVrWqU2CrlF"
                target="_blank"
                rel="noopener noreferrer"
            >
                Spotify
            </a>


            <a
                href="https://music.apple.com/us/artist/jonny-boss/1625954922"
                target="_blank"
                rel="noopener noreferrer"
            >
                Apple Music
            </a>


            <a
                href="https://music.amazon.com/artists/B0B27HG8QQ/jonny-boss"
                target="_blank"
                rel="noopener noreferrer"
            >
                Amazon Music
            </a>


            <a
                href="https://audiomack.com/realjonnyboss"
                target="_blank"
                rel="noopener noreferrer"
            >
                Audiomack
            </a>


            <a
                href="https://www.boomplay.com/share/artist/EQJHLx6xqKRECt7BB7ioTwcw"
                target="_blank"
                rel="noopener noreferrer"
            >
                Boomplay
            </a>


            <a
                href="https://snapchat.com/add/realjonnyboss"
                target="_blank"
                rel="noopener noreferrer"
            >
                Snapchat
            </a>

        </div>


        <p class="copyright">

            &copy; {{ date('Y') }} Jonny Boss Music.
            All rights reserved.

        </p>

    </div>

</footer>


{{-- =====================================================
     MOBILE NAVIGATION
====================================================== --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const hamburger =
            document.getElementById('hamburger');

        const mainNav =
            document.getElementById('mainNav');


        if (!hamburger || !mainNav) {
            return;
        }


        /* ---------------------------------------------
           OPEN / CLOSE MENU
        --------------------------------------------- */

        hamburger.addEventListener('click', function (event) {

            event.stopPropagation();

            const isOpen =
                mainNav.classList.toggle('active');

            hamburger.classList.toggle('active');

            hamburger.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );

        });


        /* ---------------------------------------------
           CLOSE MENU AFTER CLICKING A LINK
        --------------------------------------------- */

        const navLinks =
            document.querySelectorAll('.nav-list a');


        navLinks.forEach(function (link) {

            link.addEventListener('click', function () {

                mainNav.classList.remove('active');

                hamburger.classList.remove('active');

                hamburger.setAttribute(
                    'aria-expanded',
                    'false'
                );

            });

        });


        /* ---------------------------------------------
           CLOSE MENU WHEN CLICKING OUTSIDE
        --------------------------------------------- */

        document.addEventListener('click', function (event) {

            if (!mainNav.classList.contains('active')) {
                return;
            }


            const clickedInsideNav =
                mainNav.contains(event.target);

            const clickedHamburger =
                hamburger.contains(event.target);


            if (
                !clickedInsideNav &&
                !clickedHamburger
            ) {

                mainNav.classList.remove('active');

                hamburger.classList.remove('active');

                hamburger.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }

        });


        /* ---------------------------------------------
           CLOSE MENU WITH ESCAPE KEY
        --------------------------------------------- */

        document.addEventListener('keydown', function (event) {

            if (
                event.key === 'Escape' &&
                mainNav.classList.contains('active')
            ) {

                mainNav.classList.remove('active');

                hamburger.classList.remove('active');

                hamburger.setAttribute(
                    'aria-expanded',
                    'false'
                );

                hamburger.focus();

            }

        });

    });

</script>


@stack('scripts')

</body>

</html>

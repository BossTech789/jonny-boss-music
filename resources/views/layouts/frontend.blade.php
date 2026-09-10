<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Jonny Boss - Official Music Website">

    <meta name="author"
          content="Jonny Boss">

    <title>
        @yield('title', 'Jonny Boss Music')
    </title>

    <!-- Favicon -->
  <link rel="shortcut icon" href="public/assets/favicon.png">


    {{-- Main Website CSS --}}
    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">


    {{-- Page-specific CSS --}}
    @stack('styles')

</head>


<body>


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <header class="site-header">

        <div class="header-container">


            {{-- LOGO --}}

            <a href="{{ route('home') }}"
               class="logo"
               aria-label="Jonny Boss Home">

                JB

            </a>


            {{-- MOBILE MENU BUTTON --}}

            <button
                class="hamburger"
                id="hamburger"
                type="button"
                aria-label="Open navigation"
                aria-controls="mainNav"
                aria-expanded="false">

                <span></span>
                <span></span>
                <span></span>

            </button>


            {{-- NAVIGATION --}}

            <nav
                class="main-nav"
                id="mainNav"
                aria-label="Main navigation">

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
                        <a href="{{ route('home') }}#contact-section">
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


            {{-- SOCIAL LINKS --}}

            <div class="footer-social">


                {{-- Facebook --}}

                <a
                    href="https://www.facebook.com/realjonnyboss1"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Facebook"
                    title="Facebook">

                    Facebook

                </a>


                {{-- Twitter / X --}}

                <a
                    href="https://twitter.com/realjonnyboss"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Twitter"
                    title="Twitter">

                    X

                </a>


                {{-- Instagram --}}

                <a
                    href="https://www.instagram.com/realjonnyboss/"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Instagram"
                    title="Instagram">

                    Instagram

                </a>


                {{-- YouTube --}}

                <a
                    href="https://www.youtube.com/@realjonnyboss"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="YouTube"
                    title="YouTube">

                    YouTube

                </a>


                {{-- Spotify --}}

                <a
                    href="https://open.spotify.com/artist/7qy2Fy69zpEJVrWqU2CrlF"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Spotify"
                    title="Spotify">

                    Spotify

                </a>


                {{-- Apple Music --}}

                <a
                    href="https://music.apple.com/us/artist/jonny-boss/1625954922"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Apple Music"
                    title="Apple Music">

                    Apple Music

                </a>


                {{-- Amazon Music --}}

                <a
                    href="https://music.amazon.com/artists/B0B27HG8QQ/jonny-boss?marketplaceId=ATVPDKIKX0DER&musicTerritory=US&ref=dm_sh_DbZ2B0ddEewStnjOXOyTJrEbR"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Amazon Music"
                    title="Amazon Music">

                    Amazon Music

                </a>


                {{-- Audiomack --}}

                <a
                    href="https://audiomack.com/realjonnyboss"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Audiomack"
                    title="Audiomack">

                    Audiomack

                </a>


                {{-- Boomplay --}}

                <a
                    href="https://www.boomplay.com/share/artist/EQJHLx6xqKRECt7BB7ioTwcw"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Boomplay"
                    title="Boomplay">

                    Boomplay

                </a>


                {{-- Snapchat --}}

                <a
                    href="https://snapchat.com/add/realjonnyboss"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Snapchat"
                    title="Snapchat">

                    Snapchat

                </a>

            </div>


            {{-- COPYRIGHT --}}

            <p class="copyright">

                &copy; {{ date('Y') }} Jonny Boss Music.

                All rights reserved.

            </p>

        </div>

    </footer>



    {{-- =====================================================
         JAVASCRIPT
    ====================================================== --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const hamburger = document.getElementById('hamburger');
            const mainNav = document.getElementById('mainNav');


            /*
            |--------------------------------------------------------------------------
            | MOBILE NAVIGATION
            |--------------------------------------------------------------------------
            */

            if (hamburger && mainNav) {

                hamburger.addEventListener('click', function () {

                    const isOpen =
                        mainNav.classList.toggle('active');

                    hamburger.classList.toggle('active');

                    hamburger.setAttribute(
                        'aria-expanded',
                        isOpen ? 'true' : 'false'
                    );

                });


                /*
                |--------------------------------------------------------------------------
                | CLOSE MENU WHEN LINK IS CLICKED
                |--------------------------------------------------------------------------
                */

                document
                    .querySelectorAll('.nav-list a')
                    .forEach(function (link) {

                        link.addEventListener('click', function () {

                            mainNav.classList.remove('active');

                            hamburger.classList.remove('active');

                            hamburger.setAttribute(
                                'aria-expanded',
                                'false'
                            );

                        });

                    });

            }


            /*
            |--------------------------------------------------------------------------
            | CLOSE MOBILE MENU WHEN CLICKING OUTSIDE
            |--------------------------------------------------------------------------
            */

            document.addEventListener('click', function (event) {

                if (!hamburger || !mainNav) {
                    return;
                }

                const clickedInsideNav =
                    mainNav.contains(event.target);

                const clickedHamburger =
                    hamburger.contains(event.target);


                if (
                    mainNav.classList.contains('active') &&
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

        });

    </script>


    {{-- Page-specific JavaScript --}}
    @stack('scripts')


</body>

</html>

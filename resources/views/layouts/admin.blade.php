<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon"
          href="{{ asset('favicon.png') }}"
          type="image/png">

    <title>
        @yield('title', 'Admin')
        - {{ config('app.name', 'Jonny Boss') }}
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
</head>

<body class="bg-gray-100 text-gray-900 antialiased">

    <!-- Mobile menu checkbox -->
    <input
        type="checkbox"
        id="mobile-menu-toggle"
        class="peer hidden"
    >

    <!-- NAVBAR -->
    <header class="bg-black text-white shadow-lg">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="h-20 flex items-center justify-between">

                <!-- Logo -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3"
                >

                    @if(file_exists(public_path('favicon.png')))

                        <img
                            src="{{ asset('favicon.png') }}"
                            alt="Jonny Boss"
                            class="w-10 h-10 rounded-full object-cover"
                        >

                    @endif

                    <div>
                        <div class="font-black text-lg tracking-tight">
                            JONNY BOSS
                        </div>

                        <div class="text-xs text-gray-400 uppercase tracking-widest">
                            Admin
                        </div>
                    </div>

                </a>


                <!-- Desktop navigation -->
                <nav class="hidden lg:flex items-center gap-7">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="text-sm font-medium hover:text-gray-300"
                    >
                        Dashboard
                    </a>


                    <a
                        href="{{ route('admin.music.index') }}"
                        class="text-sm font-medium hover:text-gray-300"
                    >
                        Music
                    </a>

                    <a
                        href="{{ route('admin.videos.index') }}"
                        class="text-sm font-medium hover:text-gray-300"
                    >
                        Videos
                    </a>

                    <a
                        href="{{ route('admin.smart-links.index') }}"
                        class="text-sm font-medium hover:text-gray-300"
                    >
                        Smart Links
                    </a>

                    <a
                        href="{{ route('admin.hero.edit') }}"
                        class="text-sm font-medium hover:text-gray-300"
                    >
                        Hero
                    </a>

                    <a
                        href="{{ route('admin.newsletters.index') }}"
                        class="text-sm font-medium hover:text-gray-300"
                    >
                        Newsletter
                    </a>

                    <a
                        href="{{ route('admin.subscribers.index') }}"
                        class="text-sm font-medium hover:text-gray-300"
                    >
                        Fans
                    </a>

                    <a
                        href="{{ route('admin.settings.edit') }}"
                        class="text-sm font-medium hover:text-gray-300"
                    >
                        Settings
                    </a>

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="text-sm text-red-400 hover:text-red-300"
                        >
                            Logout
                        </button>

                    </form>

                </nav>


                <!-- Mobile button -->
                <label
                    for="mobile-menu-toggle"
                    class="lg:hidden cursor-pointer"
                >

                    <span class="text-2xl">
                        ☰
                    </span>

                </label>

            </div>

        </div>


        <!-- Mobile navigation -->
        <div class="hidden peer-checked:block lg:hidden border-t border-gray-800">

            <nav class="px-6 py-5 space-y-4">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="block"
                >
                    Dashboard
                </a>

                <a
                    href="{{ route('admin.music.index') }}"
                    class="block"
                >
                    Music
                </a>

                <a
                    href="{{ route('admin.videos.index') }}"
                    class="block"
                >
                    Videos
                </a>

                <a
                    href="{{ route('admin.smart-links.index') }}"
                    class="block"
                >
                    Smart Links
                </a>

                <a
                    href="{{ route('admin.hero.edit') }}"
                    class="block"
                >
                    Hero
                </a>

                <a
                    href="{{ route('admin.newsletters.index') }}"
                    class="block"
                >
                    Newsletter
                </a>

                <a
                    href="{{ route('admin.subscribers.index') }}"
                    class="block"
                >
                    Fans
                </a>

                <a
                    href="{{ route('admin.settings.edit') }}"
                    class="block"
                >
                    Settings
                </a>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="text-red-400"
                    >
                        Logout
                    </button>

                </form>

            </nav>

        </div>

    </header>


    <!-- PAGE -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if(session('success'))

            <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4 text-green-800">
                {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4 text-red-800">
                {{ session('error') }}
            </div>

        @endif


        @if($errors->any())

            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4">

                <div class="font-bold text-red-800 mb-2">
                    Please fix the following:
                </div>

                <ul class="list-disc ml-5 text-red-700 text-sm space-y-1">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        @yield('content')

    </main>


    @stack('scripts')

</body>

</html>

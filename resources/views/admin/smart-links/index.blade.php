@extends('layouts.admin')

@section('title', 'Smart Links')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>

            <p class="text-sm text-gray-500">
                Music landing pages
            </p>

            <h1 class="text-3xl font-black">
                Smart Links
            </h1>

        </div>

        <a
            href="{{ route('admin.smart-links.create') }}"
            class="bg-black text-white rounded-xl px-5 py-3 font-semibold"
        >
            + Create Smart Link
        </a>

    </div>


    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">

        @if($smartLinks->count())

            <div class="divide-y">

                @foreach($smartLinks as $smartLink)

                    <div class="p-6 flex flex-col md:flex-row md:items-center gap-5">

                        @if($smartLink->music?->image)

                            <img
                                src="{{ asset('storage/' . $smartLink->music->image) }}"
                                class="w-20 h-20 rounded-xl object-cover"
                                alt="{{ $smartLink->music->title }}"
                            >

                        @else

                            <div class="w-20 h-20 rounded-xl bg-gray-200 flex items-center justify-center">
                                🎵
                            </div>

                        @endif


                        <div class="flex-1">

                            <h2 class="font-black text-lg">
                                {{ $smartLink->music?->title ?? 'No music' }}
                            </h2>

                            <p class="text-sm text-gray-500">
                                {{ $smartLink->headline ?? 'Smart Link' }}
                            </p>

                            <a
                                href="{{ route('smart-links.show', $smartLink->slug) }}"
                                target="_blank"
                                class="text-sm text-blue-600 break-all"
                            >
                                /listen/{{ $smartLink->slug }}
                            </a>

                        </div>


                        <div>

                            @if($smartLink->is_active)

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                    ACTIVE
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-500 text-xs font-bold">
                                    OFF
                                </span>

                            @endif

                        </div>


                        <div class="flex gap-3">

                            <a
                                href="{{ route('admin.smart-links.edit', $smartLink) }}"
                                class="font-semibold text-sm"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="{{ route('admin.smart-links.destroy', $smartLink) }}"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="text-red-600 font-semibold text-sm"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


            <div class="p-5 border-t">
                {{ $smartLinks->links() }}
            </div>

        @else

            <div class="p-12 text-center">

                <div class="text-5xl">
                    🔗
                </div>

                <h2 class="text-xl font-black mt-4">
                    No Smart Links
                </h2>

                <p class="text-gray-500 mt-2">
                    Create a SmartLink for a music release.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection

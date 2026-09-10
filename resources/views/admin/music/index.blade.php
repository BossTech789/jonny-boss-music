@extends('layouts.admin')

@section('title', 'Music')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>

            <p class="text-sm text-gray-500">
                Manage releases
            </p>

            <h1 class="text-3xl font-black">
                Music
            </h1>

        </div>

        <a
            href="{{ route('admin.music.create') }}"
            class="bg-black text-white rounded-xl px-5 py-3 font-semibold"
        >
            + Add Music
        </a>

    </div>


    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">

        @if($musics->count())

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b">

                        <tr>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Release
                            </th>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Type
                            </th>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Year
                            </th>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Smart Link
                            </th>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y">

                        @foreach($musics as $music)

                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

                                        @if($music->image)

                                            <img
                                                src="{{ asset('storage/' . $music->image) }}"
                                                class="w-14 h-14 rounded-xl object-cover"
                                                alt="{{ $music->title }}"
                                            >

                                        @else

                                            <div class="w-14 h-14 bg-gray-200 rounded-xl flex items-center justify-center">
                                                🎵
                                            </div>

                                        @endif


                                        <div>

                                            <div class="font-bold">
                                                {{ $music->title }}
                                            </div>

                                            <div class="text-sm text-gray-500">
                                                {{ $music->artist }}
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <td class="px-6 py-5 text-sm">
                                    {{ $music->type ?? '—' }}
                                </td>


                                <td class="px-6 py-5 text-sm">
                                    {{ $music->year ?? '—' }}
                                </td>


                                <td class="px-6 py-5">

                                    @if($music->smartLink)

                                        <a
                                            href="{{ route('smart-links.show', $music->smartLink->slug) }}"
                                            target="_blank"
                                            class="text-green-600 font-semibold text-sm"
                                        >
                                            View
                                        </a>

                                    @else

                                        <span class="text-gray-400 text-sm">
                                            Not created
                                        </span>

                                    @endif

                                </td>


                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <a
                                            href="{{ route('admin.music.edit', $music) }}"
                                            class="text-sm font-semibold"
                                        >
                                            Edit
                                        </a>

                                        <form
                                method="POST"
    action="{{ route('admin.music.destroy', $music) }}"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="text-sm text-red-600 font-semibold"
    >
        Delete
    </button>
</form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <div class="p-5 border-t">
                {{ $musics->links() }}
            </div>

        @else

            <div class="p-12 text-center">

                <div class="text-5xl mb-4">
                    🎵
                </div>

                <h2 class="text-xl font-black">
                    No music yet
                </h2>

                <p class="text-gray-500 mt-2">
                    Add your first release.
                </p>

                <a
                    href="{{ route('admin.music.create') }}"
                    class="inline-block mt-5 bg-black text-white rounded-xl px-5 py-3 font-semibold"
                >
                    Add Music
                </a>

            </div>

        @endif

    </div>

</div>

@endsection

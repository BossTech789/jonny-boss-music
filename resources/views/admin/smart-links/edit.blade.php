@extends('layouts.admin')

@section('title', 'Edit Smart Link')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-8">

        <a
            href="{{ route('admin.smart-links.index') }}"
            class="text-sm text-gray-500"
        >
            ← Back to Smart Links
        </a>

        <h1 class="text-3xl font-black mt-3">
            Edit Smart Link
        </h1>

    </div>


    <form
        method="POST"
        action="{{ route('admin.smart-links.update', $smartLink) }}"
        class="bg-white rounded-2xl border shadow-sm p-6 space-y-6"
    >

        @csrf
        @method('PUT')


        <div>

            <label class="block text-sm font-semibold mb-2">
                Music Release *
            </label>

            <select
                name="music_id"
                required
                class="w-full rounded-xl border-gray-300"
            >

                @foreach($musics as $music)

                    <option
                        value="{{ $music->id }}"
                        @selected(old('music_id', $smartLink->music_id) == $music->id)
                    >
                        {{ $music->title }} — {{ $music->artist }}
                    </option>

                @endforeach

            </select>

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                URL Slug *
            </label>

            <div class="flex">

                <span class="bg-gray-100 border border-r-0 rounded-l-xl px-4 flex items-center text-gray-500">
                    /listen/
                </span>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug', $smartLink->slug) }}"
                    required
                    class="flex-1 rounded-r-xl border-gray-300"
                >

            </div>

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Headline
            </label>

            <input
                type="text"
                name="headline"
                value="{{ old('headline', $smartLink->headline) }}"
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Description
            </label>

            <textarea
                name="description"
                rows="5"
                class="w-full rounded-xl border-gray-300"
            >{{ old('description', $smartLink->description) }}</textarea>

        </div>


        <div>

            <label class="inline-flex items-center gap-3">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    @checked(old('is_active', $smartLink->is_active))
                    class="rounded border-gray-300"
                >

                <span class="font-semibold">
                    Active
                </span>

            </label>

        </div>


        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.smart-links.index') }}"
                class="px-5 py-3 rounded-xl border font-semibold"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-black text-white font-bold"
            >
                Update Smart Link
            </button>

        </div>

    </form>

</div>

@endsection

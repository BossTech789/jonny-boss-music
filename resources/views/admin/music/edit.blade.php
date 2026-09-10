@extends('layouts.admin')

@section('title', 'Edit Music')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-8">

        <a
            href="{{ route('admin.music.index') }}"
            class="text-sm text-gray-500"
        >
            ← Back to Music
        </a>

        <h1 class="text-3xl font-black mt-3">
            Edit {{ $music->title }}
        </h1>

    </div>


    <form
        method="POST"
        action="{{ route('admin.music.update', $music) }}"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        @include('admin.music._form')

        <div class="mt-6 flex justify-end gap-3">

            <a
                href="{{ route('admin.music.index') }}"
                class="px-5 py-3 rounded-xl border font-semibold"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-black text-white font-bold"
            >
                Update Release
            </button>

        </div>

    </form>

</div>

@endsection

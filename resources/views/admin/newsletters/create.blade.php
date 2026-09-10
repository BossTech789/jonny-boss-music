@extends('layouts.admin')

@section('title', 'New Newsletter')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-8">

        <a
            href="{{ route('admin.newsletters.index') }}"
            class="text-sm text-gray-500 hover:text-black"
        >
            ← Back to Newsletters
        </a>

        <h1 class="text-3xl font-black mt-3">
            New Newsletter
        </h1>

        <p class="text-gray-500 mt-2">
            Create a newsletter that you can send to your active fans.
        </p>

    </div>


    @if($errors->any())

        <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-5">

            <h3 class="font-bold text-red-700 mb-2">
                Please fix the following:
            </h3>

            <ul class="list-disc ml-5 text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.newsletters.store') }}"
        class="bg-white rounded-2xl border shadow-sm p-6 space-y-6"
    >

        @csrf


        {{-- Subject --}}

        <div>

            <label class="block text-sm font-semibold mb-2">
                Email Subject *
            </label>

            <input
                type="text"
                name="subject"
                value="{{ old('subject') }}"
                required
                maxlength="255"
                class="w-full rounded-xl border-gray-300"
                placeholder="Jonny Boss has a new release!"
            >

            <p class="text-xs text-gray-500 mt-2">
                This is what fans will see as the email subject.
            </p>

        </div>


        {{-- Title --}}

        <div>

            <label class="block text-sm font-semibold mb-2">
                Newsletter Title *
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                required
                maxlength="255"
                class="w-full rounded-xl border-gray-300"
                placeholder="NEW MUSIC OUT NOW"
            >

        </div>


        {{-- Content --}}

        <div>

            <label class="block text-sm font-semibold mb-2">
                Content *
            </label>

            <textarea
                name="content"
                rows="12"
                required
                class="w-full rounded-xl border-gray-300"
                placeholder="Write your message to your fans..."
            >{{ old('content') }}</textarea>

            <p class="text-xs text-gray-500 mt-2">
                This message will appear inside the email sent to your fans.
            </p>

        </div>


        {{-- Status information --}}

        <div class="rounded-xl bg-gray-50 border p-4">

            <p class="text-sm font-semibold">
                Campaign status
            </p>

            <p class="text-sm text-gray-500 mt-1">
                This newsletter will be saved as a
                <strong>Draft</strong>.
                You can review it before sending it.
            </p>

        </div>


        {{-- Buttons --}}

        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.newsletters.index') }}"
                class="px-5 py-3 rounded-xl border font-semibold hover:bg-gray-50"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-black text-white font-bold hover:bg-gray-800"
            >
                Save Newsletter
            </button>

        </div>

    </form>

</div>

@endsection

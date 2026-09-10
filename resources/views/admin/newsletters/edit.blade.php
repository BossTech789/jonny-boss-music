@extends('layouts.admin')

@section('title', 'Edit Newsletter')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-8">

        <a
            href="{{ route('admin.newsletters.index') }}"
            class="text-sm text-gray-500"
        >
            ← Back to Newsletters
        </a>

        <h1 class="text-3xl font-black mt-3">
            Edit Newsletter
        </h1>

    </div>


    <form
        method="POST"
        action="{{ route('admin.newsletters.update', $newsletter) }}"
        class="bg-white rounded-2xl border shadow-sm p-6 space-y-6"
    >

        @csrf
        @method('PUT')


        <div>

            <label class="block text-sm font-semibold mb-2">
                Email Subject *
            </label>

            <input
                type="text"
                name="subject"
                value="{{ old('subject', $newsletter->subject) }}"
                required
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Newsletter Title *
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title', $newsletter->title) }}"
                required
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Content *
            </label>

            <textarea
                name="content"
                rows="12"
                required
                class="w-full rounded-xl border-gray-300"
            >{{ old('content', $newsletter->content) }}</textarea>

        </div>


        <div class="flex justify-end">

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-black text-white font-bold"
            >
                Update Newsletter
            </button>

        </div>

    </form>

</div>

@endsection

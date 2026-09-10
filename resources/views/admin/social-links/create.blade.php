@extends('layouts.admin')

@section('title', 'Add Social Link')

@section('content')

<div class="max-w-2xl mx-auto">

    <h1 class="text-3xl font-black mb-8">
        Add Social Link
    </h1>


    <form
        method="POST"
        action="{{ route('admin.social-links.store') }}"
        class="bg-white rounded-2xl border p-6 space-y-6"
    >

        @csrf


        <div>

            <label class="block text-sm font-semibold mb-2">
                Platform *
            </label>

            <input
                type="text"
                name="platform"
                value="{{ old('platform') }}"
                required
                class="w-full rounded-xl border-gray-300"
                placeholder="Instagram"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Display Label
            </label>

            <input
                type="text"
                name="label"
                value="{{ old('label') }}"
                class="w-full rounded-xl border-gray-300"
                placeholder="@jonnyboss"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                URL *
            </label>

            <input
                type="url"
                name="url"
                value="{{ old('url') }}"
                required
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <div>

            <label class="block text-sm font-semibold mb-2">
                Sort Order
            </label>

            <input
                type="number"
                name="sort_order"
                value="{{ old('sort_order', 0) }}"
                min="0"
                class="w-full rounded-xl border-gray-300"
            >

        </div>


        <label class="flex items-center gap-3">

            <input
                type="checkbox"
                name="is_active"
                value="1"
                checked
            >

            <span>
                Active
            </span>

        </label>


        <div class="flex justify-end">

            <button
                type="submit"
                class="bg-black text-white rounded-xl px-6 py-3 font-bold"
            >
                Save
            </button>

        </div>

    </form>

</div>

@endsection

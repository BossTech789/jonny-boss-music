@extends('layouts.admin')

@section('title', 'Hero')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">

        <p class="text-sm text-gray-500">
            Homepage
        </p>

        <h1 class="text-3xl font-black">
            Hero Section
        </h1>

        <p class="text-gray-500 mt-1">
            Control the main image and call-to-action on your website.
        </p>

    </div>


    <form
        method="POST"
        action="{{ route('admin.hero.update') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf
        @method('PUT')


        <div class="bg-white rounded-2xl border shadow-sm p-6">

            <h2 class="text-xl font-black mb-6">
                Hero Content
            </h2>


            <div class="space-y-6">

                <div>

                    <label class="block text-sm font-semibold mb-2">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $hero?->title) }}"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="JONNY BOSS"
                    >

                </div>


                <div>

                    <label class="block text-sm font-semibold mb-2">
                        Subtitle
                    </label>

                    <input
                        type="text"
                        name="subtitle"
                        value="{{ old('subtitle', $hero?->subtitle) }}"
                        class="w-full rounded-xl border-gray-300"
                    >

                </div>


                <div>

                    <label class="block text-sm font-semibold mb-2">
                        Hero Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full border rounded-xl p-3"
                    >

                    @if($hero?->image)

                        <img
                            src="{{ asset('storage/' . $hero->image) }}"
                            class="mt-5 w-full max-h-[500px] object-cover rounded-2xl"
                            alt="Hero"
                        >

                    @endif

                </div>


                <div>

                    <label class="block text-sm font-semibold mb-2">
                        Mobile Hero Image
                    </label>

                    <input
                        type="file"
                        name="mobile_image"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full border rounded-xl p-3"
                    >

                    @if($hero?->mobile_image)

                        <img
                            src="{{ asset('storage/' . $hero->mobile_image) }}"
                            class="mt-5 w-64 rounded-2xl"
                            alt="Mobile Hero"
                        >

                    @endif

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            Button Text
                        </label>

                        <input
                            type="text"
                            name="button_text"
                            value="{{ old('button_text', $hero?->button_text) }}"
                            class="w-full rounded-xl border-gray-300"
                            placeholder="Listen Now"
                        >

                    </div>


                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            Button URL
                        </label>

                        <input
                            type="url"
                            name="button_url"
                            value="{{ old('button_url', $hero?->button_url) }}"
                            class="w-full rounded-xl border-gray-300"
                            placeholder="https://..."
                        >

                    </div>

                </div>

            </div>

        </div>


        <div class="flex justify-end">

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-black text-white font-bold"
            >
                Save Hero
            </button>

        </div>

    </form>

</div>

@endsection

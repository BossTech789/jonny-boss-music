@extends('layouts.admin')

@section('title', 'Social Links')

@section('content')

<div class="space-y-6">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-sm text-gray-500">
                Website social profiles
            </p>

            <h1 class="text-3xl font-black">
                Social Links
            </h1>

        </div>

        <a
            href="{{ route('admin.social-links.create') }}"
            class="bg-black text-white rounded-xl px-5 py-3 font-semibold"
        >
            + Add Social
        </a>

    </div>


    <div class="bg-white rounded-2xl border shadow-sm divide-y">

        @forelse($socialLinks as $social)

            <div class="p-6 flex items-center justify-between gap-5">

                <div>

                    <h2 class="font-bold">
                        {{ $social->label ?? $social->platform }}
                    </h2>

                    <p class="text-sm text-gray-500">
                        {{ $social->url }}
                    </p>

                </div>


                <div class="flex gap-4">

                    <a
                        href="{{ route('admin.social-links.edit', $social) }}"
                        class="font-semibold text-sm"
                    >
                        Edit
                    </a>

                    <form
                        method="POST"
                        action="{{ route('admin.social-links.destroy', $social) }}"
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

        @empty

            <div class="p-12 text-center text-gray-500">
                No social links yet.
            </div>

        @endforelse

    </div>

</div>

@endsection

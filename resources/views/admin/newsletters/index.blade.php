@extends('layouts.admin')

@section('title', 'Newsletters')

@section('content')

<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-sm font-medium text-gray-500">
                Fan updates
            </p>

            <h1 class="text-3xl font-black tracking-tight text-gray-900">
                Newsletters
            </h1>
        </div>

        <a
            href="{{ route('admin.newsletters.create') }}"
            class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2"
        >
            <span class="mr-2 text-lg">+</span>
            New Newsletter
        </a>

    </div>


    {{-- Newsletter Container --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        @forelse($campaigns as $newsletter)

            {{-- Newsletter Card --}}
            <div class="border-b border-gray-200 p-5 last:border-b-0 sm:p-6">

                {{-- Header --}}
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                    <div class="min-w-0">

                        <h2 class="truncate text-xl font-bold text-gray-900">
                            {{ $newsletter->title }}
                        </h2>

                        @if($newsletter->subject)
                            <p class="mt-1 text-sm text-gray-500">
                                Subject:
                                <span class="font-medium text-gray-700">
                                    {{ $newsletter->subject }}
                                </span>
                            </p>
                        @endif

                    </div>


                    {{-- Status --}}
                    @php
                        $statusClasses = match($newsletter->status) {
                            'draft' => 'bg-gray-100 text-gray-700',
                            'sending' => 'bg-yellow-100 text-yellow-800',
                            'sent' => 'bg-green-100 text-green-800',
                            'failed' => 'bg-red-100 text-red-800',
                            default => 'bg-gray-100 text-gray-700',
                        };
                    @endphp

                    <span
                        class="inline-flex w-fit items-center rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses }}"
                    >
                        {{ ucfirst($newsletter->status) }}
                    </span>

                </div>


                {{-- Newsletter Preview --}}
                <div class="mt-5 rounded-xl bg-gray-50 p-4">

                    <p class="text-sm leading-6 text-gray-600">
                        {{ Str::limit(strip_tags($newsletter->content), 180) }}
                    </p>

                </div>


                {{-- Actions --}}
                <div class="mt-5 flex flex-wrap items-center gap-3">

                    @if($newsletter->status === 'draft')

                        {{-- Edit --}}
                        <a
                            href="{{ route('admin.newsletters.edit', $newsletter) }}"
                            class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
                        >
                            Edit
                        </a>


                        {{-- Send --}}
                        <form
                            action="{{ route('admin.newsletters.send', $newsletter) }}"
                            method="POST"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="inline-flex items-center rounded-lg bg-black px-4 py-2 text-sm font-semibold text-white transition hover:bg-gray-800"
                                onclick="return confirm('Send this newsletter to ALL active subscribers?')"
                            >
                                Send to All Fans
                            </button>

                        </form>


                    @elseif($newsletter->status === 'sending')

                        <span
                            class="inline-flex items-center rounded-lg bg-yellow-50 px-4 py-2 text-sm font-semibold text-yellow-700"
                        >
                            <svg
                                class="mr-2 h-4 w-4 animate-spin"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>

                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                                ></path>
                            </svg>

                            Sending...
                        </span>


                    @elseif($newsletter->status === 'sent')

                        <span
                            class="inline-flex items-center rounded-lg bg-green-50 px-4 py-2 text-sm font-semibold text-green-700"
                        >
                            ✓ Sent
                        </span>

                        <span class="text-sm text-gray-500">
                            {{ number_format($newsletter->recipients_count ?? 0) }}
                            recipients
                        </span>


                    @elseif($newsletter->status === 'failed')

                        <span
                            class="inline-flex items-center rounded-lg bg-red-50 px-4 py-2 text-sm font-semibold text-red-700"
                        >
                            Sending failed
                        </span>

                    @endif

                </div>

            </div>

        @empty

            {{-- Empty State --}}
            <div class="px-6 py-16 text-center">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-gray-100">

                    <svg
                        class="h-8 w-8 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                        />
                    </svg>

                </div>


                <h2 class="mt-5 text-xl font-bold text-gray-900">
                    No newsletters yet
                </h2>

                <p class="mx-auto mt-2 max-w-md text-sm text-gray-500">
                    Create your first newsletter to start communicating
                    with your fans.
                </p>


                <a
                    href="{{ route('admin.newsletters.create') }}"
                    class="mt-6 inline-flex items-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-800"
                >
                    <span class="mr-2 text-lg">+</span>
                    Create Newsletter
                </a>

            </div>

        @endforelse


        {{-- Pagination --}}
        @if($campaigns->hasPages())

            <div class="border-t border-gray-200 bg-gray-50 px-5 py-4 sm:px-6">

                {{ $campaigns->links() }}

            </div>

        @endif

    </div>

</div>

@endsection

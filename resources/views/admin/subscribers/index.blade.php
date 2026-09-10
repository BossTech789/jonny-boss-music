@extends('layouts.admin')

@section('title', 'Fans')

@section('content')

<div class="space-y-6">

    <div>

        <p class="text-sm text-gray-500">
            Newsletter audience
        </p>

        <h1 class="text-3xl font-black">
            Fans & Subscribers
        </h1>

    </div>


    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">

        @if($subscribers->count())

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b">

                        <tr>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Name
                            </th>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Email
                            </th>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-xs uppercase text-gray-500">
                                Subscribed
                            </th>

                            <th class="px-6 py-4">
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y">

                        @foreach($subscribers as $subscriber)

                            <tr>

                                <td class="px-6 py-5 font-semibold">
                                    {{ $subscriber->name ?? 'Fan' }}
                                </td>

                                <td class="px-6 py-5 text-sm">
                                    {{ $subscriber->email }}
                                </td>

                                <td class="px-6 py-5">

                                    @if($subscriber->status === 'active')

                                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                            Active
                                        </span>

                                    @else

                                        <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-bold">
                                            Unsubscribed
                                        </span>

                                    @endif

                                </td>

                                <td class="px-6 py-5 text-sm text-gray-500">
                                    {{ $subscriber->subscribed_at?->format('M d, Y') ?? '—' }}
                                </td>

                                <td class="px-6 py-5">

                                    <a
                                        href="{{ route('admin.subscribers.show', $subscriber) }}"
                                        class="font-semibold text-sm"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <div class="p-5 border-t">
                {{ $subscribers->links() }}
            </div>

        @else

            <div class="p-12 text-center text-gray-500">
                No subscribers yet.
            </div>

        @endif

    </div>

</div>

@endsection

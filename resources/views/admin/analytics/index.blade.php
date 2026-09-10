@extends('layouts.admin')

@section('content')
<style>
    /* Simple highlight for #1 */
table tr:first-child td {
  background-color: #e6f7ff;
  font-weight: bold;
}
</style>
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Analytics Dashboard</h2>

    <div class="mb-4">
        <a href="{{ route('admin.analytics.export') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Export CSV</a>
    </div>

    <table class="w-full bg-white text-black shadow rounded overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">Title</th>
                <th>Type</th>
                <th>Visits</th>
                <th>Clicks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($music as $item)
            @php $clicks = json_decode($item->platform_clicks, true) ?? []; @endphp
            <tr class="border-b">
                <td class="p-3">{{ $item->title }}</td>
                <td>{{ ucfirst($item->type) }}</td>
                <td>{{ $item->visits }}</td>
                <td>
                    <ul class="text-sm text-gray-700 space-y-1">
                        @foreach($clicks as $platform => $count)
                            <li><strong>{{ ucfirst($platform) }}</strong>: {{ $count }} clicks</li>
                        @endforeach
                        @if(empty($clicks))
                            <li><em>No clicks yet</em></li>
                        @endif
                    </ul>
                </td>
                <td>
                    <form action="{{ route('admin.analytics.reset', $item->id) }}" method="POST">
                        @csrf
                        <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Reset stats for this item?')">
                            Reset Stats
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<h3 class="text-xl font-semibold mt-10 mb-4">🏆 Top 5 Most-Clicked Songs</h3>

<table class="w-full max-w-2xl bg-white shadow rounded text-sm text-black mb-8">
  <thead class="bg-gray-100">
    <tr>
      <th class="px-4 py-2 text-left">#</th>
      <th class="px-4 py-2 text-left">Title</th>
      <th class="px-4 py-2">Type</th>
      <th class="px-4 py-2 text-right">Total Clicks</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($topClicked as $index => $track)
      <tr class="border-b">
        <td class="px-4 py-2 font-bold">{{ $index + 1 }}</td>
        <td class="px-4 py-2">{{ $track->title }}</td>
        <td class="px-4 py-2 text-center capitalize">{{ $track->type }}</td>
        <td class="px-4 py-2 text-right">{{ $track->total_clicks }}</td>
      </tr>
    @empty
      <tr><td colspan="4" class="text-center py-4 text-gray-500">No clicks recorded.</td></tr>
    @endforelse
  </tbody>
</table>

@endsection

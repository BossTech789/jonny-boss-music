<div class="space-y-6">

    <div class="bg-white rounded-2xl border shadow-sm p-6">

        <h2 class="text-xl font-black mb-6">
            Release Information
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="md:col-span-2">

                <label class="block text-sm font-semibold mb-2">
                    Title *
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $music->title ?? '') }}"
                    required
                    class="w-full rounded-xl border-gray-300"
                >

            </div>


            <div>

                <label class="block text-sm font-semibold mb-2">
                    Artist *
                </label>

                <input
                    type="text"
                    name="artist"
                    value="{{ old('artist', $music->artist ?? 'Jonny Boss') }}"
                    required
                    class="w-full rounded-xl border-gray-300"
                >

            </div>


            <div>

                <label class="block text-sm font-semibold mb-2">
                    Type
                </label>

                <select
                    name="type"
                    class="w-full rounded-xl border-gray-300"
                >

                    <option value="">
                        Select type
                    </option>

                    @foreach(['Single', 'EP', 'Album', 'Mixtape'] as $type)

                        <option
                            value="{{ $type }}"
                            @selected(old('type', $music->type ?? '') === $type)
                        >
                            {{ $type }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div>

                <label class="block text-sm font-semibold mb-2">
                    Release Year
                </label>

                <input
                    type="number"
                    name="year"
                    value="{{ old('year', $music->year ?? '') }}"
                    class="w-full rounded-xl border-gray-300"
                >

            </div>


            <div>

                <label class="block text-sm font-semibold mb-2">
                    Cover Artwork
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/jpeg,image/png,image/webp"
                    class="w-full rounded-xl border border-gray-300 p-3"
                >

                @if(!empty($music->image))

                    <img
                        src="{{ asset('storage/' . $music->image) }}"
                        class="mt-4 w-32 h-32 rounded-xl object-cover"
                        alt="{{ $music->title }}"
                    >

                @endif

            </div>

        </div>

    </div>


    <div class="bg-white rounded-2xl border shadow-sm p-6">

        <h2 class="text-xl font-black mb-6">
            Streaming Links
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @php
                $links = [
                    'spotify_link' => 'Spotify',
                    'apple_link' => 'Apple Music',
                    'audiomack_link' => 'Audiomack',
                    'amazon_link' => 'Amazon Music',
                    'youtudemusic_link' => 'YouTube Music',
                    'boomplay_link' => 'Boomplay',
                ];
            @endphp

            @foreach($links as $field => $label)

                <div>

                    <label class="block text-sm font-semibold mb-2">
                        {{ $label }}
                    </label>

                    <input
                        type="url"
                        name="{{ $field }}"
                        value="{{ old($field, $music->{$field} ?? '') }}"
                        class="w-full rounded-xl border-gray-300"
                    >

                </div>

            @endforeach

        </div>

    </div>

</div>

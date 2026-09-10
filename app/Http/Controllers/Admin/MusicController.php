<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class MusicController extends Controller
{
    /**
     * Display all music.
     */
    public function index(): View
    {
        $musics = Music::latest()->paginate(10);

        return view('admin.music.index', compact('musics'));
    }

    /**
     * Show create music form.
     */
    public function create(): View
    {
        return view('admin.music.create');
    }

    /**
     * Store new music.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:50'],
            'artist' => ['required', 'string', 'max:255'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:2100',
            ],

            'spotify_link' => ['nullable', 'url', 'max:2048'],
            'apple_link' => ['nullable', 'url', 'max:2048'],
            'audiomack_link' => ['nullable', 'url', 'max:2048'],
            'amazon_link' => ['nullable', 'url', 'max:2048'],
            'youtudemusic_link' => ['nullable', 'url', 'max:2048'],
            'boomplay_link' => ['nullable', 'url', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('music', 'public');
        }

        $validated['title'] = trim($validated['title']);

        Music::create($validated);

        return redirect()
            ->route('admin.music.index')
            ->with('success', 'Music added successfully.');
    }

    /**
     * Display one music release.
     */
    public function show(Music $music): View
    {
        $music->load([
            'videos',
            'smartLink',
        ]);

        return view('admin.music.show', compact('music'));
    }

    /**
     * Show edit form.
     */
    public function edit(Music $music): View
    {
        return view('admin.music.edit', compact('music'));
    }

    /**
     * Update music.
     */
    public function update(
        Request $request,
        Music $music
    ): RedirectResponse {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:50'],
            'artist' => ['required', 'string', 'max:255'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:2100',
            ],

            'spotify_link' => ['nullable', 'url', 'max:2048'],
            'apple_link' => ['nullable', 'url', 'max:2048'],
            'audiomack_link' => ['nullable', 'url', 'max:2048'],
            'amazon_link' => ['nullable', 'url', 'max:2048'],
            'youtudemusic_link' => ['nullable', 'url', 'max:2048'],
            'boomplay_link' => ['nullable', 'url', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {

            if ($music->image) {
                Storage::disk('public')->delete($music->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('music', 'public');
        }

        $music->update($validated);

        return redirect()
            ->route('admin.music.index')
            ->with('success', 'Music updated successfully.');
    }

    /**
     * Delete music.
     */
    public function destroy(Music $music): RedirectResponse
    {
        if ($music->image) {
            Storage::disk('public')->delete($music->image);
        }

        $music->delete();

        return redirect()
            ->route('admin.music.index')
            ->with('success', 'Music deleted successfully.');
    }
}

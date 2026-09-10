<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VideoController extends Controller
{
    /**
     * Display videos.
     */
    public function index(): View
    {
        $videos = Video::with('music')
            ->latest()
            ->paginate(10);

        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show create video form.
     */
    public function create(): View
    {
        $musics = Music::orderBy('title')->get();

        return view('admin.videos.create', compact('musics'));
    }

    /**
     * Store video.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],

            'youtube_id' => [
                'required',
                'string',
                'max:100',
            ],

            'music_id' => [
                'nullable',
                'exists:music,id',
            ],
        ]);

        Video::create($validated);

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video added successfully.');
    }

    /**
     * Display video.
     */
    public function show(Video $video): View
    {
        $video->load('music');

        return view('admin.videos.show', compact('video'));
    }

    /**
     * Edit video.
     */
    public function edit(Video $video): View
    {
        $musics = Music::orderBy('title')->get();

        return view(
            'admin.videos.edit',
            compact('video', 'musics')
        );
    }

    /**
     * Update video.
     */
    public function update(
        Request $request,
        Video $video
    ): RedirectResponse {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],

            'youtube_id' => [
                'required',
                'string',
                'max:100',
            ],

            'music_id' => [
                'nullable',
                'exists:music,id',
            ],
        ]);

        $video->update($validated);

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video updated successfully.');
    }

    /**
     * Delete video.
     */
    public function destroy(Video $video): RedirectResponse
    {
        $video->delete();

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video deleted successfully.');
    }
}

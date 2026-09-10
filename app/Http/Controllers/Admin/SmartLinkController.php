<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\SmartLink;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class SmartLinkController extends Controller
{
    /**
     * Display smart links.
     */
    public function index(): View
    {
        $smartLinks = SmartLink::with('music')
            ->latest()
            ->paginate(10);

        return view(
            'admin.smart-links.index',
            compact('smartLinks')
        );
    }

    /**
     * Create smart link.
     */
    public function create(): View
    {
        $musics = Music::doesntHave('smartLink')
            ->orderBy('title')
            ->get();

        return view(
            'admin.smart-links.create',
            compact('musics')
        );
    }

    /**
     * Store smart link.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'music_id' => [
                'required',
                'exists:music,id',
                'unique:smart_links,music_id',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                'unique:smart_links,slug',
            ],

            'headline' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['is_active'] =
            $request->boolean('is_active');

        SmartLink::create($validated);

        return redirect()
            ->route('admin.smart-links.index')
            ->with('success', 'Smart link created successfully.');
    }

    /**
     * Display smart link.
     */
    public function show(SmartLink $smartLink): View
    {
        $smartLink->load([
            'music',
            'music.videos',
        ]);

        return view(
            'admin.smart-links.show',
            compact('smartLink')
        );
    }

    /**
     * Edit smart link.
     */
    public function edit(SmartLink $smartLink): View
    {
        $musics = Music::where(function ($query) use ($smartLink) {
            $query->doesntHave('smartLink')
                ->orWhere('id', $smartLink->music_id);
        })
        ->orderBy('title')
        ->get();

        return view(
            'admin.smart-links.edit',
            compact('smartLink', 'musics')
        );
    }

    /**
     * Update smart link.
     */
    public function update(
        Request $request,
        SmartLink $smartLink
    ): RedirectResponse {

        $validated = $request->validate([
            'music_id' => [
                'required',
                'exists:music,id',
                'unique:smart_links,music_id,' . $smartLink->id,
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                'unique:smart_links,slug,' . $smartLink->id,
            ],

            'headline' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['is_active'] =
            $request->boolean('is_active');

        $smartLink->update($validated);

        return redirect()
            ->route('admin.smart-links.index')
            ->with('success', 'Smart link updated successfully.');
    }

    /**
     * Delete smart link.
     */
    public function destroy(
        SmartLink $smartLink
    ): RedirectResponse {

        $smartLink->delete();

        return redirect()
            ->route('admin.smart-links.index')
            ->with('success', 'Smart link deleted successfully.');
    }
}

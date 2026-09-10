<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SocialLinkController extends Controller
{
    public function index(): View
    {
        $socialLinks = SocialLink::orderBy('sort_order')
            ->get();

        return view(
            'admin.social-links.index',
            compact('socialLinks')
        );
    }

    public function create(): View
    {
        return view('admin.social-links.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'platform' => ['required', 'string', 'max:50'],
            'label' => ['nullable', 'string', 'max:100'],
            'url' => ['required', 'url', 'max:2048'],
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['is_active'] =
            $request->boolean('is_active');

        SocialLink::create($validated);

        return redirect()
            ->route('admin.social-links.index')
            ->with('success', 'Social link added.');
    }

    public function edit(SocialLink $socialLink): View
    {
        return view(
            'admin.social-links.edit',
            compact('socialLink')
        );
    }

    public function update(
        Request $request,
        SocialLink $socialLink
    ): RedirectResponse {

        $validated = $request->validate([
            'platform' => ['required', 'string', 'max:50'],
            'label' => ['nullable', 'string', 'max:100'],
            'url' => ['required', 'url', 'max:2048'],
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['is_active'] =
            $request->boolean('is_active');

        $socialLink->update($validated);

        return redirect()
            ->route('admin.social-links.index')
            ->with('success', 'Social link updated.');
    }

    public function destroy(
        SocialLink $socialLink
    ): RedirectResponse {

        $socialLink->delete();

        return redirect()
            ->route('admin.social-links.index')
            ->with('success', 'Social link deleted.');
    }
}

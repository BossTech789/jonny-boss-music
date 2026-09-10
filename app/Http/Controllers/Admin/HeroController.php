<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HeroController extends Controller
{
    public function edit(): View
    {
        $hero = Hero::first();

        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request): RedirectResponse
    {
        $hero = Hero::first();

        if (!$hero) {
            $hero = new Hero();
        }

        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],

            'mobile_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],

            'theme_color' => [
                'nullable',
                'string',
                'max:20',
            ],

            'button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'button_url' => [
                'nullable',
                'url',
                'max:2048',
            ],
        ]);

        if ($request->hasFile('image')) {

            if ($hero->image) {
                Storage::disk('public')
                    ->delete($hero->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('hero', 'public');
        }

        if ($request->hasFile('mobile_image')) {

            if ($hero->mobile_image) {
                Storage::disk('public')
                    ->delete($hero->mobile_image);
            }

            $validated['mobile_image'] = $request
                ->file('mobile_image')
                ->store('hero/mobile', 'public');
        }

        $hero->fill($validated);
        $hero->is_active = true;
        $hero->save();

        return back()
            ->with('success', 'Hero updated successfully.');
    }
}

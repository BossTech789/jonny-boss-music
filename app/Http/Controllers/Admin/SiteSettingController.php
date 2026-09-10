<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        $settings = SiteSetting::pluck('value', 'key');

        return view(
            'admin.settings.edit',
            compact('settings')
        );
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'artist_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'artist_email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'footer_text' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);

        foreach ($validated as $key => $value) {

            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with(
            'success',
            'Site settings updated.'
        );
    }
}

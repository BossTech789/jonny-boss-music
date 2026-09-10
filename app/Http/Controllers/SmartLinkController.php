<?php

namespace App\Http\Controllers;

use App\Models\SmartLink;
use Illuminate\View\View;

class SmartLinkController extends Controller
{
    public function show(string $slug): View
    {
        $smartLink = SmartLink::where('slug', $slug)
            ->firstOrFail();

        $smartLink->load([
            'music',
            'music.videos',
        ]);

        return view(
            'smart-links.show',
            compact('smartLink')
        );
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Video;
use App\Models\SmartLink;
use App\Models\NewsletterSubscriber;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'music' => Music::count(),

            'videos' => Video::count(),

            'smart_links' => SmartLink::count(),

            'subscribers' => NewsletterSubscriber::where(
                'status',
                'active'
            )->count(),
        ];

        $latestMusic = Music::latest()
            ->take(5)
            ->get();

        $latestVideos = Video::with('music')
            ->latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'stats',
                'latestMusic',
                'latestVideos'
            )
        );
    }
}

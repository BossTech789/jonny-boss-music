<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
{
    $music = Music::latest()->take(3)->get();

    $videos = Video::latest()->take(3)->get();

    return view('index', compact('music', 'videos'));
}
}

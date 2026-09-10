<?php

namespace App\Http\Controllers;

use App\Models\Music;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::latest()->get();

        return view('music', compact('musics'));
    }
}

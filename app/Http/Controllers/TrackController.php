<?php

namespace App\Http\Controllers;

use inertia\Inertia;
use App\Models\Track;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::where('display', true)->orderBy('title')->get();

        return inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        return inertia::render('Track/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['string', 'required', 'max:255'],
            'artist' => ['string', 'required', 'max:255'],
            'display' => ['boolean', 'required'],
            'image' => ['image', 'required'],
            'music' => ['file', 'required', 'extensions:mp3,wav'],
        ]);
        
        $uuid = 'trk-' . Str::uuid();

        $extension = $request->image->extension();
        $imagePath = $request->image->storeAs('tracks/images', $uuid . '.' . $extension);

        $extension = $request->music->extension();
        $musicPath = $request->music->storeAs('tracks/musics', $uuid . '.' . $extension);

        Track::create([
            'uuid' => $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
            'image' => $imagePath,
            'music' => $musicPath,
        ]);

        return redirect()->route('tracks.index');
    }
}

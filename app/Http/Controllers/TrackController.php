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
        $tracks = Track::all();

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
        
        Track::create([
            'uuid' => 'trk-' . Str::uuid(), // 'trk-uuid
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
            'image' => $request->image->store('images', 'public'),
            'music' => $request->music->store('music', 'public'),
        ]);
    }
}

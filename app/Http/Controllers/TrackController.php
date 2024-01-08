<?php

namespace App\Http\Controllers;

use inertia\Inertia;
use App\Models\Track;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();

        return inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }
}

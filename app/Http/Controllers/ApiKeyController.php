<?php

namespace App\Http\Controllers;

use inertia\Inertia;
use App\Models\ApiKey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    public function index()
    {
        $user = request()->user();
        $apikeys =$user->apikeys()->get();

        return Inertia::render('ApiKey/Index', [
            'apikeys'=> $apikeys, 
        ]);
    }

    public function create()
    {
        $user = request()->user();
        $apiKeys = ApiKey::where('uuid', $user->uuid)->orderBy('name')->get();

        return Inertia::render('ApiKey/Create', [
            'apikeys' => $apiKeys,
        ]);
    }   

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required', 'max:255'],
        ]);

        ApiKey::create([

            'uuid' => 'api-' . Str::uuid(),
            'user_id' => $request->user()->id,
            'name'=> $request->name,
            'key' => 'token-' . Str::random(32),
        ]);

        return redirect()->route('apikeys.index');
    }

    public function destroy(ApiKey $apikey)
    {
        $apikey->delete();
        return redirect()->route('apikeys.index');
    }
}

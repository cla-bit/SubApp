<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;


class WebsiteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $website = Website::create($validated);

        return response()->json($website, 201);
    }
}

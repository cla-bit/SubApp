<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class WebsiteController extends Controller
{

    /**
     * Store a newly created website in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */

     public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $website = Website::create($validated);

        return response()->json($website, 201);
    }
}

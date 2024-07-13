<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{

    /**
     * Store a newly created post in storage.
     *
     * @param Request $request
     * @param Website $website
     * @return \Illuminate\Http\JsonResponse
     */

     public function store(Request $request, Website $website)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $post = Post::create([
            'website_id' => $website->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($post, 201);
    }
}

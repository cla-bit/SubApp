<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;


class PostController extends Controller
{
    public function store(Request $request, Website $website)
    {

        $validator = validator::make($request->all(), [
            'website_id' => 'required|exists:website,id',
            'title' => 'required|strind|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $post = Post::create($request->all());

        return response()->json($post, 201);
    }
}

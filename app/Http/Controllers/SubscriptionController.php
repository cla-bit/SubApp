<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{

    /**
     * Store a newly created subscription in storage.
     *
     * @param Request $request
     * @param Website $website
     * @return \Illuminate\Http\JsonResponse
     */

     public function store(Request $request, Website $website)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'website_id' => 'required|exists:websites,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $subscription = Subscription::firstOrCreate([
            'user_id' => $request->user_id,
            'website_id' => $website->id,
        ]);

        return response()->json($subscription, 201);
    }
}

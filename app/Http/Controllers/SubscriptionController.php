<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class SubscriptionController extends Controller
{
    public function store(Request $request, Website $website)
    {

        $validator = validate::make(request->all(), [
            'user_id' => 'required|exists:users,id',
            'website_id' => 'required|exists:website,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $subscription = Subscription::firstOrCreate([
            'user_id' => $request->user_id,
            'website_id' => $request->website_id,
        ]);

        return response()->json($subscription, 201);
    }
}

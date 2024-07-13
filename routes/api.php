<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Enpoint to create a user
Route::post('register', [AuthController::class, 'register']);

// Endpoint to create a particular website
Route::post('websites', [WebsiteController::class, 'store']);

// Endpoint to create a post for a particular website
Route::post('websites/{website}/posts', [PostController::class, 'store']);

// Endpoint to subscribe a user to a particular website
Route::post('websites/{website}/subscribe', [SubscriptionController::class, 'store']);

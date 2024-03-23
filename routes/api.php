<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Group routes for API version 1
Route::prefix('v1')->group(function () {
    // This route is now accessible at /api/v1/user and requires sanctum authentication

    // Grouping Discord-related routes under /discord
    Route::prefix('discord')->group(function () {
        // The Discord command execution route, now accessible at /api/v1/discord/interactions
        Route::post('/interactions', [DiscordController::class, 'executeCommand'])->middleware('verify.discord.signature');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/auth/redirect', function () {
    return Socialite::driver('auth0')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('auth0')->user();

    Log::info("user after callback: " . $user->id);
});

Route::get('/', function () {
    return view('welcome');
});

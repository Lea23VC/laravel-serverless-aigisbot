<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    $auth0User = Socialite::driver('auth0')->user();

    $user = User::updateOrCreate([
        'email' => $auth0User->email,
    ], [
        'name' => $auth0User->name,
    ]);

    Auth::login($user);


    return redirect('/admin');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

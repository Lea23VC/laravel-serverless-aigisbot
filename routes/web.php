<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Auth0User;

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

    // Check if the Auth0 user ID already exists in auth0_users table
    $auth0Record = Auth0User::where('provider_id', $auth0User->id)->first();

    if (!$auth0Record) {
        // Create a new record in auth0_users table if not exists
        $auth0Record = Auth0User::create([
            'provider_id' => $auth0User->id,
        ]);
    }
    // Update or create the user record in the users table
    $user = User::updateOrCreate(
        ['email' => $auth0User->email],
        ['name' => $auth0User->name]
    );

    // Associate the user record with the auth0_users record
    $auth0Record->user_id = $user->id;
    $auth0Record->save();

    Auth::login($user);

    return redirect('/admin');
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout-custom', function () {
    $user = Auth::user();
    $auth0user = Auth0User::where('user_id', $user->id)->first();
    Auth::logout();
    if ($auth0user) {
        Log::info("im here?");

        $logoutUrl = '' . config('services.auth0.base_url') . '/v2/logout?returnTo=' . config('app.url') . '&client_id=' . config('services.auth0.client_id');

        Log::info("im here?");
        Log::info('logout url: ' . $logoutUrl);
        return redirect($logoutUrl);
    }
    return redirect('/');
})->name('logout');

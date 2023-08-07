<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

final class Logout
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): ?User
    {
        // Plain Laravel: Auth::guard()
        // Laravel Sanctum: Auth::guard(config('sanctum.guard', 'web'))
        $guard = Auth::guard(config('sanctum.guard', 'web'));

        $user = $guard->user();
        $guard->logout();

        return $user;
    }
}

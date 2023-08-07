<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;

final class Verify
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): array
    {
        $user = Auth::user();

        if (!$user) {
            throw ValidationException::withMessages([
                'token' => ['Invalid token'],
            ]);
        }
        assert($user instanceof User, 'Since we successfully logged in, this can no longer be `null`.');

        $token = $user->createToken('token-name')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}

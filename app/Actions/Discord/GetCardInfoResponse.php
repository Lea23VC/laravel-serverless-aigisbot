<?php

namespace App\Actions\Discord;

use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCardInfoResponse
{
    use AsAction;

    public function handle($data): JsonResponse
    {
        SendDiscordMessage::dispatch($data);
        return response()->json(['type' => 5]);
    }
}

<?php

namespace App\Actions\Discord;

use App\Jobs\SendDiscordCardMessage;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCardInfoResponse
{
    use AsAction;

    public function handle($data): JsonResponse
    {
        SendDiscordCardMessage::dispatch($data);
        return response()->json(['type' => 5]);
    }
}

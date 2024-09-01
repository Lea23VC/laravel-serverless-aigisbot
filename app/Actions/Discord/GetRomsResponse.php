<?php

namespace App\Actions\Discord;

use Illuminate\Http\Request;
use Log;
use App\Models\Console;
use App\Enums\ConsoleEnum;
use App\Actions\Discord\GetRomsByCommand;
use App\Jobs\SendDiscordRomMessage;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class GetRomsResponse
{
    use AsAction;
    protected $data;


    public function handle($data): JsonResponse
    {

        SendDiscordRomMessage::dispatch($data);

        return response()->json(['type' => 5]);
    }
}

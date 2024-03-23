<?php

namespace App\Http\Controllers;

use App\Actions\Discord\GetCardInfoResponse;
use Illuminate\Http\Request;

use App\Enums\ConsoleEnum;
use App\Actions\Discord\GetRomsResponse;

class DiscordController extends Controller
{
    public function executeCommand(Request $request)
    {
        $bodyData = json_decode($request->getContent(), true);

        if ($bodyData['type'] == 1) {
            return response()->json(['type' => 1]);
        }

        if ($bodyData['type'] == 2) {
            $data = $bodyData['data'];

            return match (true) {
                ConsoleEnum::hasValue($data['name']) => GetRomsResponse::run($data),
                $data['name'] === 'card' => GetCardInfoResponse::run($data),
                default => response('Unsupported command', 400),
            };
        }

        // Fallback error response
        return response('Unexpected error', 400);
    }
}

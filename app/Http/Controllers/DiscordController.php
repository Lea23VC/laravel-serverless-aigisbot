<?php

namespace App\Http\Controllers;

use App\Actions\Discord\GetCardInfoResponse;
use Illuminate\Http\Request;

use App\Enums\ConsoleEnum;
use App\Actions\Discord\GetRomsResponse;

class DiscordController extends Controller
{
    //

    public function executeCommand(Request $request)
    {
        // Your public key can be found in your application in the Developer Portal
        $PUBLIC_KEY = config('services.discord.public_key');
        $headers = $request->headers->all();
        $signature = $headers['x-signature-ed25519'][0] ?? null;
        $timestamp = $headers['x-signature-timestamp'][0] ?? null;
        $body = $request->getContent();


        $isVerified = sodium_crypto_sign_verify_detached(
            hex2bin($signature),
            $timestamp . $body,
            hex2bin($PUBLIC_KEY)
        );

        $bodyData = json_decode($body, true);

        if ($bodyData['type'] == 1 && $isVerified) {
            return response()->json([
                'type' => 1,
            ]);
        }

        if ($bodyData['type'] == 2 && $isVerified) {
            $data = $bodyData['data'];

            if (ConsoleEnum::hasValue($data['name'])) {
                $response = GetRomsResponse::run($data);
                return $response;
            } else {

                if ($data['name'] == 'card') {
                    $response = GetCardInfoResponse::run($data);
                    return $response;
                }
            }
        } else {
            return response('invalid request signature', 401);
        }
    }
}

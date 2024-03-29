<?php

namespace App\Actions\Discord;

use Illuminate\Http\Request;
use Log;
use App\Models\Console;
use App\Enums\ConsoleEnum;
use App\Actions\Discord\GetRomsByCommand;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;

class GetTodayDolarAction
{
    use AsAction;
    protected $data;


    public function handle($data): JsonResponse
    {
        $client = new Client();
        $today = now();
        $formattedDate = $today->format('d-m-Y');

        $response = $client->request('GET', $this->baseUrl . "dolar/$formattedDate");
        $data = json_decode($response->getBody()->getContents(), true);

        $dollarValue = $data['serie'][0]['valor'];

        return $dollarValue;
    }
}

<?php

namespace App\Actions\Discord;

use App\Models\Console;
use App\Enums\ConsoleEnum;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class GetRomsByCommand
{
    use AsAction;
    protected ConsoleEnum $consoleEnum;
    protected Console $console;
    protected String $gameName;


    public function handle(ConsoleEnum $consoleEnum, string $gameName): array
    {
        $this->console = Console::where('name', $consoleEnum->value)->first();
        $this->gameName = $gameName;

        $roms = $this->console
            ->games()
            ->with('boxart') // Assuming 'boxart' is the relationship name in your Game model
            ->select('name', 'url', 'password')
            ->when($this->gameName, function ($query, $searchValue) {
                return $query->where('name', 'LIKE', '%' . $searchValue . '%');
            })
            ->limit(10)
            ->get()
            ->map(function (Game $game) {
                $name = $game->name;
                $url = $game->url;
                $password = $game->password;
                $image = $game->boxart?->image;

                $imageUrl = $image ? Storage::disk('s3')->temporaryUrl($image, now()->addDays(7)) : null;

                $romDetail = "$name: $url";
                if ($password) {
                    $romDetail .= " (Password: $password)";
                }

                Log::info("ROM Detail: $romDetail");
                Log::info("Image: $imageUrl");

                return [
                    'rom' => $romDetail,
                    'image' => $imageUrl,
                ];
            })
            ->toArray();

        return $roms;
    }
}

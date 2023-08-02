<?php

namespace App\Actions\Discord;

use App\Models\Console;
use App\Enums\ConsoleEnum;
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

        $roms =  $this->console
            ->games()
            ->select('name', 'url', 'password')
            ->when($this->gameName, function ($query, $searchValue) {
                return $query->where('name', 'LIKE', '%' . $searchValue . '%');
            })
            ->limit(10)
            ->get()
            ->map(function ($game) {
                $name = $game->name;
                $url = $game->url;
                $password = $game->password;

                // Include the password in the array only if it exists
                if ($password) {
                    return "$name: $url (Password: $password)";
                }

                return "$name: $url";
            })
            ->toArray();

        return $roms;
    }
}

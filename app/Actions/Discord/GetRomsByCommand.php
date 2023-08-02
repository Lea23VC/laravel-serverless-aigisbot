<?php

namespace App\Actions\Discord;

use App\Models\Console;
use Lorisleiva\Actions\Concerns\AsAction;

class GetRomsByCommand
{
    use AsAction;
    protected ConsoleEnum $consoleEnum;
    protected Console $console;
    protected String $gameName;

    public function __construct(ConsoleEnum $consoleEnum, String $gameName)
    {

        $this->console = Console::where('name', $consoleEnum->value)->first();
        $this->gameName = $gameName;
    }

    public function handle(): array
    {
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

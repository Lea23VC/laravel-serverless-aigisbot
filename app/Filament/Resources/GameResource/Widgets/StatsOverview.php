<?php

// app/Filament/Resources/GameResource/Widgets/StatsOverview.php

namespace App\Filament\Resources\GameResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Game; // Replace this with the actual model namespace for your Game model
use App\Models\Console;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $totalGames = Game::count(); // Get the total count of games from the database
        $totalConsoles = Console::count(); // Get the total count of consoles from the database

        return [
            Card::make('Total Games', $totalGames),
            Card::make('Total Consoles', $totalConsoles),
        ];
    }
}

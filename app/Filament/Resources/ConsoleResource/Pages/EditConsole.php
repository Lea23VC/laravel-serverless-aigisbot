<?php

namespace App\Filament\Resources\ConsoleResource\Pages;

use App\Filament\Resources\ConsoleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsole extends EditRecord
{
    protected static string $resource = ConsoleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsoleResource\Pages;
use App\Filament\Resources\ConsoleResource\RelationManagers;
use App\Models\Console;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConsoleResource extends Resource
{
    protected static ?string $model = Console::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fullname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('nasos')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('fullname')->label('Name'),
                Tables\Columns\TextColumn::make('name')->label('ID'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConsoles::route('/'),
            'create' => Pages\CreateConsole::route('/create'),
            'edit' => Pages\EditConsole::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsoleResource\Pages;
use App\Filament\Resources\ConsoleResource\RelationManagers;
use App\Models\Console;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConsoleResource extends Resource
{
    protected static ?string $model = Console::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Forms\Components\Select::make('company_id')->relationship('company', 'name')->required(),
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
                Tables\Columns\TextColumn::make('games_count')->counts('games')->label('Number of games'),
            ])->defaultSort('order_column', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('up')->icon('heroicon-o-chevron-up')
                    ->action(fn (Console $record) => $record->moveOrderUp()),
                Tables\Actions\Action::make('down')->icon('heroicon-o-chevron-down')
                    ->action(fn (Console $record) => $record->moveOrderDown()),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\GamesRelationManager::class,
        ];
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConsoles::route('/'),
            'create' => Pages\CreateConsole::route('/create'),
            'view' => Pages\ViewConsole::route('/{record}'),
            'edit' => Pages\EditConsole::route('/{record}/edit'),
        ];
    }
}

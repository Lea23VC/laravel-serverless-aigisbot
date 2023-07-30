<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Filament\Resources\GameResource\RelationManagers;
use App\Models\Game;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('console_id')
                    ->relationship('console', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('boxart')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('release_date'),
                Forms\Components\TextInput::make('developer')
                    ->maxLength(255),
                Forms\Components\TextInput::make('publisher')
                    ->maxLength(255),
                Forms\Components\TextInput::make('genre')
                    ->maxLength(255),
                Forms\Components\TextInput::make('players')
                    ->maxLength(255),
                Forms\Components\Toggle::make('availability')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('console.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('url'),
                Tables\Columns\TextColumn::make('boxart'),
                Tables\Columns\TextColumn::make('release_date')
                    ->date(),
                Tables\Columns\TextColumn::make('developer'),
                Tables\Columns\TextColumn::make('publisher'),
                Tables\Columns\TextColumn::make('genre'),
                Tables\Columns\TextColumn::make('players'),
                Tables\Columns\IconColumn::make('availability')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }    
}

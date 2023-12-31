<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Filament\Resources\GameResource\RelationManagers;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        $infoSection = Section::make([
            Infolists\Components\TextEntry::make('name')->size('lg'),
            Infolists\Components\TextEntry::make('console.fullname')->label("Console"),
            Infolists\Components\TextEntry::make('url')->label('URL')->limit(50)
                ->url(fn (Game $record): string => $record->url)->openUrlInNewTab(),
        ])->grow();

        $mediaSection =
            Section::make([
                Infolists\Components\ImageEntry::make('boxart.image')->disk('s3')->visibility('private')->columnSpanFull()->width("100%")->height('auto')
            ]);

        return $infolist
            ->schema([
                Split::make([
                    $infoSection,
                    $mediaSection,
                ])->from('md'),
            ])->columns(1);
    }


    public static function form(Form $form): Form
    {
        $consoleId = $form->getRecord()->console->name;

        return $form
            ->schema([
                Forms\Components\Select::make('console_id')
                    ->relationship('console', 'fullname')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')->url()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('region_id')->relationship('region', 'code'),
                Forms\Components\TextInput::make('password')
                    ->maxLength(255),

                Forms\Components\Section::make("Boxart")->relationship('boxart')
                    ->schema([
                        FileUpload::make('image')->label('games-boxarts/' . $consoleId)
                            ->disk('s3')
                            ->directory('games-boxarts/' . $consoleId)->image()
                            ->visibility('private'),
                    ]),


                // Forms\Components\TextInput::make('boxart')
                //     ->maxLength(255),
                Forms\Components\DatePicker::make('release_date'),
                Forms\Components\Toggle::make('availability')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('boxart.image')->square()->disk('s3')->visibility('private'),
                Tables\Columns\TextColumn::make('console.fullname')
                    ->label('Console')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('url')->label('URL'),
                Tables\Columns\TextColumn::make('region.code')->label('Region'),
                Tables\Columns\TextColumn::make('password')->label('Password'),
                Tables\Columns\TextColumn::make('release_date')
                    ->date()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('developer')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('publisher')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('genre')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('players')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('availability')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
                SelectFilter::make('console')->relationship('console', 'fullname')->multiple()->preload(),
                SelectFilter::make('region')->relationship('region', 'code')->multiple()->preload(),
                Filter::make('boxart')->toggle()->query(fn (Builder $query): Builder => $query->whereNotNull('boxart_id'))->default(true)


            ])->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'view' => Pages\ViewGame::route('/{record}'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            GameResource\Widgets\StatsOverview::class,
        ];
    }
}

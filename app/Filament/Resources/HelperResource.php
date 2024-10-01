<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HelperResource\Pages;
use App\Filament\Resources\HelperResource\RelationManagers;
use App\Models\Helper;
use App\Models\WorkArea;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HelperResource extends Resource
{
    protected static ?string $model = Helper::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("registrationID")
                    ->label("Helfernummer"),
                Forms\Components\Select::make('work_area_id')
                    ->options(WorkArea::all()->pluck("label", "id")),
                Forms\Components\TextInput::make("notes")
                    ->label("Notizen"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("registrationID")->label("Helfernummer")->searchable(),
                Tables\Columns\TextColumn::make("work.label")->label("Bereich"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([

            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make("Notizen")
            ->description("Notizen falls Helfer auffällig")
            ->schema([
                TextEntry::make("notes"),
            ]),
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
            'index' => Pages\ListHelpers::route('/'),
            'create' => Pages\CreateHelper::route('/create'),
            'view' => Pages\ViewHelper::route('/{record}'),
            'edit' => Pages\EditHelper::route('/{record}/edit'),
        ];
    }
}

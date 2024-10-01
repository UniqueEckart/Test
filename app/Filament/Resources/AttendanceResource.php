<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use App\Models\Helper;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make("helper_id")
                    ->options(Helper::all()->pluck("id", "id"))
                    ->searchable(),
                Forms\Components\Select::make("shiftDay")
                    ->options([
                        "friday" => "Freitag",
                        "saturday" => "Samstag",
                        "sunday" => "Sonntag",
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("helper_id")->label("Helfernummer")->searchable(),
                Tables\Columns\TextColumn::make("shiftDay")->label("Schichttag"),
                Tables\Columns\CheckboxColumn::make("checkedIn")->label("Erschienen"),
                Tables\Columns\CheckboxColumn::make("startedWorking")->label("Zu seiner Schicht"),
            ])
            ->filters([
                Tables\Filters\Filter::make("Freitag")->query(fn (Builder $query): Builder => $query->where('shiftDay', 'friday')),
                Tables\Filters\Filter::make("Samstag")->query(fn (Builder $query): Builder => $query->where('shiftDay', 'saturday')),
                Tables\Filters\Filter::make("Sonntag")->query(fn (Builder $query): Builder => $query->where('shiftDay', 'sunday')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}

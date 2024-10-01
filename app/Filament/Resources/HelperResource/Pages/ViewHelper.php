<?php

namespace App\Filament\Resources\HelperResource\Pages;

use App\Filament\Resources\HelperResource;
use App\Models\Attendance;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;

class ViewHelper extends ViewRecord
{
    protected static string $resource = HelperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),

        ];
    }
}

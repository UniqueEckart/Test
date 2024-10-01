<?php

namespace App\Filament\Widgets;

use App\Models\Attendance;
use App\Models\Helper;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Helfer Insgesamt", Helper::all()->count()),
            Stat::make("Helfer Freitag", Attendance::where('shiftDay', "friday")->orderBy('helper_id')->get()->count()),
            Stat::make("Helfer Freitag", Attendance::where('shiftDay', "saturday")->orderBy('helper_id')->get()->count()),
            Stat::make("Helfer Freitag", Attendance::where('shiftDay', "sunday")->orderBy('helper_id')->get()->count()),
        ];
    }
}

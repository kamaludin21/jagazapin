<?php

namespace App\Filament\Resources\InformationResource\Widgets;

use App\Models\Information;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class InformationOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Information::all()->count())
                ->color('primary')
                ->chart([Information::all()->count()]),
            Stat::make('Aktif', Information::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Information::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

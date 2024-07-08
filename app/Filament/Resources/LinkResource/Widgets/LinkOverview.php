<?php

namespace App\Filament\Resources\LinkResource\Widgets;

use App\Models\Link;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class LinkOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Link::all()->count())
                ->color('primary')
                ->chart([Link::all()->count()]),
            Stat::make('Aktif', Link::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Link::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

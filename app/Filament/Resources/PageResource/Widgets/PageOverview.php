<?php

namespace App\Filament\Resources\PageResource\Widgets;

use App\Models\Page;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PageOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Page::all()->count())
                ->color('primary')
                ->chart([Page::all()->count()]),
            Stat::make('Aktif', Page::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Page::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

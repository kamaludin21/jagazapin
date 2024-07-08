<?php

namespace App\Filament\Resources\SlideshowResource\Widgets;

use App\Models\Slideshow;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SlideshowOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Slideshow::all()->count())
                ->color('primary')
                ->chart([Slideshow::all()->count()]),
            Stat::make('Aktif', Slideshow::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Slideshow::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

<?php

namespace App\Filament\Resources\ImageResource\Widgets;

use App\Models\Image;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ImageOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Image::all()->count())
                ->color('primary')
                ->chart([Image::all()->count()]),
            Stat::make('Aktif', Image::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Image::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

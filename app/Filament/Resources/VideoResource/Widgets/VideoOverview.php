<?php

namespace App\Filament\Resources\VideoResource\Widgets;

use App\Models\Video;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class VideoOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Video::all()->count())
                ->color('primary')
                ->chart([Video::all()->count()]),
            Stat::make('Aktif', Video::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Video::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

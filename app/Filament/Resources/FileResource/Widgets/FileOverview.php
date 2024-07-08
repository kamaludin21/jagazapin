<?php

namespace App\Filament\Resources\FileResource\Widgets;

use App\Models\File;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class FileOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', File::all()->count())
                ->color('primary')
                ->chart([File::all()->count()]),
            Stat::make('Aktif', File::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', File::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

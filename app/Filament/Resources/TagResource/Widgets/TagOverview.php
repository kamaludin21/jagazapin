<?php

namespace App\Filament\Resources\TagResource\Widgets;

use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TagOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Tag::all()->count())
                ->color('primary')
                ->chart([Tag::all()->count()]),
            Stat::make('Aktif', Tag::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Tag::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoryOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Category::all()->count())
                ->color('primary')
                ->chart([Category::all()->count()]),
            Stat::make('Aktif', Category::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Category::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use App\Models\Article;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ArticleOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Article::all()->count())
                ->color('primary')
                ->chart([Article::all()->count()]),
            Stat::make('Aktif', Article::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Article::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

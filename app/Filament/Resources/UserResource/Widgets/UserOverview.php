<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', User::all()->count())
                ->color('primary')
                ->chart([User::all()->count()]),
            Stat::make('Aktif', User::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', User::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}

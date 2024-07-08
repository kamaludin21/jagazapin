<?php

namespace App\Filament\Resources\VideoResource\Pages;

use Filament\Actions;
use App\Filament\Resources\VideoResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\VideoResource\Widgets\VideoOverview;

class ListVideos extends ListRecords
{
    protected static string $resource = VideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            VideoOverview::class,
        ];
    }
}

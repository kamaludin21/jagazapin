<?php

namespace App\Filament\Resources\ImageResource\Pages;

use Filament\Actions;
use App\Filament\Resources\ImageResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ImageResource\Widgets\ImageOverview;

class ListImages extends ListRecords
{
    protected static string $resource = ImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ImageOverview::class,
        ];
    }
}

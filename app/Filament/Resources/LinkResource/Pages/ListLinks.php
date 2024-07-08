<?php

namespace App\Filament\Resources\LinkResource\Pages;

use Filament\Actions;
use App\Filament\Resources\LinkResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\LinkResource\Widgets\LinkOverview;

class ListLinks extends ListRecords
{
    protected static string $resource = LinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LinkOverview::class,
        ];
    }
}

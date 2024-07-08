<?php

namespace App\Filament\Resources\TagResource\Pages;

use Filament\Actions;
use App\Filament\Resources\TagResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\TagResource\Widgets\TagOverview;

class ListTags extends ListRecords
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TagOverview::class,
        ];
    }
}

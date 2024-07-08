<?php

namespace App\Filament\Resources\DpoResource\Pages;

use App\Filament\Resources\DpoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDpos extends ListRecords
{
    protected static string $resource = DpoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

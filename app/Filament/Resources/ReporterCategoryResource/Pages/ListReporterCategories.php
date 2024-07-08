<?php

namespace App\Filament\Resources\ReporterCategoryResource\Pages;

use App\Filament\Resources\ReporterCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReporterCategories extends ListRecords
{
    protected static string $resource = ReporterCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

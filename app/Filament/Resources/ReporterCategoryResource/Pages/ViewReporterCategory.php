<?php

namespace App\Filament\Resources\ReporterCategoryResource\Pages;

use App\Filament\Resources\ReporterCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReporterCategory extends ViewRecord
{
    protected static string $resource = ReporterCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

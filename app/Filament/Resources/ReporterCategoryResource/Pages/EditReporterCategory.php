<?php

namespace App\Filament\Resources\ReporterCategoryResource\Pages;

use App\Filament\Resources\ReporterCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReporterCategory extends EditRecord
{
    protected static string $resource = ReporterCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

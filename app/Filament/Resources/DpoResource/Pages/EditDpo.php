<?php

namespace App\Filament\Resources\DpoResource\Pages;

use App\Filament\Resources\DpoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDpo extends EditRecord
{
    protected static string $resource = DpoResource::class;

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

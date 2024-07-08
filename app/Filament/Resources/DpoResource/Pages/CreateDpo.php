<?php

namespace App\Filament\Resources\DpoResource\Pages;

use App\Filament\Resources\DpoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDpo extends CreateRecord
{
    protected static string $resource = DpoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

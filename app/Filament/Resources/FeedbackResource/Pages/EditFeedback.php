<?php

namespace App\Filament\Resources\FeedbackResource\Pages;

use App\Filament\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeedback extends EditRecord
{
    protected static string $resource = FeedbackResource::class;

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

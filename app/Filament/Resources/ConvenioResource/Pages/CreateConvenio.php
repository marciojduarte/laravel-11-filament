<?php

namespace App\Filament\Resources\ConvenioResource\Pages;

use App\Filament\Resources\ConvenioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateConvenio extends CreateRecord
{
    protected static string $resource = ConvenioResource::class;

    protected function getSuccessNotificationMessage(): ?string
    {
        return 'Convênio criado com sucesso!';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Resources\AgenteSaudeResource\Pages;

use App\Filament\Resources\AgenteSaudeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgenteSaude extends EditRecord
{
    protected static string $resource = AgenteSaudeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\AgenteSaudeResource\Pages;

use App\Filament\Resources\AgenteSaudeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgenteSaudes extends ListRecords
{
    protected static string $resource = AgenteSaudeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

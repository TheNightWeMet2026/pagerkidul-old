<?php

namespace App\Filament\Resources\VillageProfiles\Pages;

use App\Filament\Resources\VillageProfiles\VillageProfileResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVillageProfile extends ViewRecord
{
    protected static string $resource = VillageProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

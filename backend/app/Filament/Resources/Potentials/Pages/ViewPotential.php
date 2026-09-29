<?php

namespace App\Filament\Resources\Potentials\Pages;

use App\Filament\Resources\Potentials\PotentialResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPotential extends ViewRecord
{
    protected static string $resource = PotentialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

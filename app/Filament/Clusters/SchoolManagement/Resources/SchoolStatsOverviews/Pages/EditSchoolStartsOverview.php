<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\SchoolStatsOverviewResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSchoolStartsOverview extends EditRecord
{
    protected static string $resource = SchoolStatsOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}

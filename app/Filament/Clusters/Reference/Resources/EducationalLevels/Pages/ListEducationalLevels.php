<?php

namespace App\Filament\Clusters\Reference\Resources\EducationalLevels\Pages;

use App\Filament\Clusters\Reference\Resources\EducationalLevels\EducationalLevelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEducationalLevels extends ListRecords
{
    protected static string $resource = EducationalLevelResource::class;

    protected static ?string $title = 'Jenjang Pendidikan';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Baru')
                ->modalHeading('Tambah Jenjang Pendidikan')
                ->modalWidth('md')
        ];
    }
}

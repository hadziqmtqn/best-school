<?php

namespace App\Filament\Clusters\Setting\Resources\Admins\Pages;

use App\Filament\Clusters\Setting\Resources\Admins\AdminResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected static ?string $title = 'Admin';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Baru')
                ->modalHeading('Tambah Baru')
        ];
    }
}

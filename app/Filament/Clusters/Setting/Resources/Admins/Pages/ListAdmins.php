<?php

namespace App\Filament\Clusters\Setting\Resources\Admins\Pages;

use App\Filament\Clusters\Setting\Resources\Admins\AdminResource;
use App\Helpers\CanAccess;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth('md')
                ->visible(CanAccess::to('CreateAdmin'))
        ];
    }
}

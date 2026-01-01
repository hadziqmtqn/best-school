<?php

namespace App\Filament\Clusters\Setting\Resources\Admins\Pages;

use App\Filament\Clusters\Setting\Resources\Admins\AdminResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;
}

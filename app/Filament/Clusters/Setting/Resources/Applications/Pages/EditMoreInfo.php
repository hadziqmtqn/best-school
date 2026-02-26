<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Pages;

use App\Filament\Clusters\Setting\Resources\Applications\ApplicationResource;
use App\Filament\Clusters\Setting\Resources\Applications\Schemas\MoreInfoForm;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;

class EditMoreInfo extends EditRecord
{
    protected static string $resource = ApplicationResource::class;

    public function form(Schema $schema): Schema
    {
        return MoreInfoForm::form($schema);
    }
}
